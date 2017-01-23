<?php 
do_action( 'genesis_home' );

add_action( 'genesis_after_header', 'deborah_home_top' ); 
function deborah_home_top() {
	
echo '<aside class="home-top">';
	
	genesis_widget_area( 'rotator', array( 'before' => '<div class="home-slider wrap">', 'after' => '</div>') );
	
	echo '<div class="home-cta wrap">';
	genesis_widget_area( 'home-cta1', array( 'before' => '<aside class="home-cta1 widget-area">', 'after' => '</aside>') );
	genesis_widget_area( 'home-cta2', array( 'before' => '<aside class="home-cta2 widget-area">', 'after' => '</aside>') );
	genesis_widget_area( 'home-cta3', array( 'before' => '<aside class="home-cta3 widget-area">', 'after' => '</aside>') );
	echo '</div>';

echo '</aside>';
	
}

// Remove the standard loop 
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Execute custom child loop
add_action( 'genesis_loop', 'deborah_home_loop_helper' ); 
function deborah_home_loop_helper() {
	
	genesis_widget_area( 'home-mid1', array( 'before' => '<div class="home-mid1 widget-area">', 'after' => '</div>') );
	genesis_widget_area( 'home-mid2', array( 'before' => '<div class="home-mid2 widget-area">', 'after' => '</div>') );	
	
}

genesis();