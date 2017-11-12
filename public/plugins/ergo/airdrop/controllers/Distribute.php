<?php namespace Ergo\Airdrop\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use October\Rain\Network\Http;

/**
 * Distribute Back-end Controller
 */
class Distribute extends Controller
{
    const DISTRIBUTION_SERVICE_URL = 'http://ergo-airdrop-hackaton.azurewebsites.net/api/blocks/winners/3/coins/5/blockno/1234';

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
        Http::post();
    }
}
