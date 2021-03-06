<?php
/**
* Template Name: Новости
*/

$context = Timber::get_context();
$post = new TimberPost();

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}
$args = array(
	'post_type' 			=> 'post',
	'posts_per_page' 	=> 6,
	'post_status'		 	=> 'publish',
	'paged' => $paged
);

$context['post'] = $post;
$context['blog'] = new Timber\PostQuery($args);

$context['sidebar'] = Timber::get_widgets('blog_sidebar');

Timber::render( array( 'template-blog.twig' ), $context );
