<?php
	namespace sv100;

	class sv_header_bar extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header Bar', 'sv100' ) )
				->set_module_desc( __( 'Manages the header bar.', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(2000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 8h24v16h-24v-16zm0-8v6h24v-6h-24z"/></svg>')
				->load_settings()
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_header_bar {
			// General
			$this->get_setting( 'max_width' )
				->set_title( __( 'Max Width Container', 'sv100' ) )
				->set_description( __( 'Set the max width of the sidebar container.', 'sv100' ) )
				->set_options( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_max_width_options() : array('' => __('Please activate module SV Common for this Feature.', 'sv100')) )
				->set_default_value( '100vw' )
				->set_is_responsive( true )
				->load_type( 'select' );
			
			$this->get_setting( 'max_width_inner' )
				 ->set_title( __( 'Max Width Inner', 'sv100' ) )
				 ->set_description( __( 'Set the max width of the sidebar inner.', 'sv100' ) )
				 ->set_options( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_max_width_options() : array('' => __('Please activate module SV Common for this Feature.', 'sv100')) )
				 ->set_default_value( '1300px' )
				 ->set_is_responsive( true )
				 ->load_type( 'select' );

			$this->get_setting( 'sidebar' )
				->set_title( __( 'Sidebar', 'sv100' ) )
				->set_description( __( 'Select Sidebar', 'sv100' ) )
				->set_options( $this->get_module('sv_sidebar') ? $this->get_module('sv_sidebar')->get_sidebars_for_settings_options() : array('' => __('Please activate module SV Sidebar for this Feature.', 'sv100')) )
				->load_type( 'select' );

			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '41,43,45,1' )
				->set_is_responsive( true )
				->load_type( 'color' );

			return $this;
		}

		public function has_header_content(): bool {
			if ( !$this->get_module( 'sv_sidebar' ) ) {
				return false;
			}

			if( $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar')->get_data() ) ) {
				return true;
			}

			return false;
		}
		public function load( $settings = array() ): string {
			if(is_admin() || !$this->has_header_content()){
				return '';
			}

			foreach($this->get_scripts() as $script){
				$script->set_is_enqueued();
			}

			ob_start();
			require ( $this->get_path('lib/tpl/frontend/default.php' ) );
			$output							= ob_get_clean();

			return $output;
		}
	}