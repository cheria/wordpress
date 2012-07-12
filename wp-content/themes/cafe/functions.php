<?php
<!-- custom -->
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
	'register_meta_box_cb' => 'drink_meta_box'
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
    'register_meta_box_cb' => 'food_meta_box'
  );
}

<!-- custom taxonomy -->
add_action('init','create_drink_ct',0);
function create_drink_ct() {
  register_taxonomy(
    'drinktype',
	'drink',
	array(
	  'hierarchical' => true,
	  'label' => 'ドリンクタイプ',
	  'singular_name' => 'ドリンクタイプ',
	  'query_var' => true,
	  'rewrite' => true
	)
  );
}

add_action('init','create_food_ct',0);
function create_food_ct() {
  register_taxonomy(
	'foodtype',
	'food',
	array(
	  'hierarchical' => true,
	  'label' => 'フードタイプ',
	  'singular_name' => 'フードタイプ',
	  'query_var' => true,
	  'rewrite' => true
	)
  );
}




function drink_meta_box($POST){
  add_meta_box('menu_meta', 'メニュー情報', 'menu_meta_html', 'drink', 'normal', 'high');
}
function food_meta_box($POST){
  add_meta_box('menu_meta', 'メニュー情報', 'menu_meta_html', 'food', 'normal', 'high');
}
function menu_meta_html($post, $box){
  $price = get_post_meta($post->ID, 'price', true);
  echo wp_nonce_field('menu_meta', 'menu_meta_nonce');
  echo '<p>価格:<input type="text" size="50" name="price" value="'.$spice.'">（半角数字）</p>';
}

add_action('save_post', 'menu_meta_update');
function menu_meta_update($post_id){
  if(!wp_verify_nonce( $_POST['menu_meta_nonce'], 'menu_meta' ))
	return $post_id;

  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
	return $post_id;

  if('drink' == $_POST['post_type'] || 'food' == $_POST['post_type'] ) {
	if(!current_user_can('edit_post', $post_id))
	  return $post_id;
  } else {
	return $post_id;
  }

  $price = $_POST['price'];
  if($price == '') {
  	delete_post_meta($post_id, 'price');
  } else {
  	update_post_meta($post_id, 'price', $price);
  }
}

<!-- menu -->
add_theme_support('post-thumbnails');
add_theme_support('menus');
?>