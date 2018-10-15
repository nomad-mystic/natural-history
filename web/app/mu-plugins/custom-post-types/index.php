<?php
namespace App\MuPlugins\CustomPostType;

/**
 * Plugin Name: Custom Post Types
 * Description: This is a basic custom post types initializer. This will extend later after some refactoring
 * Version: 1.0.0
 * Author: Keith Murphy
 * Author URI: http://nomadmystics.com
 * License: GPL2
 *
 * Class CustomPostTypes
 * @package wordpress-muplugin
 */


spl_autoload_register('App\MuPlugins\CustomPostType\custom_post_autoloader');

function custom_post_autoloader($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    var_dump($class_name);
//    if (false !== strpos( $class_name, 'Museum')) {
        $namespace = str_replace("\\","/",__NAMESPACE__);
        var_dump($namespace);
        $classes_dir = realpath(plugin_dir_path( __FILE__)) . DIRECTORY_SEPARATOR . 'src';
        var_dump($classes_dir);
        $class_file = str_replace($namespace, '', $class_name) . '.php';
        var_dump($class_file);
        var_dump($classes_dir . $class_file);
        require_once($classes_dir . $class_file);
//    }
}

add_action('plugins_loaded', 'App\MuPlugins\CustomPostType\custom_post_init');
function custom_post_init()
{
    $customPostTypes = new CustomPostTypes();
    $customPostTypes->init();
}
