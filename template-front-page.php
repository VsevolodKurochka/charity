<?php
/**
* Template Name: Front Page
*/

$context = Timber::get_context();
$post = new TimberPost();


$context['post'] = $post;
$context['lang'] = get_locale();

Timber::render( array( 'template-front-page.twig' ), $context );

//print_r($context);