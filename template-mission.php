<?php
/**
* Template Name: Наша миссия
*/

$context = Timber::get_context();
$post = new TimberPost();


$context['post'] = $post;

Timber::render( array( 'template-mission.twig' ), $context );

//print_r($context);