<?php

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();

$sidebar_children_args = array(
	'post_type' 			=> 'children',
	'posts_per_page' 	=> 10,
	'post_status'		 	=> 'publish'
);
$sidebar_context = array();
$sidebar_context['children'] = Timber::get_posts($sidebar_children_args);

$context['sidebar'] = Timber::get_sidebar('sidebar.twig', $sidebar_context);

Timber::render( array( 'archive-children.twig' ), $context );