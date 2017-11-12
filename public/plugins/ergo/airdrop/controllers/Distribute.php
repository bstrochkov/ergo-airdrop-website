<?php namespace Ergo\Airdrop\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Ergo\Airdrop\Models\Participant;
use Ergo\Airdrop\Models\Settings;
use October\Rain\Network\Http;

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
            $res = $client->request('POST', $this->getDistributionServiceUrl(),
                [
                    'json' => $partic_data,
                    'http_errors' => false,
                ])
            ;
            $this->vars['result_body'] = $res->getBody()->getContents();
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
