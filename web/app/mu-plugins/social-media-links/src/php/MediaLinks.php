<?php
namespace App\MuPlugins\MediaLinks;

/**
 * Class MediaLinks
 * @see https://medium.freecodecamp.org/how-to-create-a-wordpress-plugin-for-your-web-app-5c31733f3a9d
 * @package  App\MuPlugins\MediaLinks
 */

class MediaLinks
{
    /**
     * @var String $textdomain
     */
    private $textdomain;

    private $domainURL;

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * MediaLinks constructor.
     */
    public function __construct()
    {
        $this->textdomain = 'museum';
        $this->domainURL = getenv('WP_HOME');
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Call your actions and filters here
     * @return void
     */
    public function init()
    {
        add_action('admin_menu', [&$this, 'add_admin_menu']);
//        add_action('wp_ajax_store_admin_data', [&$this, 'store_admin_data']);
        add_action('admin_enqueue_scripts', [&$this, 'add_admin_styles']);
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
            __('Social Media Links', $this->textdomain),
            __('Social Media Links', $this->textdomain),
            'manage_options',
            'media-links-admin',
            [&$this, 'media_links_admin_layout'],
            'dashicons-admin-plugins',
            10000
        );
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Add our plugin styles
     * @return void
     */
    public function add_admin_styles()
    {
        wp_enqueue_style('media-links-admin-style', "{$this->domainURL}/app/mu-plugins/social-media-links/src/css/media-links.css");
    }


    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Add our plugin scripts
     * @return void
     */
    public function add_admin_scripts():void
    {
        $_nonce = 'media_admin';

        wp_enqueue_script('media-links-admin-script', "{$this->domainURL}/app/mu-plugins/social-media-links/src/js/media-links.js", [], '', true);

        $admin_options = array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            '_nonce'   => wp_create_nonce( $_nonce ),
        );
        wp_localize_script('media-links-admin-script', 'media_links_exchanger', $admin_options);
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description On initialization of the custom post type admin screen display custom post types created/create new/delete
     * @return void
     */
    public function media_links_admin_layout():void
    {
        // @TODO this is not ideal, but with using vagrant I was getting error:
        load_template("{$this->domainURL}/app/mu-plugins/social-media-links/src/views/media-links-template.php");
    }
}