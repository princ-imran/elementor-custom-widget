<?php
namespace Thenobility\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Thenobility_History_Section extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'thenobility-history-section';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Thenobility History Section', 'thenobility-toolkit' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-history';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'thenobility' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		// Content Controls
  		$this->start_controls_section(
  			'thenobility_history_section',
  			[
  				'label' => esc_html_x( 'History Section','Admin Panel','thenobility-toolkit' )
  			]
  		); 
 
        $this->add_control(
			'history_section_title',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("Heading Text", 'Admin Panel','thenobility-toolkit'),			
			]
		);      

               
        $this->add_control(
          'history_section_description',
          [
             'label'   => __( 'Description', 'your-plugin' ),
             'type'    => Controls_Manager::TEXTAREA,
             'default' => __( 'Default description', 'thenobility-toolkit' ),
          ]
        );
        
        $this->add_control(
          'history_section_link',
          [
             'label' => __( 'Website URL', 'thenobility-toolkit' ),
             'type' => Controls_Manager::URL,
             'default' => [
                'url' => 'http://',
                'is_external' => '',
             ],
             'show_external' => true, // Show the 'open in new tab' button.
          ]
        );

		$this->end_controls_section();
        
	
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render( ) {

		$settings = $this->get_settings();
               
        //Website Link
        $history_section_link = $this->get_settings( 'history_section_link' );
        $url = $history_section_link['url'];
        $target = $history_section_link['is_external'] ? 'target="_blank"' : '';
    ?>      
       <div class="about-content section-padding">
            <h2><?php echo $settings["history_section_title"]; ?></h2>
            <p><?php echo   $settings['history_section_description']  ; ?></p>
            <a class="savechild-btn about-btn" href="<?php echo $url; ?>">Read More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>        

        

    <?php   

	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function content_template() {
       
	}
}
