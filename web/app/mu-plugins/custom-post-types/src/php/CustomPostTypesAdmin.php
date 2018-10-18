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
    private $textdomain = 'museum';

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
     * @description Add out plugin to the admin screen
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

    public function add_admin_scripts():void
    {
        wp_enqueue_script('custom-post-types-admin', '/web/app/mu-plugins/custom-post-types/build/bundle.js', [], '', true);
    }

    public function custom_post_types_admin_layout():void
    {
        ?>

        <?php
    }
}