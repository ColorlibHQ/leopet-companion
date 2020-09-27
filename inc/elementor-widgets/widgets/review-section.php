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
 * Leopet Review Contents section widget.
 *
 * @since 1.0
 */
class Leopet_Review_Contents extends Widget_Base {

	public function get_name() {
		return 'leopet-review-contents';
	}

	public function get_title() {
		return __( 'Review Contents', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Review contents  ------------------------------
		$this->start_controls_section(
			'reviews_content',
			[
				'label' => __( 'Review Contents', 'leopet-companion' ),
			]
        );
		$this->add_control(
            'reviews_contents', [
                'label' => __( 'Create New', 'leopet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ review_txt }}}',
                'fields' => [
                    [
                        'name' => 'reviewr_img',
                        'label' => __( 'Reviewer Image', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'review_txt',
                        'label' => __( 'Review Text', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( '" Working in conjunction with humanitarian aid agencies we have supported programmes to alleviate.', 'leopet-companion' ),
                    ],
                    [
                        'name' => 'reviewer_name',
                        'label' => __( 'Reviewer Name', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '- Jon Miller', 'leopet-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'reviewr_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'review_txt'     => __( '" Working in conjunction with humanitarian aid agencies we have supported programmes to alleviate.', 'leopet-companion' ),
                        'reviewer_name'  => __( '- Jon Miller', 'leopet-companion' ),
                    ],
                    [
                        'reviewr_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'review_txt'     => __( '" Working in conjunction with humanitarian aid agencies we have supported programmes to alleviate.', 'leopet-companion' ),
                        'reviewer_name'  => __( '- Jon Doe', 'leopet-companion' ),
                    ],
                    [
                        'reviewr_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'review_txt'     => __( '" Working in conjunction with humanitarian aid agencies we have supported programmes to alleviate.', 'leopet-companion' ),
                        'reviewer_name'  => __( '- Jonathan Doe', 'leopet-companion' ),
                    ],
                ]
            ]
        );
        
        $this->add_control(
            'background_img',
            [
                'label' => esc_html__( 'Background Image', 'leopet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
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
                'label' => __( 'Style Review Section', 'leopet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rev_txt_col', [
                'label' => __( 'Review Text Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client_review h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'reviewer_txt_col', [
                'label' => __( 'Reviewer Name Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client_review p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings       = $this->get_settings();
    $sliders        = !empty( $settings['reviews_contents'] ) ? $settings['reviews_contents'] : '';
    $background_img = !empty( $settings['background_img']['url'] ) ? $settings['background_img']['url'] : '';
    ?>
    
     <!-- client review part here -->
     <section class="client_review" <?php echo leopet_inline_bg_img( esc_url( $background_img ) ); ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="client_review_content owl-carousel">
                        <?php
                        if( is_array( $sliders ) && count( $sliders ) > 0 ){
                            foreach ( $sliders as $slider ) {
                                $reviewer_name = !empty( $slider['reviewer_name'] ) ? $slider['reviewer_name'] : '';
                                $reviewr_img   = !empty( $slider['reviewr_img']['id'] ) ? wp_get_attachment_image( $slider['reviewr_img']['id'], 'leopet_widget_post_thumb', '', array('alt' => $reviewer_name . ' image' ) ) : '';
                                $review_txt    = !empty( $slider['review_txt'] ) ? $slider['review_txt'] : '';
                                ?>
                                <div class="singke_client_review">
                                    <?php 
                                        if ( $reviewr_img ) { 
                                            echo $reviewr_img;
                                        }
                                    ?>
                                    <h4><?php echo esc_html( $review_txt )?></h4>
                                    <p><?php echo esc_html( $reviewer_name )?></p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var client_review = $('.client_review_content');
            if (client_review.length) {
                client_review.owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout:5000,
                nav: false,
                margin: 20
                });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
