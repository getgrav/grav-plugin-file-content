<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class FileContentPlugin extends Plugin
{

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Enable search only if url matches to the configuration.
     */
    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onTwigExtensions' => ['onTwigExtensions', 0]
        ]);

    }

    /**
     * Add Twig Extensions
     */
    public function onTwigExtensions()
    {
        require_once(__DIR__.'/twig/FileContentTwigExtension.php');
        $this->grav['twig']->twig->addExtension(new FileContentTwigExtension());
    }
}
