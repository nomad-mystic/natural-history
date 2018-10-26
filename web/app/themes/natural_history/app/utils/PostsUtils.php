<?php
namespace App\Utils;

class PostsUtils
{

    /**
     * @param string $category
     * @return array $posts
     */
    public static function get_posts_by_category(string $category):array
    {
        $category_query = [
            'category_name' => $category,
        ];
        $posts = get_posts($category_query);

        return $posts;
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @param int $id
     * @return array $metadata
     */
    public function get_metadata(int $id):array
    {
//        $id = get_the_ID();
        $metadata = get_post_meta($id);

        return $metadata;
    }


    /**
     * @param int $id -
     * @param bool $returnHTML
     * @param string $size -
     * @param array $attr -
     * @return string $post_thumbnail -
     */
    public static function get_feature_thumbnail_by_id(int $id, bool $returnHTML = false, string $size = 'post-thumbnail', array $attr = [])
    {
        $post_thumbnail = '';

        if ($returnHTML) {
            $post_thumbnail_html = get_the_post_thumbnail($id, $size, $attr);

            if (!empty($post_thumbnail_html)) {
                $post_thumbnail = $post_thumbnail_html;
            }
        } else {
            $post_thumbnail_id = get_post_thumbnail_id( $id );
            $post_thumbnail_array = wp_get_attachment_image_src($post_thumbnail_id, $size);

            if (!empty($post_thumbnail_array)) {
                $post_thumbnail = $post_thumbnail_array;
            }
        }

        return $post_thumbnail;
    }
}
