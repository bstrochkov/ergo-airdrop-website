<?php

namespace Ergo\Airdrop;


class Plugin extends \System\Classes\PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Ergo Airdrop Plugin',
            'description' => 'Provides fair token distribution system',
            'author' => 'Ergo',
            'icon' => 'icon-random'
        ];
    }

    public function registerComponents()
    {
        return [
            'Acme\Blog\Components\Post' => 'blogPost'
        ];
    }
}