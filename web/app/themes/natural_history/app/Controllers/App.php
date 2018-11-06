<?php

namespace App\Controllers;

use App\Traits\SocialMediaBlock;
use Sober\Controller\Controller;

class App extends Controller
{
    use SocialMediaBlock;

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Pass the social media base links to the whole App
     * @return array
     */
//    public function all_social_metadata():array
//    {
//        $social_metadata = App::all_social_metadata();
//
//        return $social_metadata;
//    }
}
