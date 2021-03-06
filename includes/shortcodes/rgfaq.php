<?php
namespace Really_Good_FAQ\Shortcodes;


class RGFAQ {


	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {

	}


	/**
	 * Output shortcode content.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $atts
	 * @param  string $content
	 */
	public function output( $atts, $content ) {

		$atts = shortcode_atts( array(
			'count' => 10,
			'style' => 1,
			'category' => '',
			'categories' => '',
		), $atts, 'rgfaq' );

		$query_args = array(
			'post_type' => 'question',
			'posts_per_page' => absint( $atts['count'] ),
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'no_found_rows' => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		);

		if ( ! empty( $atts['categories'] ) || ! empty( $atts['category'] ) ) {
			$categories = array_map( 'sanitize_key', preg_split( '/\s*,\s*/', $atts['categories'] ) );

			$query_args['tax_query'][] = array(
				'taxonomy' => 'faq_category',
				'field' => 'slug',
				'terms' => array_merge( (array) $categories, array( $atts['category'] ) ),
				'include_children' => false,
			);
		}

		$faqs = new \WP_Query( $query_args );

		wp_enqueue_style( 'really-good-faq-style-' . absint( $atts['style'] ) );

		ob_start();
			if ( $faqs->posts ) :
				?><div class="faq-list <?php echo sprintf( 'style-%d', $atts['style'] ); ?>"><?php
					foreach ( $faqs->posts as $question ) {
						?><div class="faq">
							<div class="faq-head">
								<div class="question"><?php echo wp_kses_post( $question->post_title ); ?></div>
								<span class="faq-head-sub"></span>
							</div>
							<div class="answer"><?php echo wp_kses_post( wpautop( $question->post_content ) ); ?></div>
						</div><?php
					}
				?></div><?php
			endif;
		return ob_get_clean();
	}


}
