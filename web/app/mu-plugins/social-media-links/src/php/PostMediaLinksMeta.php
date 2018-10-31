<?php
namespace App\MuPlugins\MediaLinks;

/**
 * Class PostMediaLinksMeta
 * @package App\MuPlugins\MediaLinks
 */
class PostMediaLinksMeta
{
    private $facebook;
    private $twitter;
    private $instagram;
    private $soundcloud;

    function __construct() {
        $this->facebook = isset($_POST['facebook']) ? $_POST['facebook'] : null;
        $this->twitter = isset($_POST['twitter']) ? $_POST['twitter'] : null;
        $this->instagram = isset($_POST['instagram']) ? $_POST['instagram'] : null;
        $this->soundcloud = isset($_POST['soundcloud']) ? $_POST['soundcloud'] : null;
    }

    public function init() {
        add_action('admin_post_process_form', [&$this, 'post_data']);
    }

    function post_data()
    {

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
}