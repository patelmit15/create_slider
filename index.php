<?php
/*
Plugin Name: Create Slider
Plugin URI: 
Description: A plugin for create Slider of multiple Images. Add shortcode [custom_slider url="image_url,image_url,image_url"] in any page to get slider of images.
Author: It's my Plugin
Version: 1.0
Author URI: 
*/

function create_slider_function( $atts, $content = null ) {
  
    // set up default parameters
    extract(shortcode_atts(array(
        'url' => ''
    ), $atts));

    
    $ids_array = explode( ',', $url );

    $output .= '  <div id="myCarousel" class="carousel slide" data-ride="carousel" >';
    $i=0;
    $output .= '<ol class="carousel-indicators">';
        foreach ( $ids_array as $img_url ){
            
              $output .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class=""></li>';
            
            $i++;
        }
        $output .= '</ol>';
        

    $output .= '<div class="carousel-inner">';
      foreach ( $ids_array as $img_url ){
        $output .= '<div class="item ">
            <img src="'.$img_url.'" alt="Los Angeles" style="width:100%;">
          </div>';
      }

    $output .= '<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>';
            
            
    return $output;
}
add_shortcode('custom_slider', 'create_slider_function');


function wptuts_scripts_basic_new()
{
  
    wp_register_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css',__FILE__ );
    wp_enqueue_style('bootstrap_css');


    wp_register_script( 'jquery.min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', __FILE__ ) ;
    wp_register_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js', __FILE__  );
    wp_register_script( 'custom-js', plugins_url( '/js/custom.js', __FILE__ ));
    wp_enqueue_script( 'jquery.min' );
    wp_enqueue_script( 'bootstrap_js' );
    wp_enqueue_script( 'custom-js' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic_new' );