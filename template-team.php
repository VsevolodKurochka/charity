<?php
/**
* Template Name: Команда
*/

$context = Timber::get_context();
$post = new TimberPost();


$context['post'] = $post;

Timber::render( array( 'template-team.twig' ), $context );

//print_r($context);