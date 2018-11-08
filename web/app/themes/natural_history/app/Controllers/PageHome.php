<?php

namespace App\Controllers;

use DOMDocument;
use Sober\Controller\Controller;
use App\Utils\PostsUtils;

/**
 * @author Keith Murphy || nomadmystics@gmail.com
 * Class CustomPostTaxonomies
 */
class PageHome extends Controller
{
    private $home_post_jumbo;
    private $home_showcase_post;

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Get the home jumbo post
     * @return array $home_post_jumbo
     */
    public function get_home_jumbo_post():array
    {
        $category = 'home-jumbo';
        $this->home_post_jumbo = PostsUtils::get_posts_by_category($category);

        return $this->home_post_jumbo;
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Get the home jumbo post
     */
    public function get_home_jumbo_featured_thumb()
    {
        $post_feature_thumb = PostsUtils::get_feature_thumbnail_by_id(33);

        return $post_feature_thumb;
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Get the home showcase post
     * @return array $home_showcase_post
     */
    public function get_home_showcase_post():array
    {
        $category = 'home-showcase';
        $this->home_showcase_post = PostsUtils::get_posts_by_category($category);

        return $this->home_showcase_post;
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Return array of paragraph from the home showcase post
     * @return array $paragraphs
     */
    public function get_truncate_home_jumbo_post():array
    {
        $post = $this->get_home_showcase_post();
        $content = $post[0]->post_content;

        $dom = new DOMDocument();
        $paragraphs = [];
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);

        foreach($dom->getElementsByTagName('p') as $node) {
            $paragraphs[] = $dom->saveHTML($node);
        }

        return $paragraphs;
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Return array metadata for the showcase post
     * @return array $metadata
     */
    public function get_home_showcase_tag():array
    {
        $home_showcase = $this->get_home_showcase_post();
        $home_showcase_id = $home_showcase[0]->ID;
        $metadata = get_post_meta($home_showcase_id);

        return $metadata;
    }
}
