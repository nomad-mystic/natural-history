<?php
namespace App\MuPlugins\CustomPostType;

/**
 * Class CustomPostTypesAdmin
 * @see https://medium.freecodecamp.org/how-to-create-a-wordpress-plugin-for-your-web-app-5c31733f3a9d
 * @package App\MuPlugins\CustomPostType
 */
class CustomPostTypesAdmin
{
    /**
     * @var String $textdomain
     */
    private $textdomain;

    /**
     * @var string
     */
    private $plugin_src_url;

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * CustomPostTypesAdmin constructor.
     */
    public function __construct()
    {
        $this->textdomain = 'museum';
        $this->plugin_src_url = plugins_url('/', dirname(__FILE__));
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Call your actions and filters here
     * @return void
     */
    public function init()
    {
        add_action('admin_menu', [&$this, 'add_admin_menu']);
        add_action('wp_ajax_store_admin_data', [&$this, 'store_admin_data']);
        add_action('admin_enqueue_scripts', [&$this, 'add_admin_scripts']);
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Add our plugin to the admin screen
     * @return void
     */
    public function add_admin_menu():void
    {
        add_menu_page(
            __('Custom Post Types', $this->textdomain),
            __('Custom Post Types', $this->textdomain),
            'manage_options',
            'custom-post-types-admin',
            [&$this, 'custom_post_types_admin_layout'],
            'dashicons-admin-plugins',
            10000
        );
    }

    public function store_admin_data():void
    {

    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Add our plugin scripts
     * @return void
     */
    public function add_admin_scripts():void
    {
//        plugin_dir_path()
        wp_enqueue_script('custom-post-types-admin', '/web/app/mu-plugins/custom-post-types/build/bundle.js', [], '', true);
    }

    public function custom_post_types_admin_layout():void
    {
        $views_slug = "{$this->plugin_src_url}views";
        $template = get_template_part($views_slug . '/add-post-type-template.php');
//        $template = get_template_part('C:\Users\kmurphy\learning\php_projects\natural_history\web\app\mu-plugins\custom-post-types\src\views\add-post-type-template.php');
        echo $template;
        print_r($views_slug . '/add-post-type-template.php');
        print_r($template);
//        load_template(plugins_url('/', dirname(__FILE__)) . 'views/add-post-type-template.php');
//        load_template('C:\Users\kmurphy\learning\php_projects\natural_history\web\app\mu-plugins\custom-post-types\src\views\add-post-type-template.php');
//        ?>
<!--            <h1>Testing there is HTML</h1>-->
<!--        --><?php

//        add_filter('template_include', [&$this, 'rt_include_gym_dashboard_page_template'], 0);
        require_once('http://natural_history.local/app/mu-plugins/custom-post-types/src/views/add-post-type-template.php');
    }

    public function rt_include_gym_dashboard_page_template($template)
    {
        var_dump('testing');
        print_r(plugin_dir_path( __FILE__ ) . 'views/add-post-type-template.php');

        return plugin_dir_path( __FILE__ ) . 'views/add-post-type-template.php';

//        return $template;
    }

}