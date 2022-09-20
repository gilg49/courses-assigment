<?php

/**
 * Registers the `courses` post type.
 */
function courses_init() {
	register_post_type(
		'courses',
		[
			'labels'                => [
				'name'                  => __( 'Courses', 'wp-bootstrap-starter' ),
				'singular_name'         => __( 'Courses', 'wp-bootstrap-starter' ),
				'all_items'             => __( 'All Courses', 'wp-bootstrap-starter' ),
				'archives'              => __( 'Courses Archives', 'wp-bootstrap-starter' ),
				'attributes'            => __( 'Courses Attributes', 'wp-bootstrap-starter' ),
				'insert_into_item'      => __( 'Insert into Courses', 'wp-bootstrap-starter' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Courses', 'wp-bootstrap-starter' ),
				'featured_image'        => _x( 'Featured Image', 'courses', 'wp-bootstrap-starter' ),
				'set_featured_image'    => _x( 'Set featured image', 'courses', 'wp-bootstrap-starter' ),
				'remove_featured_image' => _x( 'Remove featured image', 'courses', 'wp-bootstrap-starter' ),
				'use_featured_image'    => _x( 'Use as featured image', 'courses', 'wp-bootstrap-starter' ),
				'filter_items_list'     => __( 'Filter Courses list', 'wp-bootstrap-starter' ),
				'items_list_navigation' => __( 'Courses list navigation', 'wp-bootstrap-starter' ),
				'items_list'            => __( 'Courses list', 'wp-bootstrap-starter' ),
				'new_item'              => __( 'New Courses', 'wp-bootstrap-starter' ),
				'add_new'               => __( 'Add New', 'wp-bootstrap-starter' ),
				'add_new_item'          => __( 'Add New Courses', 'wp-bootstrap-starter' ),
				'edit_item'             => __( 'Edit Courses', 'wp-bootstrap-starter' ),
				'view_item'             => __( 'View Courses', 'wp-bootstrap-starter' ),
				'view_items'            => __( 'View Courses', 'wp-bootstrap-starter' ),
				'search_items'          => __( 'Search Courses', 'wp-bootstrap-starter' ),
				'not_found'             => __( 'No Courses found', 'wp-bootstrap-starter' ),
				'not_found_in_trash'    => __( 'No Courses found in trash', 'wp-bootstrap-starter' ),
				'parent_item_colon'     => __( 'Parent Courses:', 'wp-bootstrap-starter' ),
				'menu_name'             => __( 'Courses', 'wp-bootstrap-starter' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'courses',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'courses_init' );

/**
 * Sets the post updated messages for the `courses` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `courses` post type.
 */
function courses_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['courses'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Courses updated. <a target="_blank" href="%s">View Courses</a>', 'wp-bootstrap-starter' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-bootstrap-starter' ),
		3  => __( 'Custom field deleted.', 'wp-bootstrap-starter' ),
		4  => __( 'Courses updated.', 'wp-bootstrap-starter' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Courses restored to revision from %s', 'wp-bootstrap-starter' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Courses published. <a href="%s">View Courses</a>', 'wp-bootstrap-starter' ), esc_url( $permalink ) ),
		7  => __( 'Courses saved.', 'wp-bootstrap-starter' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Courses submitted. <a target="_blank" href="%s">Preview Courses</a>', 'wp-bootstrap-starter' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Courses scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Courses</a>', 'wp-bootstrap-starter' ), date_i18n( __( 'M j, Y @ G:i', 'wp-bootstrap-starter' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Courses draft updated. <a target="_blank" href="%s">Preview Courses</a>', 'wp-bootstrap-starter' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'courses_updated_messages' );

/**
 * Sets the bulk post updated messages for the `courses` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `courses` post type.
 */
function courses_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['courses'] = [
		/* translators: %s: Number of Courses. */
		'updated'   => _n( '%s Courses updated.', '%s Courses updated.', $bulk_counts['updated'], 'wp-bootstrap-starter' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Courses not updated, somebody is editing it.', 'wp-bootstrap-starter' ) :
						/* translators: %s: Number of Courses. */
						_n( '%s Courses not updated, somebody is editing it.', '%s Courses not updated, somebody is editing them.', $bulk_counts['locked'], 'wp-bootstrap-starter' ),
		/* translators: %s: Number of Courses. */
		'deleted'   => _n( '%s Courses permanently deleted.', '%s Courses permanently deleted.', $bulk_counts['deleted'], 'wp-bootstrap-starter' ),
		/* translators: %s: Number of Courses. */
		'trashed'   => _n( '%s Courses moved to the Trash.', '%s Courses moved to the Trash.', $bulk_counts['trashed'], 'wp-bootstrap-starter' ),
		/* translators: %s: Number of Courses. */
		'untrashed' => _n( '%s Courses restored from the Trash.', '%s Courses restored from the Trash.', $bulk_counts['untrashed'], 'wp-bootstrap-starter' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'courses_bulk_updated_messages', 10, 2 );
