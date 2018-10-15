<?php
/**
 * Created by PhpStorm.
 * User: kmurphy
 * Date: 10/15/2018
 * Time: 1:25 PM
 */

namespace App\MuPlugins\CustomPostType;

/**
 * Class CustomPostTaxonomies
 * @package App\MuPlugins
 */

class CustomPostTaxonomies
{
    public function init()
    {
//        add_action('init', [&$this, 'create_past_exhibits_tax']);
        var_dump('test');
        add_action('init', [&$this, 'build_custom_tax']);
    }

    private function build_custom_tax()
    {
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Genres', 'textdomain' ),
            'all_items'         => __( 'All Genres', 'textdomain' ),
            'parent_item'       => __( 'Parent Genre', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
            'edit_item'         => __( 'Edit Genre', 'textdomain' ),
            'update_item'       => __( 'Update Genre', 'textdomain' ),
            'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
            'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
            'menu_name'         => __( 'Genre', 'textdomain' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'past_exhibits'],
        );

        register_taxonomy( 'past_exhibits', 'past_exhibits', $args );
        register_taxonomy_for_object_type( 'past_exhibits', 'past_exhibits' );
    }


    public function create_past_exhibits_tax()
    {
        $post_type = 'past_exhibits';
    }
}

//$customPostTaxonomies = new CustomPostTaxonomies();
//$customPostTaxonomies->init();
