<?php
namespace Grav\Plugin;

use \Grav\Common\Grav;
use Grav\Common\Utils;

class FileContentTwigExtension extends \Twig_Extension
{

    /**
     * Returns extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'FileContentTwigExtension';
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('filecontent', [$this, 'filecontent'])

        ];
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('filecontent', [$this, 'filecontent'])
        ];
    }

    public function filecontent($path)
    {
        $path_info = pathinfo($path);
        $config = Grav::instance()['config']->get('plugins.file-content');

        if (in_array($path_info['extension'], $config['allowed_extensions'])) {
            if (Utils::startsWith($path, '/')) {
                if ($config['allow_in_grav'] && file_exists(GRAV_ROOT . $path)) {
                    return file_get_contents(GRAV_ROOT . $path);
                } elseif ($config['allow_in_filesystem'] && file_exists($path)) {
                    return file_get_contents($path);
                }
            } else {
                $page_path = Grav::instance()['page']->path() . '/' . $path;
                if ($config['allow_in_page'] && file_exists($page_path)) {
                    return file_get_contents($page_path);
                }
            }
        }

        return $path;
    }

}
