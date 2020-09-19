<?php
	require( $script->get_parent()->get_path( 'lib/css/config/general.php' ) );

	// Sidebars
	if( $script->get_parent()->get_root()->get_module( 'sv_sidebar' ) ){
		$check = false;
		$sidebar = $script->get_parent()->get_root()->get_module( 'sv_sidebar' );
		for($i = 1; $i < 3 ;$i++){
			$check = $sidebar->load( array( 'id' => $script->get_parent()->get_module_name().'_' . $i ) ) ? true : false;
		}

		if( $check ){
			include( $script->get_parent()->get_path( 'lib/css/config/sidebars.php' ) );
		}
	}