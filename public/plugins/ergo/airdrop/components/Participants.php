<?php namespace Ergo\Airdrop\Components;

use Cms\Classes\ComponentBase;
use Ergo\Airdrop\Models\Participant;
use Ergo\Airdrop\Models\Settings;

class Participants extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'participants Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function getParticipants()
    {
        $prtcp = Participant::orderBy('address', 'asc')->with('winned_coins')->get();
        return $prtcp;
    }

    public function getWinners()
    {
        return Participant::has('winned_coins')->get();
    }

    public function getSettings()
    {
        $settings = Settings::instance();
        $participants_count = Participant::count();
        return [
            'blockno' => $settings->blockno,
            'winners' => $settings->winners,
            'coins' => $settings->coins,
            'prtcp_count' => $participants_count,
        ];
    }

}
