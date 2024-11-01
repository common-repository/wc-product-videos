<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    woocommerce_product_videos
 * @subpackage woocommerce_product_videos/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    woocommerce_product_videos
 * @subpackage woocommerce_product_videos/public
 * @author     Your Name <email@example.com>
 */
class woocommerce_product_videos_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $woocommerce_product_videos    The ID of this plugin.
	 */
	private $woocommerce_product_videos;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $woocommerce_product_videos       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $woocommerce_product_videos, $version ) {

		$this->woocommerce_product_videos = $woocommerce_product_videos;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in woocommerce_product_videos_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The woocommerce_product_videos_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->woocommerce_product_videos, plugin_dir_url( __FILE__ ) . 'css/woocommerce-product-videos-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in woocommerce_product_videos_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The woocommerce_product_videos_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->woocommerce_product_videos, plugin_dir_url( __FILE__ ) . 'js/woocommerce-product-videos-public.js', array( 'jquery' ), $this->version, false );

	}

/**

<iframe width="560" height="315" src="https://www.youtube.com/embed/__-Apjhv3Zw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

**/

	public function product_thumbnails() {
		echo PHP_EOL ."<!-- BEGIN Product Thumbnails --> " . PHP_EOL;
		$post_id = get_the_ID();
		$youtube_url = get_post_meta( $post_id, '_youtube_url_meta_key', true );

		if (!$youtube_url) {
			return;
		}

		$youtube_url = str_replace('www.youtube.com/watch?v=','www.youtube.com/embed/', $youtube_url);
		$video_position = get_post_meta( $post_id, '_video_position_meta_key', true );

		if (!$video_position) {
			$video_position = 1;
		}

		$video_position -= 1;

		echo <<<EOS
<script>
console.debug(jQuery('.woocommerce-product-gallery__image'));

	jQuery('.woocommerce-product-gallery__image:eq({$video_position})').html('<iframe width="560" height="315" src="{$youtube_url}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
</script>
EOS;
		echo PHP_EOL ."<!-- END Product Thumbnails --> " . PHP_EOL;
	}

	public function single_product_image_thumbnail_html($img) {
		return $img;
	}
}
