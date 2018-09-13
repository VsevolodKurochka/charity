<?php

$context = Timber::get_context();
$post = new TimberPost();


if(get_locale() == 'ru_RU'){
	$lang = 'ru';
}else{
	$lang = 'en';
}

$sidebar_args = array(
	'post_type' 				=> 'children',
	'posts_per_page' 		=> 10,
	'orderby'						=> 'rand',
	'post_status'		 		=> 'publish',
	'meta_key'					=> 'child_lang',
	'meta_value'				=> $lang
);

$sidebar_context = array();
$sidebar_context['children'] = Timber::get_posts($sidebar_args);

$context['post'] = $post;
$context['sidebar'] = Timber::get_sidebar('sidebar.twig', $sidebar_context);

Timber::render( array( 'single-children.twig' ), $context );