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
 * Leopet elementor adopt section widget.
 *
 * @since 1.0
 */
class Leopet_Adopt_Section extends Widget_Base {

	public function get_name() {
		return 'leopet-adopt-section';
	}

	public function get_title() {
		return __( 'Adopt Section', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Adopt Section content ------------------------------
        $this->start_controls_section(
            'adopt_section_content',
            [
                'label' => __( 'Adopt Section Content', 'leopet-companion' ),
            ]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'We need your help Adopt Us', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Working in conjunction with humanitarian aid agencies, we have supported programmes alleviate human.', 'leopet-companion' ),
            ]
        );

        $this->add_control(
            'counter1_section_seperator',
            [
                'label' => esc_html__( 'Counter 1 Section', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'counter1_img',
            [
                'label' => esc_html__( 'Counter 1 Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'counter1_value',
            [
                'label' => esc_html__( 'Counter 1 Value', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '590', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'counter1_txt',
            [
                'label' => esc_html__( 'Counter 1 Text', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Pets Available', 'leopet-companion' ),
            ]
        );

        $this->add_control(
            'counter2_section_seperator',
            [
                'label' => esc_html__( 'Counter 2 Section', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'counter2_img',
            [
                'label' => esc_html__( 'Counter 2 Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'counter2_value',
            [
                'label' => esc_html__( 'Counter 2 Value', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '300', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'counter2_txt',
            [
                'label' => esc_html__( 'Counter 2 Text', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Happy Clients', 'leopet-companion' ),
            ]
        );

        $this->add_control(
            'button_section_seperator',
            [
                'label' => esc_html__( 'Button Section', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Browse Now', 'leopet-companion' ),
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

        $this->add_control(
            'right_section_seperator',
            [
                'label' => esc_html__( 'Right Section', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'right_img',
            [
                'label' => esc_html__( 'Right Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Adopt Section Styles', 'leopet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'big_title_col', [
				'label' => __( 'Big title Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abopt_number_counter h2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abopt_number_counter p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'count_val_col', [
				'label' => __( 'Counter Value Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abopt_number_counter .counter_number .single_counter_number h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_col', [
				'label' => __( 'Button Bg Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abopt_number_counter .btn_1' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Bg Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abopt_number_counter .btn_1:hover' => 'background: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

    }
    
    public function leopet_get_adopt_img_section( $adopt_img ) {
        ?>
        <div class="col-lg-6 col-md-6">
            <div class="adopt_image">
                <?php 
                    if ( $adopt_img ) { 
                        echo $adopt_img;
                    }
                ?>
            </div>
        </div>
        <?php
    }

	protected function render() {
    $settings       = $this->get_settings();    
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $counter1_img   = !empty( $settings['counter1_img']['id'] ) ? wp_get_attachment_image( $settings['counter1_img']['id'], 'leopet_section_thumb_52x48', '', array('alt' => 'counter 1 image' ) ) : '';
    $counter1_value   = !empty( $settings['counter1_value'] ) ?  $settings['counter1_value'] : '';
    $counter1_txt   = !empty( $settings['counter1_txt'] ) ?  $settings['counter1_txt'] : '';
    $counter2_img   = !empty( $settings['counter2_img']['id'] ) ? wp_get_attachment_image( $settings['counter2_img']['id'], 'leopet_section_thumb_52x48', '', array('alt' => 'counter 2 image' ) ) : '';
    $counter2_value   = !empty( $settings['counter2_value'] ) ?  $settings['counter2_value'] : '';
    $counter2_txt   = !empty( $settings['counter2_txt'] ) ?  $settings['counter2_txt'] : '';
    $anchor_txt     = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
    $anchor_url     = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    $right_img   = !empty( $settings['right_img']['id'] ) ? wp_get_attachment_image( $settings['right_img']['id'], 'leopet_adopt_thumb_588x580', '', array('alt' => 'adopt right image' ) ) : '';
    ?>

    <!-- counter adopt number here -->
    <section class="abopt_number_counter section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-md-6">
                    <div class="counter_text">
                        <h2><?php echo esc_html( $sec_title )?></h2>
                        <p><?php echo esc_html( $sub_title )?></p>
                        <div class="counter_number">
                            <div class="single_counter_number">
                                <?php 
                                    if ( $counter1_img ) { 
                                        echo $counter1_img;
                                    }
                                ?>
                                <h3><span class="count"><?php echo esc_html( $counter1_value )?></span></h3>
                                <p><?php echo esc_html( $counter1_txt )?></p>
                            </div>
                            <div class="single_counter_number">
                                <?php 
                                    if ( $counter2_img ) { 
                                        echo $counter2_img;
                                    }
                                ?>
                                <h3><span class="count"><?php echo esc_html( $counter2_value )?></span></h3>
                                <p><?php echo esc_html( $counter2_txt )?></p>
                            </div>
                        </div>
                        <a href="<?php echo esc_url( $anchor_url )?>" class="btn_1"><?php echo esc_html( $anchor_txt )?></a>
                    </div>
                </div>
                
                <?php
                    $this->leopet_get_adopt_img_section( $right_img );
                ?>
            </div>
        </div>
    </section>
    <!-- counter adopt number end -->
    <?php

    }
}