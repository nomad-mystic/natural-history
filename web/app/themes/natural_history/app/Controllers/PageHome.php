<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Utils\PostsUtils;

/**
 * @author Keith Murphy || nomadmystics@gmail.com
 * Class CustomPostTaxonomies
 */

class PageHome extends Controller
{

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Get the home jumbo post
     * @return array $home_showcase_post
     */
    public function get_home_jumbo_post():array
    {
        $category = 'home-jumbo';
        $home_showcase_post = PostsUtils::get_posts_by_category($category);

        return $home_showcase_post;
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

}
