<?php
namespace Really_Good_FAQ;


class Really_Good_FAQ {

	public $version = '1.0.0';

	public $file = __FILE__;

	private static  $instance;


	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {

	}


	/**
	 * Instance.
	 *
	 * An global instance of the class. Used to retrieve the instance
	 * to use on other files/plugins/themes.
	 *
	 * @since  1.0.0
	 * @return  object Instance of the class.
	 */
	public static  function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;

	}


	/**
	 * Initialize plugin parts.
	 *
	 * @since  1.0.0
	 */
	public function init() {

		// Load textdomain
		$this->load_textdomain();

		// Include files
		$this->includes();

		// Add shortcodes
		$this->add_shortcodes();

		// Post types
		$this->post_types = array(
			'question' => new \Really_Good_FAQ\Post_Types\Question(),
		);

		// Taxonomies
		$this->taxonomies = array(
			'FAQ category' => new \Really_Good_FAQ\Taxonomies\Taxonomy_FAQ_Category(),
		);

		// Admin
		if ( is_admin() ) {
			$this->admin = new \Really_Good_FAQ\Admin\Admin();
			$this->admin->init();
		}
	}


	/**
	 * Textdomain.
	 *
	 * Load the textdomain based on WP language.
	 *
	 * @since  1.0.0
	 */
	public function load_textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), 'really-good-faq' );

		// Load textdomain
		load_textdomain( 'really-good-faq', WP_LANG_DIR . '/really-good-faq/really-good-faq-' . $locale . '.mo' );
		load_plugin_textdomain( 'really-good-faq', false, basename( dirname( __FILE__ ) ) . '/languages' );

	}


	/**
	 * Include files.
	 *
	 * Include/require plugin files/classes.
	 *
	 * @since  1.0.0
	 */
	public function includes() {

		require_once plugin_dir_path( $this->file ) . 'really-good-faq.php';
		require_once plugin_dir_path( $this->file ) . 'includes/admin/admin.php';
		require_once plugin_dir_path( $this->file ) . 'includes/post-types/question.php';
		require_once plugin_dir_path( $this->file ) . 'includes/shortcodes/rgfaq.php';
		require_once plugin_dir_path( $this->file ) . 'includes/core-functions.php';
		require_once plugin_dir_path( $this->file ) . 'includes/taxonomies/faq category.php';

	}


	/**
	 * Add shortcodes
	 *
	 * Add the shortcodes to WordPress with their callbacks to be initialised.
	 *
	 * @since  1.0.0
	 */
	public function add_shortcodes() {

		add_shortcode( 'rgfaq', array( new \Really_Good_FAQ\Shortcodes\RGFAQ(), 'output' ) );

	}


}

/**
 * The main function responsible for returning the Really_Good_FAQ object.
 *
 * Use this function like you would a global variable, except without needing to declare the global.
 *
 * Example: <?php Really_Good_FAQ()->method_name(); ?>
 *
 * @since 1.0.0
 *
 * @return Really_Good_FAQ Return the singleton Really_Good_FAQ object.
 */
function Really_Good_FAQ() {
	return Really_Good_FAQ::instance();
}
Really_Good_FAQ()->init();
