<?php
/**
* Template Name: Оплата
*/

$context = Timber::get_context();
$post = new TimberPost();


$context['post'] = $post;

Timber::render( array( 'template-payment.twig' ), $context );

//print_r($context);