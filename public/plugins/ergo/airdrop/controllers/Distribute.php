<?php namespace Ergo\Airdrop\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Ergo\Airdrop\Models\Participant;
use Ergo\Airdrop\Models\Settings;
use Ergo\Airdrop\Models\Winner;
use Illuminate\Support\Facades\DB;

/**
 * Distribute Back-end Controller
 */
class Distribute extends Controller
{
    const DISTRIBUTION_SERVICE_URL = 'http://ergo-airdrop-hackaton.azurewebsites.net/api/blocks/winners/%d/coins/%d/blockno/%d';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Ergo.Airdrop', 'airdrop', 'distribute');
    }

    public function index()
    {

    }

    public function start()
    {
        $participants = Participant::all();
        $partic_data = [];
        foreach ($participants as $participant) {
            $partic_data[(string)$participant->address] = $participant->balance;
        }
        if ($partic_data) {
            $client = new \GuzzleHttp\Client();
            ksort($partic_data);
            $res = $client->request('POST', $this->getDistributionServiceUrl(),
                [
                    'json' => $partic_data,
                    'http_errors' => false,
                ])
            ;
            if ($res->getStatusCode() === 200) {
                $body_contents = $res->getBody()->getContents();
                $winners = json_decode($body_contents, true);
                if (is_array($winners)) {
                    $winner_addresses = array_keys($winners);
                    $winner_participants = (array)DB::table((new Participant)->getTable())
                        ->select('id', 'address')
                        ->whereIn('address', $winner_addresses)
                        ->get();

                    $winners_insert_data = [];
                    foreach ($winner_participants as $win_part) {
                        $win_part = (array)$win_part;
                        $winners_insert_data[] = [
                            'participant_id' => $win_part['id'],
                            'coin_count' => $winners[$win_part['address']]
                        ];
                    }

                    $winner_table = (new Winner())->getTable();
                    if ($winners_insert_data) {
                        $result = false;
                         Db::transaction(
                            function () use ($winner_table, $winners_insert_data, &$result) {
                                Db::table($winner_table)->truncate();
                                $result = Db::table($winner_table)->insert($winners_insert_data);
                            }
                        );
                        $this->vars['status'] =
                            "Result ". ($result ? 'OK' : 'ERROR') . ". ".
                            "Found ".count($winners_insert_data).' winners!';
                        return;
                    }
                    $this->vars['status'] =
                        "Result ERROR ".
                        "Empty winners_insert_data";
                    return;
                }
                $this->vars['status'] =
                    "Result ERROR ".
                    "Winners is not array: ".var_export($winners, true). " Body: ".var_export($body_contents, true);
                return;
            }
            $this->vars['status'] =
                "Result ERROR ".
                "HTTP status code: ".var_export($res->getStatusCode(), true);
        }

    }

    private function getDistributionServiceUrl()
    {
        $settings = Settings::instance();
        return sprintf(self::DISTRIBUTION_SERVICE_URL,
            $settings->winners ?? 100,
            $settings->coins ?? 1000,
            $settings->blockno ?? 1234
        );
    }
}
