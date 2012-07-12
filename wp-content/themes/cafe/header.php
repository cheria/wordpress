<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title><?php bloginfo('name'); ?></title>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="Screen">
  	<div id="Header">
  	  <h1><a href="<?php bloginfo('url'); ?>"<?php bloginfo('name'); ?>></a></h1>
  	  <div class="parallel"><?php wp_nav_menu('menu=global'); ?></div>
  	</div>
  	<div id="Contents" class="parallel">
      <div id="Side"><?php get_sidebar(); ?></div>
  	<div id="main">