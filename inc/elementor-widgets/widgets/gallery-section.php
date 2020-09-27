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
 * Leopet elementor gallery section widget.
 *
 * @since 1.0
 */
class Leopet_Galleries extends Widget_Base {

	public function get_name() {
		return 'leopet-galleries';
	}

	public function get_title() {
		return __( 'Galleries', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-photo-library';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Galleries content', 'leopet-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering', 'leopet-companion' )
            ]
        );

        $this->add_control(
            'gallery_inner_settings_seperator',
            [
                'label' => esc_html__( 'Gallery Items', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'leopetgalleries', [
                'label' => __( 'Create New', 'leopet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'gallery_img',
                        'label' => __( 'Gallery Image', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Gallery Title', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '1', 'leopet-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'gallery_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( '1', 'leopet-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( '2', 'leopet-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( '3', 'leopet-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( '4', 'leopet-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( '5', 'leopet-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( '6', 'leopet-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End Gallery content

    /**
     * Style Tab
     * ------------------------------ Style Gallery Section ------------------------------
     *
     */

        $this->start_controls_section(
            'style_gallery_section', [
                'label' => __( 'Style Gallery Section', 'leopet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .gallery_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_bg_col', [
                'label' => __( 'Item Hover Bg Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_part .single_gallery_part:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    
    // call load widget script
    $this->load_widget_script(); 

    $settings       = $this->get_settings();
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $leopetgalleries = !empty( $settings['leopetgalleries'] ) ? $settings['leopetgalleries'] : '';
    ?>
    
    <!-- gallery part css here -->
    <section class="gallery_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="gallery_tittle">
                        <p><?php echo esc_html( $sec_title )?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $leopetgalleries ) && count( $leopetgalleries ) > 0 ) {
                    foreach( $leopetgalleries as $gallery ) {
                        $gallery_img    = !empty( $gallery['gallery_img']['id'] ) ? wp_get_attachment_image_src( $gallery['gallery_img']['id'], 'leopet_gallery_thumb_362x300' )[0] : '';
                        $item_title     = ( !empty( $gallery['item_title'] ) ) ? $gallery['item_title'] : '';
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <a href="<?php echo esc_url( $gallery_img )?>" class="single_gallery_part">
                                <img src="<?php echo esc_url( $gallery_img )?>" alt="<?php echo esc_html( $item_title )?>">
                                <i class="ti-plus"></i>
                            </a>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- gallery part css end -->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            if ($('.single_gallery_part').length > 0) {
                $('.single_gallery_part').magnificPopup({
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }	
}