<?php
/*
Plugin Name: Magic Dates
Plugin URI: http://theportraitofageek.com
Description: A simple shortcode that lets you create auto increased dates in your content.
Version: 1.0
Author: Gerasimos Tsiamalos
Author URI: http://theportraitofageek.com/
*/

function tpoag_magic_date( $atts, $content = null ) {
	extract( shortcode_atts( array('ordinalize' => 'false' ), $atts ) );
	$current_year = date('Y');
	$magic_date = $current_year - $content;
	if ($ordinalize == 'true') {
		return $magic_date . tpoag_ordinalizer($magic_date);
	}
	else return $magic_date;
}

function tpoag_ordinalizer($ordnum) {
	$ordinalsuffixes = array("th","st","nd","rd");
	for($i=1;$i<=3;$i++)
  		{ if(($ordnum % 10 == $i) && ($ordnum % 100 != 10+$i )) return $ordinalsuffixes[$i]; }	
	return $ordinalsuffixes[0] ;
} 

add_shortcode( 'magicdate', 'tpoag_magic_date' );

?>