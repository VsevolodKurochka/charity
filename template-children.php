<?php
/**
* Template Name: Все дети
*/

$context = Timber::get_context();
$post = new TimberPost();

$args = array(
	'post_type' 			=> 'children',
	'posts_per_page' 	=> -1,
	'post_status'		 	=> 'publish'
);

$context['post'] = $post;
$context['children'] = Timber::get_posts( $args );

Timber::render( array( 'template-children.twig' ), $context );