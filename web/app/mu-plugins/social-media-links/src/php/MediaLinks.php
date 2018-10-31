<?php
namespace App\MuPlugins\MediaLinks;

/**
 * Class MediaLinks
 * @see https://medium.freecodecamp.org/how-to-create-a-wordpress-plugin-for-your-web-app-5c31733f3a9d
 * @see Try this https://www.smashingmagazine.com/2016/04/three-approaches-to-adding-configurable-fields-to-your-plugin/
 * @package  App\MuPlugins\MediaLinks
 */

class MediaLinks
{

    /**
     * @var String $textdomain
     */
    private $textdomain;

    private $domainURL;

    private $facebook;
    private $twitter;
    private $instagram;
    private $soundcloud;

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

    function post_data()
    {
        if (!isset($_POST['media_links_form']) || ! wp_verify_nonce($_POST['media_links_form'], 'media_links_form_update')) {
            ?>
            <div class="error">
                <p>Sorry, your nonce was not correct. Please try again.</p>
            </div>
            <?php
            exit;
        }

        die('testing');
        $links = [];
        $meta_type = 'media-links-meta-type';
        $object_id = 1;
        $meta_key = 'media-links-meta-key';

        $links[0] = $this->facebook;
        $links[1] = $this->twitter;
        $links[2] = $this->instagram;
        $links[3] = $this->soundcloud;

        for ($i = 0; $i < count($links); $i++) {
            if (isset($links[$i]) && !empty($links[$i])) {
                var_dump($links[$i]);
                update_metadata($meta_type, $object_id, $meta_key, $links[$i]);
            }
        }

//         redirect to the same page on form submission
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description On initialization of the custom post type admin screen display custom post types created/create new/delete
     * @return void
     */
    public function media_links_admin_layout():void
    {
        // @TODO this is not ideal, but with using vagrant I was getting error:
//        load_template("{$this->domainURL}/app/mu-plugins/social-media-links/src/views/media-links-template.php");
        if ( $_POST['updated'] === 'true' ) {
            $this->post_data();
        }
        ?>
        <section>
            <main role="main">
                <div class="media-links-container">
                    <h1>Add Your Social Media Links Here</h1>
                    <form method="post" id="media-links-form">
                        <input type="hidden" name="updated" value="true" />
                        <?php wp_nonce_field( 'media_links_form_update', 'media_links_form' ); ?>
                        <div class="facebook">
                            <label for="facebook_input">Facebook</label>
                            <input type="text" id="facebook_input" name="facebook">
                        </div>
                        <br>
                        <div class="twitter">
                            <label for="twitter_input">Twitter</label>
                            <input type="text" id="twitter_input" name="twitter">
                        </div>
                        <br>
                        <div class="instagram">
                            <label for="instagram_input">Instagram</label>
                            <input type="text" id="instagram_input" name="instagram">
                        </div>
                        <br>
                        <div class="soundcloud">
                            <label for="soundcloud_input">Soundcloud</label>
                            <input type="text" id="soundcloud_input" name="soundcloud">
                        </div>
                        <div class="submit">
                            <input type="submit" value="Submit" id="js-media-links-submit" name="Submit">
                        </div>
                    </form>
                </div>
            </main>
        </section>
        <?php
    }
}