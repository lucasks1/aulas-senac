<?php
/**
 * Load Controls Files
 */
require_once HELPHEALTH_MEDICA_THEME_INC_DIR .'/customizer/customize-controls/control-color-alpha.php';
require_once HELPHEALTH_MEDICA_THEME_INC_DIR .'/customizer/customize-controls/control-range-value.php';


/**
 * Validation functions
 *
 * @package Helphealth_Medical
 */

if ( ! function_exists( 'helphealth_medical_validate_excerpt_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function helphealth_medical_validate_excerpt_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'helphealth-medical' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Excerpt Lenght is 1', 'helphealth-medical' ) );
		} elseif ( $value > 50 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Excerpt Lenght is 50', 'helphealth-medical' ) );
		}
		return $validity;
	}
endif;



if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'HallWorth_Custom_Content' ) ) :
class HallWorth_Custom_Content extends WP_Customize_Control {
	// Whitelist content parameter
	public $content = '';
	/**
	* Render the control's content.
	*
	* Allows the content to be overriden without having to rewrite the wrapper.
	*
	* @since   1.0.0
	* @return  void
	*/
	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
		}
		if ( isset( $this->content ) ) {
			echo esc_html( $this->content );
		}
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
		}
	}
}
endif;


if( ! class_exists( 'Helphealth_Medical_Dropdown_Taxonomies_Control' ) ):
    class Helphealth_Medical_Dropdown_Taxonomies_Control extends WP_Customize_Control{
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_attr($cat->name), selected($this->value(), esc_attr($cat->name), false), esc_html( $cat->name) );
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
endif;



/**
 * Select Multipe Item in Checkbox
*/
class Helphealth_Medical_Dropdown_Multiple_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_multiple_chooser';
	public $placeholder = '';

	public function __construct($manager, $id, $args = array()){

		parent::__construct( $manager, $id, $args );
	}

	public function render_content(){
		if ( empty( $this->choices ) )
				return;
		?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php } ?>
				<select multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
					<?php
					foreach ( $this->choices as $value => $label ){
						$selected = '';
						if(in_array($value, $this->value())){
							$selected = 'selected="selected"';
						}
						echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_html($label) . '</option>';
					}
					?>
				</select>
			</label>
		<?php
	}
}



if( ! class_exists( 'Helphealth_Medical_Dropdown_Pages_Control' ) ):
    class Helphealth_Medical_Dropdown_Pages_Control extends WP_Customize_Control{
    private $pages = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->pages = get_pages($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->pages))
            {
                ?>
                    <label>
                      <span class="customize-pages-select-control customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                       <san class="description customize-control-description"> <?php echo esc_html( $this->description ); ?></san>
                     
                      <select <?php $this->link(); ?>>
                        <option><?php echo esc_html('None','helphealth-medical');?></option>
                           <?php
                                foreach ( $this->pages as $page )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_attr($page->post_title), selected($this->value(), esc_attr($page->post_title), false), esc_html($page->post_title));
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
endif;


function helphealth_medical_customizer_control_scripts(){
    // wp_enqueue_media();
    // wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );

    wp_enqueue_script( 'helphealth-medical-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer.js', array( 'customize-controls', 'wp-color-picker' ), time() );
    wp_enqueue_style( 'helphealth-medical-customizer',  get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'helphealth_medical_customizer_control_scripts', 99 );


