<?php
	require( $module->get_path( 'lib/css/config/general.php' ) );

	// Sidebars
	if( $module->get_root()->get_module( 'sv_sidebar' ) ){
		$check = false;
		$sidebar = $module->get_root()->get_module( 'sv_sidebar' );
		for($i = 1; $i < 3 ;$i++){
			$check = $sidebar->load( $module->get_module_name().'_' . $i ) ? true : false;
		}

		if( $check ){
			include( $module->get_path( 'lib/css/config/sidebars.php' ) );
		}
	}