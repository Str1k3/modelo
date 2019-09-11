<?php

function autoviacao_scripts() {
	wp_enqueue_style( 'autoviacao', get_template_directory_uri() . '/style.css', '', wp_get_theme( 'autoviacao' )['Version'] );

	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1.14.7', true );
	wp_enqueue_script( 'twbs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery', 'popper' ), '4.3.1', true );
}
add_action( 'wp_enqueue_scripts', 'autoviacao_scripts', 10 );
