<?php
/**
* Template Name: Партнеры
*/

$context = Timber::get_context();
$post = new TimberPost();


$context['post'] = $post;

Timber::render( array( 'template-partners.twig' ), $context );

//print_r($context);