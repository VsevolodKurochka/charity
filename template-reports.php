<?php
/**
* Template Name: Отчеты
*/

$context = Timber::get_context();
$post = new TimberPost();


$context['post'] = $post;

Timber::render( array( 'template-reports.twig' ), $context );

//print_r($context);