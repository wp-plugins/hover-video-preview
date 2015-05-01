<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hover_Video_Preview
 * @subpackage Hover_Video_Preview/public
 * @author     Jason Pancake <jason@flapjacklabs.com>
 */
class Hover_Video_Preview_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->register_shortcodes();
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
		 * defined in Hover_Video_Preview_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hover_Video_Preview_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_style( 'tooltipster', plugin_dir_url( __FILE__ ) . 'vendor/tooltipster/css/tooltipster.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hover-video-preview-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hover_Video_Preview_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hover_Video_Preview_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_script( 'youtube', '//www.youtube.com/iframe_api', array(), $this->version, false );
        wp_enqueue_script( 'tooltipster', plugin_dir_url( __FILE__ ) . 'vendor/tooltipster/js/jquery.tooltipster.min.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hover-video-preview-public.js', array( 'jquery' ), $this->version, false );
	}

    /**
     * Registers the shortcodes
     */
    public function register_shortcodes() {
        add_shortcode( 'hover_video_preview', array( $this, 'shortcode_hover_video_preview' ) );
    }

    /**
     * Returns the code necessary to
     *
     * @param $atts
     * @param $content
     * @param $tag
     */
    public function shortcode_hover_video_preview( $atts, $content, $tag ) {
        $a = shortcode_atts( array(
            'id'       => '',
            'video_id' => '',
            'class'    => '',
            'provider' => 'youtube',
        ), $atts );

        $id       = $a['id'];
        $video_id = $a['video_id'];
        $class    = $a['class'];
        $src      = $a['src'];
        $alt      = $a['alt'];
        $provider = $a['provider'];

        return <<< EOT
            <div id="$id" class="hvp-container $class" data-provider="$provider" data-video-id="$video_id">$content</div>
EOT;
    }

}
