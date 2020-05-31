<?php
	namespace sv100;
	
	/**
	 * @version         4.000
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			4.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_header_bar extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header Bar', 'sv100' ) )
				->set_module_desc( __( 'Manages the header bar.', 'sv100' ) )
				->load_settings()
				->register_scripts()
				->register_sidebars()
				->set_section_title( __( 'Header Bar', 'sv100' ) )
				->set_section_desc( __( 'Widget & Color Settings', 'sv100' ) )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				->set_section_order(21 )
				->get_root()
				->add_section( $this );
		}
		
		protected function load_settings(): sv_header_bar {
			$this->load_settings_general()->load_settings_sidebars();

			return $this;
		}

		protected function load_settings_general(): sv_header_bar {
			// General
			$this->get_setting( 'max_width' )
				->set_title( __( 'Max Width Container', 'sv100' ) )
				->set_description( __( 'Set the max width of the sidebar container.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_common' )->get_max_width_options() )
				->set_default_value( '100vw' )
				->set_is_responsive( true )
				->load_type( 'select' );
			
			$this->get_setting( 'max_width_inner' )
			     ->set_title( __( 'Max Width Inner', 'sv100' ) )
			     ->set_description( __( 'Set the max width of the sidebar inner.', 'sv100' ) )
			     ->set_options( $this->get_module( 'sv_common' )->get_max_width_options() )
			     ->set_default_value( '1300px' )
			     ->set_is_responsive( true )
			     ->load_type( 'select' );

			// Font
			$this->get_setting( 'font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->set_is_responsive( true )
				->load_type( 'select' );

			$this->get_setting( 'font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_default_value( 13 )
				->set_is_responsive( true )
				->load_type( 'number' );

			$this->get_setting( 'line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_default_value( '1' )
				->set_is_responsive( true )
				->load_type( 'text' );

			// Colors
			$this->get_setting( 'text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '255,255,255,1' )
				->set_is_responsive( true )
				->load_type( 'color' );

			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '41,43,45,1' )
				->set_is_responsive( true )
				->load_type( 'color' );

			// Spacing
			$this->get_setting( 'margin' )
				->set_title( __( 'Margin', 'sv100' ) )
				->set_is_responsive( true )
				->set_default_value( array(
					'top'       => '0',
					'right'     => 'auto',
					'bottom'    => '0',
					'left'      => 'auto',
				) )
				->load_type( 'margin' );

			$this->get_setting( 'padding' )
				->set_title( __( 'Padding', 'sv100' ) )
				->set_is_responsive( true )
				->set_default_value( array(
					'top'       => '10px',
					'right'     => '15px',
					'bottom'    => '10px',
					'left'      => '15px',
				) )
				->load_type( 'margin' );

			// Border
			$this->get_setting( 'border' )
				->set_title( __( 'Border', 'sv100' ) )
				->set_description( __( 'Border', 'sv100' ) )
				->load_type( 'border' );

			return $this;
		}

		protected function load_settings_sidebars(): sv_header_bar {
			// Columns
			$this->get_setting( 'direction' )
				->set_title( __( 'Content Direction', 'sv100' ) )
				->set_options( array(
					'row'		=> __( 'Horizontal', 'sv100' ),
					'column'	=> __( 'Vertical', 'sv100' ),
				) )
				->set_default_value( 'row' )
				->set_description( __( 'The direction of columns.', 'sv100' ) )
				->set_is_responsive( true )
				->load_type( 'select' );

			for ( $i = 1; $i < 3; $i++ ) {
				$this->get_setting( 'sidebar_' . $i . '_alignment' )
					->set_title( __( 'Copyright - ' . $i, 'sv100' ) )
					->set_options( array(
						'flex-start'	=> __( 'Left', 'sv100' ),
						'center'		=> __( 'Center', 'sv100' ),
						'flex-end'		=> __( 'Right', 'sv100' )
					) )
					->set_default_value( 'flex-start' )
					->set_is_responsive( true )
					->load_type( 'select' );
			}

			for ( $i = 1; $i < 3; $i++ ) {
				$this->get_setting( 'sidebar_' . $i . '_alignment_content' )
					->set_title( __( 'Copyright - ' . $i, 'sv100' ) )
					->set_options( array(
						'left'	    => __( 'Left', 'sv100' ),
						'center'	=> __( 'Center', 'sv100' ),
						'right'		=> __( 'Right', 'sv100' ),
					) )
					->set_default_value( 'center' )
					->set_is_responsive( true )
					->load_type( 'select' );
			}

			return $this;
		}
	
		protected function register_scripts(): sv_header_bar {
			// Register Styles
			$this->get_script( 'common' )
				->set_path( 'lib/frontend/css/common.css' );
			
			// Inline Config
			$this->get_script( 'config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true );
	
			return $this;
		}

		protected function register_sidebars(): sv_header_bar {
			if ( $this->get_module( 'sv_sidebar' ) ) {
				$this->get_module( 'sv_sidebar' )
					->create( $this )
					->set_ID( 1 )
					->set_title( __( 'Header Bar - 1', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar()

					->create( $this )
					->set_ID( 2 )
					->set_title( __( 'Header Bar - 2', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown.', 'sv100' ) )
					->load_sidebar();
			}

			return $this;
		}

		public function has_header_content(): bool {
			$check = false;
			if ( $this->get_module( 'sv_sidebar' ) ) {

				for ( $i = 1; $i < 3; $i++ ) {
					if ( $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_'.$i ) ) ) {
						$check = true;
					}
				}
			}

			return $check;
		}

		public function load( $settings = array() ): string {
			$settings = shortcode_atts(
				array(
					'inline' => true,
				),
				$settings,
				$this->get_module_name()
			);

			return $this->load_template( $settings );
		}

		// Loads the templates
		protected function load_template( array $settings ): string {
			if ( ! $this->has_header_content() ) return '';

			ob_start();

			// Loads the scripts
			$this->get_script( 'common' )->set_is_enqueued();
			$this->get_script( 'config' )->set_is_enqueued();

			// Loads the template
			$path = $this->get_path('lib/frontend/tpl/default.php' );

			require ( $path );
			$output	= ob_get_contents();

			ob_end_clean();

			return $output;
		}
	}