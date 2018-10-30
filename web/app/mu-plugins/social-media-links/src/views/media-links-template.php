<?php


//$path = getenv('WP_HOME');
//var_dump($path);
$loadPath = "http://192.168.10.10/web/wp/wp-load.php";

global $post;
var_dump($post);
//require($loadPath);

//require_once(ABSPATH . 'wp-load.php');

//add_action('admin_init', function() {
//    $meta_type = 'media-links-meta-type';
//    $object_id = 1;
//    $meta_key = 'media-links-meta-key';
//    var_dump('testing');
//            if (function_exists('get_metadata')) {
//    $metadata = get_metadata($meta_type, $object_id, $meta_key);
//    print_r($metadata);
//            }
//});
?>
<section>
    <main role="main">
        <div class="media-links-container">
            <h1>Add Your Social Media Links Here</h1>
            <form action="/app/mu-plugins/social-media-links/src/php/PostMediaLinksMeta.php" method="post" id="media-links-form">
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

