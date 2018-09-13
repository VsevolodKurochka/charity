<?php
/**
* Template Name: Видео
*/

$context = Timber::get_context();
$post = new TimberPost();

$context['post'] = $post;

Timber::render( array( 'template-video.twig' ), $context );