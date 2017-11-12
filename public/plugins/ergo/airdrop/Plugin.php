<?php namespace Ergo\Airdrop;

use Backend;
use System\Classes\PluginBase;

/**
 * airdrop Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'airdrop',
            'description' => 'No description provided yet...',
            'author'      => 'ergo',
            'icon'        => 'icon-random'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Ergo\Airdrop\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'ergo.airdrop.some_permission' => [
                'tab' => 'airdrop',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'airdrop' => [
                'label' => 'Airdrop',
                'url'   => Backend::url('ergo/airdrop/participants'),
                'icon' => 'icon-bolt',
                'order' => 500,
                'sideMenu' => [
                    'participants' => [
                        'label'       => 'Participants',
                        'url'         => Backend::url('ergo/airdrop/participants'),
                        'icon'        => 'icon-user',
                        'order'       => 500,
                        'sideMenu' => [
                            'import' => [
                                'label'       => 'Import',
                                'icon'        => 'icon-import',
                                'url'         => Backend::url('ergo/airdrop/participants/import'),
                            ],
                        ]
                    ],
                    'distribute' => [
                        'label' => 'Distribute Tokens',
                        'url' => Backend::url('ergo/airdrop/distribute'),
                        'icon' => 'icon-random',
                        'order' => 501,
                        'sideMenu' => [
                            'submenu' => [
                                'label' => 'SubMenu',
                                'icon' => 'icon-plus',
                                'url' => Backend::url('ergo/airdrop/distribute/start')
                            ]
                        ]
                    ],
                ]
            ],
        ];
    }
}
