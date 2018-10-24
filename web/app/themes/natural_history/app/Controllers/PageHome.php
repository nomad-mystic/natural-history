<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageHome extends Controller
{
    public function title()
    {
        return 'testing the title';
    }

    /**
     * @return mixed $metadata
     */
    public function get_metadata():array
    {
        $id = get_the_ID();
        $metadata = get_post_meta($id);

        return $metadata;
    }
}
