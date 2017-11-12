<?php

namespace Ergo\Airdrop\Controllers;


class Participants extends \Backend\Classes\Controller
{
    public $implement = [
        'Backend.Behaviors.ImportExportController',
    ];

    public $importExportConfig = 'config_import_participants.yaml';

    public function index()
    {

    }
}