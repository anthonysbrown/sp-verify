<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "sp_verify";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'sp_verify',
        'use_cdn' => TRUE,
        'display_name' => 'Age Verify',
        'display_version' => '1.0.0',
        'page_title' => 'Age Verify',
		'dev_mode'=>false,
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Age Verify',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );



    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Page Settings', 'redux-framework-demo' ),
        'id'     => 'basic',

        'icon'   => 'el el-home',
        'fields' => array(
           
		   
		     	array(
				'id'       => 'enabled',
			
				'type'     => 'switch', 
				'title'    => __('Enable Age Verification?', 'redux-framework-demo'),
				
				'default'  => true,
			),
		   
		   	array(
				'id'       => 'image-or-text',
				'on' =>'Text',
				'off' =>'Image',
				'type'     => 'switch', 
				'title'    => __('Image or Text', 'redux-framework-demo'),
				'subtitle' => __('Choose if you want image or text for buttons', 'redux-framework-demo'),
				'default'  => true,
			),
				array(
				'id'       => 'alternative-text-switch',
				'on' =>'Text & Logo',
				'off' =>'Editor',
				'type'     => 'switch', 
				'title'    => __('Text & Logo or Editor content', 'redux-framework-demo'),
				'subtitle' => __('Choose if you want to display the text and logo above the buttons or content from the editor below', 'redux-framework-demo'),
				'default'  => true,
			),
				array(
				'id'       => 'display-type',
				'on' =>'Buttons',
				'off' =>'Dropdown',
				'type'     => 'switch', 
				'title'    => __('Buttons or Dropdown', 'redux-framework-demo'),
				'subtitle' => __('Choose dropdown or buttons for verification', 'redux-framework-demo'),
				'default'  => true,
			),
			   	array(
    'id'        => 'verify_age',
    'type'      => 'slider',
    'title'     => __('How old does the user have to be?', 'redux-framework-demo'),
  
   
    "default"   => 21,
    "min"       => 1,
    "step"      => 1,
    "max"       => 150,
    'display_value' => 'label'
),
			
		   		array(
			'id'       => 'logo',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Logo', 'redux-framework-demo'),
			'desc'     => __('The logo will show up above the text.', 'redux-framework-demo'),
			
			
			),
		    array(
                'id'       => 'begining-text',
                'type'     => 'text',
                'title'    => __( 'Text for the verify page', 'redux-framework-demo' ),
                'desc'     => __( 'The text that will show up above the buttons', 'redux-framework-demo' ),
            
            ),
			array(
    'id'          => 'font',
    'type'        => 'typography', 
    'title'       => __('Typography', 'redux-framework-demo'),
    'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
    'subtitle'    => __('Font style for age verification page', 'redux-framework-demo'),
    'default'     => array(
        'color'       => '#333', 
        'font-style'  => '700', 
        'font-family' => 'Abel', 
        'google'      => true,
        'font-size'   => '33px', 
        'line-height' => '40'
    ),
),
		
			array(
    'id'               => 'alternative-above-buttons',
    'type'             => 'editor',
    'title'            => __('Alternative text above buttons', 'redux-framework-demo'), 
    'subtitle'         => __('Use this section if you want to have more control over what appears over the buttons.', 'redux-framework-demo'),
   
    'args'   => array(
        'teeny'            => false,
        'textarea_rows'    => 20
    )
),
			
			


			
        )
    ) );

   Redux::setSection( $opt_name, array(
        'title'  => __( 'Background', 'redux-framework-demo' ),
        'id'     => 'background-settings',

        'icon'   => 'el el-adjust-alt',
        'fields' => array(
		
		 array(         
    'id'       => 'background',
    'type'     => 'background',
    'title'    => __('Body Background', 'redux-framework-demo'),
    'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
    
    'default'  => array(
        'background-color' => '#1e73be',
    )
)
		)
		
		));


    Redux::setSection( $opt_name, array(
        'title'  => __( 'Button Settings', 'redux-framework-demo' ),
        'id'     => 'buttons',

        'icon'   => 'el el-link',
        'fields' => array(
		
		array(
       'id' => 'section-over',
       'type' => 'section',
       'title' => __('Over Age', 'redux-framework-demo'),
       
       'indent' => true 
   ),		
   
   	array(
    'id'        => 'over_age_cookie',
    'type'      => 'slider',
    'title'     => __('How many days to keep the cookie', 'redux-framework-demo'),
  
    'desc'      => __('How many days should we save the cookie for till the user can try again', 'redux-framework-demo'),
    "default"   => 7,
    "min"       => 1,
    "step"      => 1,
    "max"       => 500,
    'display_value' => 'label'
),
		
		 array(
                'id'       => 'over_age_text',
                'type'     => 'text',
                'title'    => __( 'Over Age button text', 'redux-framework-demo' ),
               
            
            ),
			 array(
                'id'       => 'over_age_redirect',
                'type'     => 'text',
                'title'    => __( 'Redirect URL, if not set the user will be redirected to home page', 'redux-framework-demo' ),
               
            
            ),
						array(
    'id'       => 'over_age_bg',
    'type'     => 'color',
    'title'    => __('Button Background Color', 'redux-framework-demo'), 
    'subtitle' => __('Pick a background color for the button.', 'redux-framework-demo'),
    'default'  => '#EFEFEF',
    'validate' => 'color',
),
		array(
    'id'       => 'over_age_bg_hover',
    'type'     => 'color',
    'title'    => __('Button Hover Background Color', 'redux-framework-demo'), 
    'subtitle' => __('Pick a background color for hovering over the button', 'redux-framework-demo'),
    'default'  => '#EFEFEF',
    'validate' => 'color',
),
	

			array(
    'id'          => 'over_age_font',
    'type'        => 'typography', 
    'title'       => __('Typography', 'redux-framework-demo'),
    'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
  
    'default'     => array(
        'color'       => '#333', 
        'font-style'  => '700', 
        'font-family' => 'Abel', 
        'google'      => true,
        'font-size'   => '33px', 
        'line-height' => '40'
    ),
),
			array(
			'id'       => 'over_age_image',
			'type'     => 'media', 
			'url'      => false,
			 'desc'     => __( 'This will overide the text button', 'redux-framework-demo' ),
			'title'    => __('Over Age Image overide', 'redux-framework-demo'),
			
			
			
			),
					
		array(
       'id' => 'section-under',
       'type' => 'section',
       'title' => __('Under Age', 'redux-framework-demo'),
       
       'indent' => true 
   ),
		 array(
                'id'       => 'under_age_text',
                'type'     => 'text',
                'title'    => __( 'Under Age button text', 'redux-framework-demo' ),
               
            
            ),
			
			  	array(
    'id'        => 'under_age_cookie',
    'type'      => 'slider',
    'title'     => __('How many hours to keep the cookie', 'redux-framework-demo'),
  
    'desc'      => __('How many hours should we save the cookie for till the user can try again', 'redux-framework-demo'),
    "default"   => 1,
    "min"       => 1,
    "step"      => 1,
    "max"       => 1000,
    'display_value' => 'label'
),
		
  array(
                'id'       => 'under_age_redirect',
                'type'     => 'text',
				'title' => 'Redirect',
                'desc'    => __( 'If not set the user will see an error message set below.', 'redux-framework-demo' ),
               
            
            ),
			array(
    'id'       => 'under_age_bg',
    'type'     => 'color',
    'title'    => __('Button Background Color', 'redux-framework-demo'), 
    'subtitle' => __('Pick a background color for the button.', 'redux-framework-demo'),
    'default'  => '#EFEFEF',
    'validate' => 'color',
),
			array(
    'id'       => 'under_age_bg_hover',
    'type'     => 'color',
    'title'    => __('Button Hover Background Color', 'redux-framework-demo'), 
    'subtitle' => __('Pick a background color for hovering over the button', 'redux-framework-demo'),
    'default'  => '#EFEFEF',
    'validate' => 'color',
),
	
	array(
    'id'          => 'under_age_font',
    'type'        => 'typography', 
    'title'       => __('Typography', 'redux-framework-demo'),
    'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
  
    'default'     => array(
        'color'       => '#333', 
        'font-style'  => '700', 
        'font-family' => 'Abel', 
        'google'      => true,
        'font-size'   => '33px', 
        'line-height' => '40'
    ),
),
		
	array(
			'id'       => 'under_age_image',
			'type'     => 'media', 
			'url'      => false,
			 'desc'     => __( 'This will overide the text button', 'redux-framework-demo' ),
			'title'    => __('Under Age image overide', 'redux-framework-demo'),
			
			
			
			),	
			array(
    'id'               => 'under_age_message',
    'type'             => 'editor',
    'title'            => __('Under age error message', 'redux-framework-demo'), 
    'subtitle'         => __('If there is no redirect set then this message will be displayed.', 'redux-framework-demo'),
    'default'          => 'Sorry you must be of age to view this page.',
    'args'   => array(
        'teeny'            => false,
        'textarea_rows'    => 20
    )
)	
			
		
		)
		
		));
		
		
		
		   Redux::setSection( $opt_name, array(
        'title'  => __( 'CSS', 'redux-framework-demo' ),
        'id'     => 'css',

        'icon'   => 'el el-css',
        'fields' => array(
		array(
    'id'       => 'css_editor_page',
    'type'     => 'ace_editor',
    'title'    => __('CSS Code', 'redux-framework-demo'),
    'subtitle' => __('Overide any css here', 'redux-framework-demo'),
    'mode'     => 'css',
    'theme'    => 'monokai',
   
    'default'  => "a.over_age_button{\n \n} \n a.under_age_button{\n \n}"
)
		
		)
		));

    /*
     * <--- END SECTIONS
     */
