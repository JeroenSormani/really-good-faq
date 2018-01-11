<?php
namespace Really_Good_FAQ\Taxonomies;


class Taxonomy_FAQ_Category {


	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {

		// Register custom taxonomy
		add_action( 'init', array( $this, 'register' ) );

	}


	/**
	 * Register custom taxonomy.
	 *
	 * @since  1.0.0
	 */
	public function register() {

		$labels = apply_filters( 'really-good-faq\taxonomy\FAQ category\labels', array(
			'name'              => __( 'Categories', 'really-good-faq' ),
			'singular_name'     => __( 'Category', 'really-good-faq' ),
			'search_items'      => __( 'Search Categories', 'really-good-faq' ),
			'all_items'         => __( 'All Categories', 'really-good-faq' ),
			'parent_item'       => __( 'Parent Category', 'really-good-faq' ),
			'parent_item_colon' => __( 'Parent Category:', 'really-good-faq' ),
			'edit_item'         => __( 'Edit Category', 'really-good-faq' ),
			'update_item'       => __( 'Update Category', 'really-good-faq' ),
			'add_new_item'      => __( 'Add New Category', 'really-good-faq' ),
			'new_item_name'     => __( 'New Category Name', 'really-good-faq' ),
			'menu_name'         => __( 'Categories', 'really-good-faq' ),
		) );

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'faq_category' ),
		);

		register_taxonomy( 'faq_category', array( 'question' ), $args );

	}


}