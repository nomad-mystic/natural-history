<?php /** @noinspection SpellCheckingInspection */

namespace App\Utils;


class Shortcodes
{

    public function init():void
    {
        remove_shortcode('gallery');
        add_shortcode('gallery', [&$this, 'post_gallery']);
    }

    /**
     * @param array $atts
     * @return string $gallery
     */
    public function post_gallery(array $atts):string
    {
        global $post;
        $pid = $post->ID;
        $gallery = "";

        if (empty($pid)) {$pid = $post['ID'];}

        if (!empty( $atts['ids'] ) ) {
            $atts['orderby'] = 'post__in';
            $atts['include'] = $atts['ids'];
        }

        extract(shortcode_atts(array('orderby' => 'menu_order ASC, ID ASC', 'include' => '', 'id' => $pid, 'itemtag' => 'dl', 'icontag' => 'dt', 'captiontag' => 'dd', 'columns' => 3, 'size' => 'large', 'link' => 'file'), $atts));

        $args = ['post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => $orderby];

        if (!empty($include)) {
            $args['include'] = $include;
        }
        else {
            $args['post_parent'] = $id;
            $args['numberposts'] = -1;
        }

        if ($args['include'] == "") { $args['orderby'] = 'date'; $args['order'] = 'asc';}

        $images = get_posts($args);
        var_dump('testing');
        foreach ( $images as $image ) {
            print_r($image); /*see available fields*/
            $thumbnail = wp_get_attachment_image_src($image->ID, 'large');
            $thumbnail = $thumbnail[0];
            $gallery .= "
			<figure>
				<img src='".$thumbnail."'>
				<figcaption>
					<div class='img-title'>".$image->post_title."</div>
					".$image->post_excerpt."
				</figcaption>
			</figure>";
        }

        return $gallery;
    }
}
