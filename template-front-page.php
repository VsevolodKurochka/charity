<?php
/**
* Template Name: Front Page
*/

$context = Timber::get_context();
$post = new TimberPost();


$args = array(
	'post_type' 			=> 'main_children',
	'posts_per_page' 	=> 4,
	'post_status'		 	=> 'publish'
);
$context['main_children'] = new Timber\PostQuery($args);

$context['post'] = $post;

Timber::render( array( 'template-front-page.twig' ), $context );

//print_r($context);