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
 * Leopet elementor service section widget.
 *
 * @since 1.0
 */
class Leopet_Services extends Widget_Base {

	public function get_name() {
		return 'leopet-services';
	}

	public function get_title() {
		return __( 'Services', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'leopet-companion' ),
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
                'label' => esc_html__( 'Section Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We Provide Best Services', 'leopet-companion' )
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'leopet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend.', 'leopet-companion' )
            ]
        );

        $this->add_control(
            'service_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'leopetservices', [
                'label' => __( 'Create New', 'leopet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'service_img',
                        'label' => __( 'Service Image', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Service Title', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Pet Surgeries', 'leopet-companion' ),
                    ],
                    [
                        'name' => 'service_text',
                        'label' => __( 'Service Text', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Our free veterinary services are available to pets whose owners are on certain means-tested benefits.', 'leopet-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'service_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( 'Pet Surgeries', 'leopet-companion' ),
                        'service_text'   => __( 'Our free veterinary services are available to pets whose owners are on certain means-tested benefits.', 'leopet-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( 'Pet Adoption', 'leopet-companion' ),
                        'service_text'   => __( 'Our free veterinary services are available to pets whose owners are on certain means-tested benefits.', 'leopet-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( 'Pet Care', 'leopet-companion' ),
                        'service_text'   => __( 'Our free veterinary services are available to pets whose owners are on certain means-tested benefits.', 'leopet-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'leopet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Services Item Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Single Item', 'leopet-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_title_color', [
				'label' => __( 'Title Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_text_color', [
				'label' => __( 'Text Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
        
    $settings       = $this->get_settings();
    $section_img    = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'leopet_section_thumb_52x48', '', array( 'alt' => 'section image' ) ) : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $leopetservices = !empty( $settings['leopetservices'] ) ? $settings['leopetservices'] : '';
    $dynamic_class  = is_front_page() ? 'service_part section_padding services_bg' : 'service_part section_padding';
    ?>

    <!-- service part start-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <?php
                            if ( $section_img ) {
                                echo $section_img;
                            }
                        ?>
                        <h2><?php echo esc_html( $sec_title )?></h2>
                        <p><?php echo esc_html( $sub_title )?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $leopetservices ) && count( $leopetservices ) > 0 ) {
                    foreach( $leopetservices as $service ) {
                        $item_title     = ( !empty( $service['item_title'] ) ) ? $service['item_title'] : '';
                        $service_img    = !empty( $service['service_img']['id'] ) ? wp_get_attachment_image( $service['service_img']['id'], 'leopet_service_thumb_280x280', '', array('alt' => $item_title ) ) : '';
                        $service_text   = ( !empty( $service['service_text'] ) ) ? $service['service_text'] : '';
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_service_part">
                                <?php
                                    if ( $service_img ) {
                                        echo $service_img;
                                    }
                                ?>
                                <h3><?php echo esc_html( $item_title )?></h3>
                                <p><?php echo esc_html( $service_text )?></p>
                            </div>
                        </div>
                        <?php 
                    }
                }
            ?>
            </div>
        </div>
    </section>
    <!-- service part end-->
    <?php
    }
}