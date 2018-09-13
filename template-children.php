<?php
/**
* Template Name: Наши дети
*/

$context = Timber::get_context();
$post = new TimberPost();

global $paged;

if (!isset($paged) || !$paged){
	$paged = 1;
}

if(get_locale() == 'ru_RU'){
	$lang = 'ru';
}else{
	$lang = 'en';
}

$args = array(
	'post_type' 			=> 'children',
	'posts_per_page' 	=> 2,
	'post_status'		 	=> 'publish',
	'paged' 					=> $paged,
	'meta_key'				=> 'child_lang',
	'meta_value'			=> $lang
);

$sidebar_args = array(
	'post_type' 				=> 'children',
	'posts_per_page' 		=> 10,
	'orderby'						=> 'rand',
	'post_status'		 		=> 'publish',
	'meta_key'					=> 'child_lang',
	'meta_value'				=> $lang
);

// WP query
$posts_wp = new WP_Query( $args );

// passing data for Timber
$posts = Timber::query_posts( $posts_wp );

$context['wp_pagenavi'] = wp_pagenavi(
	[
		'echo' => false,
		'query' => $posts_wp,
	]
);

$context['post'] = $post;
$context['children'] = $posts;

$sidebar_context = array();
$sidebar_context['children'] = Timber::get_posts($sidebar_args);

$context['sidebar'] = Timber::get_sidebar('sidebar.twig', $sidebar_context);

Timber::render( array( 'template-children.twig' ), $context );