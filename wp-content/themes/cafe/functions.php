<?php
add_action('init','create_drink_post_type', 0);
function create_drink_post_type() {
	register_post_type(
		'drink',
		array(
			'label' => 'ドリンク',
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'rewrite' => false,
			'query_var' => false,
			'supports' => array(
			'title',
			'editor'
			),
		)
	);
}
add_action('init','create_food_post_type',0);
function create_food_post_type() {
	register_post_type(
		'food',
		array(
			'label' => 'フード',
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'rewrite' => false,
			'query_var' => false,
			'supports' => array(
			'title',
			'editor'
			),
		)
	);
}
?>