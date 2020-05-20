<?php
// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
// This reduces the lines of code for the needed setting values.
foreach ( $script->get_parent()->get_settings() as $setting ) {
	${ $setting->get_ID() } = $setting->get_data();
}

// General
include( $script->get_parent()->get_path( 'lib/frontend/css/config/general.php' ) );

// Sidebars
if( $script->get_parent()->get_root()->get_module( 'sv_sidebar' ) ){
	$check = false;
	$sidebar = $script->get_parent()->get_root()->get_module( 'sv_sidebar' );
	for($i = 1; $i < 3 ;$i++){
		$check = $sidebar->load( array( 'id' => $script->get_parent()->get_module_name().'_' . $i ) ) ? true : false;
	}

	if( $check ){
		include( $script->get_parent()->get_path( 'lib/frontend/css/config/sidebars.php' ) );
	}
}