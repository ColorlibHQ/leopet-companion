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
 * Leopet elementor volunteer section widget.
 *
 * @since 1.0
 */
class Leopet_Volunteer extends Widget_Base {

	public function get_name() {
		return 'leopet-volunteer';
	}

	public function get_title() {
		return __( 'Volunteer', 'leopet-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'leopet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Volunteer content ------------------------------
		$this->start_controls_section(
			'volunteer_content',
			[
				'label' => __( 'Volunteer content', 'leopet-companion' ),
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
                'default' => esc_html__( 'Our Volunteers', 'leopet-companion' )
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
            'volunteer_inner_settings_seperator',
            [
                'label' => esc_html__( 'Volunteer Items', 'leopet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'leopetvolunteer', [
                'label' => __( 'Create New', 'leopet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'volunteer_img',
                        'label' => __( 'Volunteer Image', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Member Name', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Milani Mou', 'leopet-companion' ),
                    ],
                    [
                        'name' => 'volunteer_text',
                        'label' => __( 'Member Text', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Our free veterinary services', 'leopet-companion' ),
                    ],
                    [
                        'name' => 'email_address',
                        'label' => __( 'Email Address', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'milani@abc.com', 'leopet-companion' ),
                    ],
                    [
                        'name' => 'twitter_url',
                        'label' => __( 'Twitter Profile URL', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'   => '#'
                        ]
                    ],
                    [
                        'name' => 'linkedin_url',
                        'label' => __( 'Linkedin Profile URL', 'leopet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'   => '#'
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'volunteer_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( 'Pet Surgeries', 'leopet-companion' ),
                        'volunteer_text'   => __( 'Our free veterinary services', 'leopet-companion' ),
                        'email_address' => __( 'milani@abc.com', 'leopet-companion' ),
                        'twitter_url'   => '#',
                        'linkedin_url'  => '#',
                    ],
                    [      
                        'volunteer_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( 'Yeamy Rou', 'leopet-companion' ),
                        'volunteer_text'   => __( 'Our free veterinary services', 'leopet-companion' ),
                        'email_address' => __( 'yeamy@abc.com', 'leopet-companion' ),
                        'twitter_url'   => '#',
                        'linkedin_url'  => '#',
                    ],
                    [      
                        'volunteer_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'     => __( 'Killer Mou', 'leopet-companion' ),
                        'volunteer_text'   => __( 'Our free veterinary services', 'leopet-companion' ),
                        'email_address' => __( 'killer@abc.com', 'leopet-companion' ),
                        'twitter_url'   => '#',
                        'linkedin_url'  => '#',
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */

        $this->start_controls_section(
            'style_volunteer_section', [
                'label' => __( 'Style Volunteer Section', 'leopet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .voulantier_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_txt_col', [
                'label' => __( 'Section Text Color', 'leopet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .voulantier_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Single Item Style ------------------------------
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
					'{{WRAPPER}} .voulantier_part .single_voulantier_part h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_text_color', [
				'label' => __( 'Text Color', 'leopet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .voulantier_part .single_voulantier_part p' => 'color: {{VALUE}};',
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
    $leopetvolunteer = !empty( $settings['leopetvolunteer'] ) ? $settings['leopetvolunteer'] : '';
    ?>

    <!-- voulantier part start here -->
    <section class="voulantier_part section_padding">
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
                if( is_array( $leopetvolunteer ) && count( $leopetvolunteer ) > 0 ) {
                    foreach( $leopetvolunteer as $volunteer ) {
                        $item_title  = ( !empty( $volunteer['item_title'] ) ) ? $volunteer['item_title'] : '';
                        $item_img    = !empty( $volunteer['volunteer_img']['id'] ) ? wp_get_attachment_image( $volunteer['volunteer_img']['id'], 'leopet_service_thumb_280x280', '', array('alt' => $item_title ) ) : '';
                        $item_text   = ( !empty( $volunteer['volunteer_text'] ) ) ? $volunteer['volunteer_text'] : '';
                        $email_address   = ( !empty( $volunteer['email_address'] ) ) ? $volunteer['email_address'] : '';
                        $twitter_url   = ( !empty( $volunteer['twitter_url']['url'] ) ) ? $volunteer['twitter_url']['url'] : '';
                        $linkedin_url   = ( !empty( $volunteer['linkedin_url']['url'] ) ) ? $volunteer['linkedin_url']['url'] : '';
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_voulantier_part">
                                <?php
                                    if ( $item_img ) {
                                        echo $item_img;
                                    }
                                ?>
                                <h4><?php echo esc_html( $item_title )?></h4>
                                <p><?php echo esc_html( $item_text )?></p>
                                <div class="social_icon">
                                    <a href="mailto:<?php echo sanitize_email( $email_address )?>"> <i class="ti-email"></i> </a>
                                    <a href="<?php echo esc_url( $twitter_url )?>"> <i class="ti-twitter-alt"></i> </a>
                                    <a href="<?php echo esc_url( $linkedin_url )?>"> <i class="ti-linkedin"></i> </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                }
            ?>
            </div>
        </div>
    </section>
    <!-- voulantier part end -->
    <?php
    }
}