<?php
namespace App\MuPlugins\MediaLinks;

/**
 * Plugin Name: Social Media Links
 * Description: Present of for that has the Social media links need for the project
 * Version: 1.0.0
 * Author: Keith Murphy
 * Author URI: http://nomadmystics.com
 * License: GPL2
 *
 * Class CustomPostTypes
 * @package wordpress-muplugin
 */


/**
 * @author Keith Murphy || nomadmystics@gamil.com
 * @description Autoload classes in this is plugin
 * @param String $class_name
 * @return void
 */
function media_links_autoloader(String $class_name):void {
    if (false !== strpos($class_name, 'MediaLinks')) {
        $class_name = str_replace('\\', '/', $class_name);
        $namespace = str_replace("\\","/",__NAMESPACE__);
        $classes_dir = realpath(plugin_dir_path( __FILE__)) . DIRECTORY_SEPARATOR . 'src/php';
        $class_file = str_replace($namespace, '', $class_name) . '.php';
        $required_class = "$classes_dir/$class_file";
        require_once($required_class);
    }
}
spl_autoload_register('App\MuPlugins\MediaLinks\media_links_autoloader');

/**
 * @author Keith Murphy || nomadmystics@gamil.com
 * @description Call classes in this is plugin
 * @return void
 */
function media_links_init():void
{
    if (class_exists('App\MuPlugins\MediaLinks\MediaLinks')) {
        $MediaLinks = new MediaLinks();
        $MediaLinks->init();
    }

    if (class_exists('App\MuPlugins\MediaLinks\PostMediaLinksMeta')) {

        $mediaLinksPostMeta = new PostMediaLinksMeta();
//        if (!empty($_POST)) {
            $mediaLinksPostMeta->init();
//        }
    }
}
add_action('plugins_loaded', 'App\MuPlugins\MediaLinks\media_links_init');