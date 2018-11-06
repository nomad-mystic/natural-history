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

    private $object_id;
    private $meta_key;
    private $keys;

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * MediaLinks constructor.
     */
    public function __construct()
    {
        $this->textdomain = 'museum';
        $this->domainURL = getenv('WP_HOME');
        $this->object_id = 1000000;
        $this->meta_key = 'media-links-meta-key';
        $this->keys = [
            'facebook',
            'twitter',
            'instagram',
            'soundcloud',
        ];
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Call your actions and filters here
     * @return void
     */
    public function init()
    {
        add_action('admin_menu', [&$this, 'add_admin_menu']);
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
     * @todo Remove this as JS is not needed for this plugin - keep until totally finished
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
     * @description Update metadata for social media links
     * @return void
     */
    function post_data():void
    {
        if (!isset($_POST['media_links_form']) || ! wp_verify_nonce($_POST['media_links_form'], 'media_links_form_update')) {
            ?>
            <div class="error">
                <p>Sorry, your nonce was not correct. Please try again.</p>
            </div>
            <?php
            exit;
        }

        $meta_type = 'post';
        $links = [];
        $links[0] = filter_var(strip_tags($_POST['facebook'], FILTER_SANITIZE_URL));
        $links[1] = filter_var(strip_tags($_POST['twitter']));
        $links[2] = filter_var(strip_tags($_POST['instagram']));
        $links[3] = filter_var(strip_tags($_POST['soundcloud']));

        for ($i = 0; $i < count($links); $i++) {
            if (isset($links[$i]) && !empty($links[$i])) {
                update_metadata($meta_type, $this->object_id, "{$this->meta_key}-{$this->keys[$i]}", $links[$i]);
            }
        }
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Create the form that will update the metadata that can be used around the site.
     * @return void
     */
    public function media_links_admin_layout():void
    {
        if (isset($_POST['updated']) &&  $_POST['updated'] === 'true' ) {
            $this->post_data();
        }

        $metadata = [];
        for ($i = 0; $i < count($this->keys); $i++) {
            $metadata[$i] = get_metadata('post', $this->object_id, "{$this->meta_key}-{$this->keys[$i]}");
        }

        $facebook_value = !empty($metadata[0][0]) ? (string) $metadata[0][0] : '';
        $twitter_value = !empty($metadata[1][0]) ? (string) $metadata[1][0] : '';
        $instagram_value = !empty($metadata[2][0]) ? (string) $metadata[2][0] : '';
        $soundcloud_value = !empty($metadata[3][0]) ? (string) $metadata[3][0] : '';
        ?>
        <section>
            <main role="main">
                <div class="media-links-container">
                    <h1>Add Your Social Media Links Here</h1>
                    <form method="post" id="media-links-form">
                        <input type="hidden" name="updated" value="true" />
                        <?php wp_nonce_field('media_links_form_update', 'media_links_form'); ?>
                        <div class="facebook">
                            <label for="facebook_input">Facebook</label>
                            <input type="text" id="facebook_input" name="facebook" value="<?php echo $facebook_value?>">
                        </div>
                        <br>
                        <div class="twitter">
                            <label for="twitter_input">Twitter</label>
                            <input type="text" id="twitter_input" name="twitter" value="<?php echo $twitter_value?>">
                        </div>
                        <br>
                        <div class="instagram">
                            <label for="instagram_input">Instagram</label>
                            <input type="text" id="instagram_input" name="instagram" value="<?php echo $instagram_value?>">
                        </div>
                        <br>
                        <div class="soundcloud">
                            <label for="soundcloud_input">Soundcloud</label>
                            <input type="text" id="soundcloud_input" name="soundcloud" value="<?php echo $soundcloud_value?>">
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
