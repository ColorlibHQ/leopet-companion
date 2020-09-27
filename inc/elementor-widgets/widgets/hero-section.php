<?php
namespace Leopetelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Leopet elementor hero section widget.
 *
 * @since 1.0
 */
class Leopet_Hero extends Widget_Base {

	public function get_name() {
		return 'leopet-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero content', 'leopet-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Welcome to Leopet', 'leopet-companion' ),
            ]
        );
        $this->add_control(
            'big_title',
            [
                'label' => esc_html__( 'Big Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Give your pet<br>Best Care', 'leopet-companion',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'OUR SERVIECS', 'leopet-companion' ),
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
            'banner_img',
            [
                'label' => esc_html__( 'Background Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'leopet-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button Bg Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text .btn_1' => 'background: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'btn_hober_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text .btn_1:hover' => 'background: {{VALUE}};',
				],
			]
        );
		$this->end_controls_section();
	}
    
	protected function render() {
    $settings   = $this->get_settings();
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $big_title  = !empty( $settings['big_title'] ) ? $settings['big_title'] : '';
    $btn_text   = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
    $btn_url    = !empty( $slider['btn_url']['url'] ) ? $slider['btn_url']['url'] : '';
    $banner_img = !empty( $slider['banner_img']['url'] ) ? $slider['banner_img']['url'] : '';
    ?>

    <!-- banner part start-->
    <section class="banner_part" <?php echo leopet_inline_bg_img( esc_url( $banner_img ) ); ?>>
        <div class="container">
            <div class="row align-content-center">
                <div class="col-lg-7 col-xl-6">
                    <div class="banner_text">
                        <h5><?php echo esc_html( $sub_title )?></h5>
                        <h1><?php echo nl2br( wp_kses_post($big_title) )?></h1>
                        <a href="<?php echo esc_url( $btn_url )?>" class="btn_1"><?php echo esc_html( $btn_text )?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
    <?php

    }
}
