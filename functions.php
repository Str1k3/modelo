<?php

function model_scripts() {
	wp_enqueue_style( 'model', get_template_directory_uri() . '/style.css', array(), wp_get_theme( 'model' )['Version'] );

	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1.14.7', true );
	wp_enqueue_script( 'twbs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array( 'jquery', 'popper' ), '4.4.1', true );
}
add_action( 'wp_enqueue_scripts', 'model_scripts', 10 );


function register_menus() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'model' ) );
	register_nav_menu( 'secondary', __( 'Secondary Menu', 'model' ) );
}
add_action( 'after_setup_theme', 'register_menus' );

function customize_register_options( $wp_customize ) {
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default'    => '',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		),
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'site_logo',
			array(
				'label'       => __( 'Site Logo', 'model' ),
				'description' => __( 'Faça upload da sua logo', 'model' ),
				'settings'    => 'site_logo',
				'priority'    => 10,
				'section'     => 'title_tagline',
			)
		)
	);

	$wp_customize->add_setting(
		'social_facebook_url',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'customizer_sanitize_url',
		)
	);

	$wp_customize->add_control(
		'social_facebook_url',
		array(
			'type'        => 'url',
			'section'     => 'title_tagline',
			'label'       => __( 'Facebook URL', 'model' ),
			'description' => __( 'Digite a URL do perfil do Facebook', 'model' ),
			'input_attrs' => array(
				'placeholder' => 'https://www.facebook.com/profile',
			),
		)
	);

	$wp_customize->add_setting(
		'social_instagram_url',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'customizer_sanitize_url',
		)
	);

	$wp_customize->add_control(
		'social_instagram_url',
		array(
			'type'        => 'url',
			'section'     => 'title_tagline',
			'label'       => __( 'Instagram URL', 'model' ),
			'description' => __( 'Digite a URL do perfil do Instagram', 'model' ),
			'input_attrs' => array(
				'placeholder' => 'https://www.instagram.com/profile',
			),
		)
	);

	$wp_customize->add_setting(
		'social_twitter_url',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'customizer_sanitize_url',
		)
	);

	$wp_customize->add_control(
		'social_twitter_url',
		array(
			'type'        => 'url',
			'section'     => 'title_tagline',
			'label'       => __( 'Twitter URL', 'model' ),
			'description' => __( 'Digite a URL do perfil do Twitter', 'model' ),
			'input_attrs' => array(
				'placeholder' => 'https://www.twitter.com/profile',
			),
		)
	);

	$wp_customize->add_setting(
		'social_whatsapp_number',
		array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'social_whatsapp_number',
		array(
			'type'        => 'text',
			'section'     => 'title_tagline',
			'label'       => __( 'Número Whatsapp', 'model' ),
			'description' => __( 'Digite o número do Whatsapp (PAÍS-DDD-NÚMERO)', 'model' ),
			'input_attrs' => array(
				'placeholder' => '55-99-999999999',
			),
		)
	);

	$wp_customize->add_setting(
		'copyright',
		array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'copyright',
		array(
			'type'        => 'text',
			'section'     => 'title_tagline',
			'label'       => __( 'Copyright', 'model' ),
			'description' => __( 'Digite o copyright do footer', 'model' ),
			'input_attrs' => array(
				'placeholder' => __( 'Copyright © 2020 Company. Todos os direitos reservados.', 'model' ),
			),
		)
	);

}
add_action( 'customize_register', 'customize_register_options' );

function customizer_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

function register_navwalker() {
	require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_filter(
	'search_form_format',
	function() {
		return 'html5';
	}
);

add_theme_support( 'post-thumbnails' );

function register_widget_areas() {
	register_sidebar(
		array(
			'name'          => __( 'Rodapé 1', 'model_basic' ),
			'id'            => 'footer_area_one',
			'description'   => __( 'Widgets nessa área serão exibidos na primeira coluna do rodapé.', 'model_basic' ),
			'before_widget' => '<section class="footer-area footer-area-one">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Rodapé 2', 'model_basic' ),
			'id'            => 'footer_area_two',
			'description'   => __( 'Widgets nessa área serão exibidos na segunda coluna do rodapé.', 'model_basic' ),
			'before_widget' => '<section class="footer-area footer-area-two">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Rodapé 3', 'model_basic' ),
			'id'            => 'footer_area_three',
			'description'   => __( 'Widgets nessa área serão exibidos na terceira coluna do rodapé.', 'model_basic' ),
			'before_widget' => '<section class="footer-area footer-area-three">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Rodapé 4', 'model_basic' ),
			'id'            => 'footer_area_four',
			'description'   => __( 'Widgets nessa área serão exibidos na quarta coluna do rodapé.', 'model_basic' ),
			'before_widget' => '<section class="footer-area footer-area-four">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Rodapé 5', 'model_basic' ),
			'id'            => 'footer_area_five',
			'description'   => __( 'Widgets nessa área serão exibidos na quinta coluna do rodapé.', 'model_basic' ),
			'before_widget' => '<section class="footer-area footer-area-five">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
}

add_action( 'widgets_init', 'register_widget_areas' );

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
