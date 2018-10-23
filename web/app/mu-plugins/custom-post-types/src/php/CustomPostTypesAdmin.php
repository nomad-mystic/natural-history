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
        wp_enqueue_script('custom-post-types-admin', "{$this->plugin_src_url}build/bundle.js", [], '', true);
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description On initialization of the custom post type admin screen display custom post types created/create new/delete
     * @return void
     */
    public function custom_post_types_admin_layout():void
    {
        // $views_slug = "{$this->plugin_src_url}views";
        // Warning: require_once(): php_network_getaddresses: getaddrinfo failed:
        // Temporary failure in name resolution in /home/vagrant/learning/php_projects/natural_history/web/wp/wp-includes/template.php on line 688
        // load_template(plugins_url('/', dirname(__FILE__)) . 'views/add-post-type-template.php');
        // @TODO this is not ideal, but with using vagrant I was getting error:
        load_template('http://192.168.10.10/app/mu-plugins/custom-post-types/src/views/add-post-type-template.php');
    }
}