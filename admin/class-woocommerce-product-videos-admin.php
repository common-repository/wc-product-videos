<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    woocommerce_product_videos
 * @subpackage woocommerce_product_videos/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    woocommerce_product_videos
 * @subpackage woocommerce_product_videos/admin
 * @author     Your Name <email@example.com>
 */
class woocommerce_product_videos_Admin {

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
	 * @param      string    $woocommerce_product_videos       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $woocommerce_product_videos, $version ) {

		$this->woocommerce_product_videos = $woocommerce_product_videos;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->woocommerce_product_videos, plugin_dir_url( __FILE__ ) . 'css/woocommerce-product-videos-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->woocommerce_product_videos, plugin_dir_url( __FILE__ ) . 'js/woocommerce-product-videos-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_meta_boxes() {
		add_meta_box(
			$this->woocommerce_product_videos,
			'Product video',
			array($this, 'video_meta_box'),
			'product',
			'side',
			'low'
			);
	}

	public function video_meta_box($post) {
		wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' );
?>
		 <p>
		   <label for="youtube_url"><?php _e( "YouTube URL", 'example' ); ?></label>
		   <input class="widefat" type="text" name="youtube_url" id="youtube_url" value="<?php echo esc_attr( get_post_meta( $post->ID, '_youtube_url_meta_key', true ) ); ?>" size="30" placeholder="https://www.youtube.com/watch?v=nraHQt4nvZk" />
		   <label for="video_position">Replace image in position</label>
		   <input id="video_position" name="video_position" value="<?php echo esc_attr( get_post_meta( $post->ID, '_video_position_meta_key', true ) ); ?>" size="2">
		 </p>
<?php
	}

	public function save_video_box_meta( $post_id ) {
		if (array_key_exists('youtube_url', $_POST)) {

	        update_post_meta(
	            $post_id,
	            '_youtube_url_meta_key',
	            esc_url_raw($_POST['youtube_url'])
	        );
	    }

	    if (array_key_exists('video_position', $_POST)) {
	        update_post_meta(
	            $post_id,
	            '_video_position_meta_key',
	            (int)$_POST['video_position']
	        );
	    }
	}
}
