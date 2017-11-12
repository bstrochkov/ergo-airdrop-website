<?php namespace Ergo\Airdrop\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Participants Back-end Controller
 */
class Participants extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_import_participants.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Ergo.Airdrop', 'airdrop', 'participants');
    }
}
