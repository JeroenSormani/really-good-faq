<?php
namespace Really_Good_FAQ\Post_Types;


class Question {


	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {

		// Register post type
		add_action( 'init', array( $this, 'register' ) );

	}


	/**
	 * Register custom post type.
	 *
	 * @since  1.0.0
	 */
	public function register() {

		$labels = apply_filters( 'really-good-faq\post_type\question\labels', array(
			'name'               => __( 'Question', 'really-good-faq' ),
			'singular_name'      => __( 'Question', 'really-good-faq' ),
			'menu_name'          => __( 'Questions', 'really-good-faq' ),
			'name_admin_bar'     => __( 'Question', 'really-good-faq' ),
			'add_new'            => __( 'Add New', 'really-good-faq' ),
			'add_new_item'       => __( 'Add New Question', 'really-good-faq' ),
			'new_item'           => __( 'New Question', 'really-good-faq' ),
			'edit_item'          => __( 'Edit Question', 'really-good-faq' ),
			'view_item'          => __( 'View Question', 'really-good-faq' ),
			'all_items'          => __( 'Questions', 'really-good-faq' ),
			'search_items'       => __( 'Search Questions', 'really-good-faq' ),
			'parent_item_colon'  => __( 'Parent Questions:', 'really-good-faq' ),
			'not_found'          => __( 'No Questions found.', 'really-good-faq' ),
			'not_found_in_trash' => __( 'No Questions found in Trash.', 'really-good-faq' )
		) );

		$post_type_args = array(
			'labels'               => $labels,
			'public'               => false,
			'publicly_queryable'   => false,
			'show_ui'              => true,
			'show_in_menu'         => true,
			'query_var'            => true,
			'rewrite'              => false,
			'capability_type'      => 'post',
			'has_archive'          => true,
			'hierarchical'         => true,
			'menu_position'        => null,
			'menu_icon'            => 'dashicons-admin-post',
			'supports'             => array( 'title', 'editor', 'page-attributes' ),
		);

		register_post_type( 'question', $post_type_args );

	}


}