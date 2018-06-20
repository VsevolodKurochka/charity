<?php

/**
 * Plugins connect
 */
require get_template_directory() . '/tgm/connect.php';

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});
	
	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/no-timber.html';
	});
	
	return;
}

show_admin_bar( false );


Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'custom-logo' );
		
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_filter('upload_mimes', array($this, 'cc_mime_types'));
		add_action( 'widgets_init', array($this, 'register_my_widgets') );


		$this->add_options_page();
		$this->generate_menu();

		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
		register_post_type('children', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Дети проекта', // основное название для типа записи
				'singular_name'      => 'Дети проекта', // название для одной записи этого типа
				'add_new'            => 'Добавить ребенка', // для добавления новой записи
				'add_new_item'       => 'Добавление ребенкаа', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование ребенкаа', // для редактирования типа записи
				'new_item'           => 'Новый ребенок', // текст новой записи
				'view_item'          => 'Смотреть ребенка', // для просмотра записи этого типа.
				'search_items'       => 'Искать ребенка', // для поиска по этим типам записи
				'not_found'          => 'Не найдено ребенкаа', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Дети проекта', // название меню
			),
			'description'         => '',
			'public'              => true,
			'hierarchical'        => false,
			'supports'            => array('title', 'editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => array(),
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true
		) );
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['menu'] = new TimberMenu('menu-1');
		$context['menu_footer'] = new TimberMenu('menu-2');
		
		$context['site'] = $this;
		$context['options'] = get_fields('option');
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}


	function register_scripts() {
		wp_enqueue_style( 'css-style', get_stylesheet_uri() );

		wp_enqueue_style( 'css-main', get_template_directory_uri() . '/static/build/css/style.css' );

		wp_enqueue_script( 'js-libs', get_template_directory_uri() . '/static/build/js/libs.min.js', array(), '20151215', true );

		wp_enqueue_script( 'js-jquery', get_template_directory_uri() . '/static/build/js/jquery.main.js', array(), '20151215', true );

		wp_enqueue_script( 'js-vanilla-scripts', get_template_directory_uri() . '/static/build/js/vanilla.main.js', array(), '20151215', true );
	}

	function generate_menu() {
		add_theme_support( 'menus' );
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Меню в шапке', 'charity' ),
			'menu-2' => esc_html__( 'Меню в футере', 'charity' )
		) );
	}

	function add_options_page() {
		acf_add_options_page();
	}

	function register_my_widgets(){
		register_sidebar( array(
			'name'          => 'Правая колонка "Дети проекта"',
			'id'            => "sidebar-$i",
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<p class="widget__title">',
			'after_title'   => "</p>\n",
		) );
	}

}

new StarterSite();
