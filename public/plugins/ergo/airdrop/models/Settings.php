<?php namespace Ergo\Airdrop\Models;

use Model;

/**
 * settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'ergo_airdrop_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
