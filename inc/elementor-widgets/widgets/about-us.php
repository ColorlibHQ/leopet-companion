<?php
namespace Leopetelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Leopet elementor about us section widget.
 *
 * @since 1.0
 */
class Leopet_About_Us extends Widget_Base {

	public function get_name() {
		return 'leopet-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'right_section_seperator',
            [
                'label' => esc_html__( 'Right Section', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'section_img',
            [
                'label' => esc_html__( 'Section Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sub Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'We care your pet As you care', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'leopet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Us', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'leopet-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'About Section Styles', 'leopet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_txt_col', [
				'label' => __( 'Text Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_bg_col', [
				'label' => __( 'Button Bg Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .btn_1' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Bg Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .btn_1:hover' => 'background: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

    }
    
    public function leopet_get_about_text_section( $section_img, $sec_title, $about_text, $anchor_url, $anchor_txt ) {
        ?>
        <div class="col-md-5">
            <div class="about_text">
                <?php 
                    if ( $section_img ) { 
                        echo $section_img;
                    }
                ?>
                <h2><?php echo esc_html( $sec_title )?></h2>
                <p><?php echo esc_html( $about_text )?></p>
                <a href="<?php echo esc_url( $anchor_url )?>" class="btn_1"><?php echo esc_html( $anchor_txt )?></a>
            </div>
        </div>
        <?php
    }

    public function leopet_get_about_img_section( $about_img ) {
        ?>
        <div class="col-md-6">
            <div class="about_img">
                <?php 
                    if ( $about_img ) { 
                        echo $about_img;
                    }
                ?>
            </div>
        </div>
        <?php
    }

	protected function render() {
    $settings       = $this->get_settings();    
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $left_img       = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'leopet_about_thumb_588x652', '', array('alt' => $sec_title ) ) : '';
    $section_img    = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'leopet_section_thumb_52x48', '', array( 'class' => 'about_icon', 'alt' => 'section image' ) ) : '';
    $about_text     = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $anchor_txt     = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
    $anchor_url     = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    ?>
    
    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <?php
                    $this->leopet_get_about_img_section( $left_img );
                    $this->leopet_get_about_text_section( $section_img, $sec_title, $about_text, $anchor_url, $anchor_txt );
                ?>
            </div>
        </div>
    </section>
    <!-- about part start-->
    <?php

    }
}