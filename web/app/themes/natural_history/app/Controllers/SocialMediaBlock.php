<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SocialMediaBlock extends Controller
{
    /**
     * @author Keith Murphy || nomadmystics@gmail.com
     * @description Get the social media base links from the plugin
     * @return array
     */
    public static function all_social_metadata():array
    {
        $metadata = [];
        $object_id = 1000000;
        $meta_key = 'media-links-meta-key';
        $keys = [
            'facebook',
            'twitter',
            'instagram',
            'soundcloud',
        ];

        for ($i = 0; $i < count($keys); $i++) {
            $metadata[$i][0] = $keys[$i];
            $metadata[$i][1] = get_metadata('post', $object_id, "{$meta_key}-{$keys[$i]}", true);
        }

        return $metadata;
    }
}