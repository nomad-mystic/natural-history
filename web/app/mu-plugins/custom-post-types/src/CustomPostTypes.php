<?php
namespace App\MuPlugins\CustomPostType;

class CustomPostTypes
{
    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description
     */
    public function init():void
    {
        add_action('init', [&$this, 'museum_past_exhibits']);
//        add_action('init', [&$this, 'museum_current_exhibits']);
//        add_action('init', [&$this, 'museum_future_exhibits']);
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description This uses the factory pattern to build custom post types
     * @param string $post_type
     * @param string $name
     * @param string $singular_name
     * @param bool $is_public
     * @param bool $has_archive
     * @param string $rewrite_slug
     * @return void
     */
    private function custom_post_factory(String $post_type,
         String $name = '',
         String $singular_name = '',
         Bool $is_public = true,
         Bool $has_archive = true,
         String $rewrite_slug = ''):void
    {
        register_post_type($post_type,
            [
                'labels' => [
                    'name' => $name,
                    'singular_name' => $singular_name,
                ],
                'public' => $is_public,
                'has_archive' => $has_archive,
                'rewrite' => ['slug' => $rewrite_slug],
                'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats',],
            ]
        );
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description This will build the custom post type for Past Exhibits from the British Museum
     * @return void
     */
    public function museum_past_exhibits():void
    {
        $post_type = 'past_exhibits';
        $name = __('Past Exhibits');
        $singular_name = __('Past Exhibit');
        $is_public = true;
        $has_archive = true;
        $rewrite_slug = 'past-exhibits';
        
        $this->custom_post_factory($post_type, $name, $singular_name, $is_public, $has_archive, $rewrite_slug);
    }
}

//if (class_exists('CustomPostTypes')) {
//    $customPostTypes = new CustomPostTypes();
//    $customPostTypes->init();
//}

