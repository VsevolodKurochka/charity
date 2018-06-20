<?php
/**
 * The Template for the sidebar containing the main widget area
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$context = array();

$args = array(
	'post_type' 			=> 'children',
	'posts_per_page' 	=> -1,
	'post_status'		 	=> 'publish'
);
$context['test'] = Timber::get_posts( $args );

Timber::render( array( 'sidebar.twig' ), $context );
