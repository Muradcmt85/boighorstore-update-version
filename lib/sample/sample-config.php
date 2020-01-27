<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "wpcamel";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'wpcamel' ),
        'page_title'           => __( 'Theme Options', 'wpcamel' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 5,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'redux_demo',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'wpcamel' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'wpcamel' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'wpcamel' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'wpcamel' ), $v );
    } else {
        $args['intro_text'] = __( '', 'wpcamel' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'wpcamel' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'wpcamel' ),
            'content' => __( '', 'wpcamel' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'wpcamel' ),
            'content' => __( '', 'wpcamel' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '', 'wpcamel' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Header Option', 'wpcamel' ),
        'id'    => 'header',
        'desc'  => __( 'Basic fields as subsections.', 'wpcamel' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Help Center', 'wpcamel' ),
        'desc'       => __( 'For any informatio and help purpose 24/7, visit: ', 'wpcamel' ) . '<a href="https://wpcamel.com/" target="_blank">All Rights WPCAMEL</a>',
        'id'         => 'opt-text-subsection',
        'subsection' => true,
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Main Header', 'wpcamel' ),
        'desc'       => __( 'Please input here for main header section'),
        'id'         => 'header_id',
        'subsection' => true,
        'fields'     => array(  
            array(
                'id'       => 'switcher_currency',
                'type'     => 'text',
                'title'    => __('Social icons Input type text drop here', 'wpcamel'),
                'desc'     => __('This is the header Social icons section', 'wpcamel'),
                'options' => array(
                    '1' => 'Facebook',
                    '2' => 'Twitter',
                    '3' => 'Instagram',
                    '4' => 'Google Plus',
                     ),
                     
                'default'  => 'Social icons'
                ),
            array(
                'id'       => 'callus',
                'type'     => 'text',
                'title'    => __('Call us content drop here', 'wpcamel'),
                'subtitle' => __('Sub title please input here', 'wpcamel'),
                'desc'     => __('This is the header content', 'wpcamel'),
                'default'  => 'Call Us'
            ),    
            array(
                'id'       => 'social_icons',
                'type'     => 'text',
                'title'    => __('Social icons Input type text drop here', 'wpcamel'),
                'desc'     => __('This is the header Social icons section', 'wpcamel'),
                'options' => array(
                    '1' => 'Facebook',
                    '2' => 'Twitter',
                    '3' => 'Instagram',
                    '4' => 'Google Plus',
                     ),
                     
                'default'  => 'Social icons'
                ),
                array(
                    'id'       => 'mailus',
                    'type'     => 'text',
                    'title'    => __('Your Mail drop here', 'wpcamel'),
                    'desc'     => __('This is the header Mail section', 'wpcamel'),
                    'default'  => 'Mail Us'
                ), 
        )
    ));


    Redux::setSection( $opt_name, array(
        'title' => __( 'Slider Option', 'wpcamel' ),
        'id'    => 'slider',
        'desc'  => __( 'Slider', 'wpcamel' ),
        'icon'  => 'el el-slideshare'
    ) );

    

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Silder Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Silder content'),
        'id'         => 'slider_id',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'slider_title',
                'type'     => 'text',
                'title'    => __('Slider Title input here', 'wpcamel'),
                'desc'     => __('This is the silder title', 'wpcamel'),
                'default'  => 'Slider title need'
            ), 

            array(
                'id'       => 'slider_sub_title',
                'type'     => 'text',
                'title'    => __('Slider sub Title input here', 'wpcamel'),
                'desc'     => __('This is the silder sub title', 'wpcamel'),
                'default'  => 'Slider sub title need'
            ), 

            array(
                'id'       => 'slider_anchor_tag',
                'type'     => 'text',
                'title'    => __('Slider anchor tag', 'wpcamel'),
                'desc'     => __('This is the silder anchor tag', 'wpcamel'),
                'default'  => 'Slider anchor tag need'
            ), 

            array(
                'id'       => 'slider_text',
                'type'     => 'editor',
                'title'    => __('Slider details type here', 'wpcamel'),
                'desc'     => __('This is the silder content section input here', 'wpcamel'),
                'default'  => 'Slider content need'
            ),
            array(
                'title' =>__('Slider banner image Upload','wpcamel'),
                'subtitle' =>__('upload your Our slider image for this section','wpcamel'),
                'desc' =>__('Pleae upload your slider image for this section','wpcamel'),
                'type' =>'media',
                'id' => 'slider-image-upload',
                'compiler' =>true,
                'default' => array(
                'url' => get_template_directory_uri() .'/img/slider/slider-bg.jpg'
                )
            ),   
            array(
                'title' =>__('Slider side image Upload','wpcamel'),
                'subtitle' =>__('upload your Our side slider image for this section','wpcamel'),
                'desc' =>__('Pleae upload your side slider image for this section','wpcamel'),
                'type' =>'media',
                'id' => 'slider-image2-upload',
                'compiler' =>true,
                'default' => array(
                'url' => get_template_directory_uri() .'/img/slider/slider-img.jpg'
                )
            ),
            
            
        )
    ));


    Redux::setSection( $opt_name, array(
        'title' => __( 'Feature Option', 'wpcamel' ),
        'id'    => 'Feature',
        'desc'  => __( 'Feature Post', 'wpcamel' ),
        'icon'  => 'el el-hand-right'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Feature Post Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Feature Post content'),
        'id'         => 'feature_id',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'feature_title',
                'type'     => 'text',
                'title'    => __('Feature Post Title input here', 'wpcamel'),
                'desc'     => __('This is the Feature Post title', 'wpcamel'),
                'default'  => 'Feature Post title need'
            ), 

            array(
                'id'       => 'feature_description',
                'type'     => 'editor',
                'title'    => __('Feature Post description here', 'wpcamel'),
                'desc'     => __('This is the Feature description drop here', 'wpcamel'),
                'default'  => 'Feature Post description need'
            ), 
        )
    ));

    Redux::setSection( $opt_name, array(
        'title' => __( 'About Option', 'wpcamel' ),
        'id'    => 'About',
        'desc'  => __( 'About Post', 'wpcamel' ),
        'icon'  => 'el el-caret-right'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'About Post Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of About Post content'),
        'id'         => 'about_id',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'about_img',
                'type'     => 'media',
                'title'    => __('About Post image', 'wpcamel'),
                'desc'     => __('This is the About Post image section', 'wpcamel'),
                'default'  => 'About Post image need'
            ), 
            array(
                'id'       => 'about_video_link',
                'type'     => 'text',
                'title'    => __('About video url', 'wpcamel'),
                'desc'     => __('This is the About Post video section', 'wpcamel'),
                'default'  => 'About Post video url need'
            ),
            array(
                'id'       => 'about_title_small',
                'type'     => 'text',
                'title'    => __('About small title', 'wpcamel'),
                'desc'     => __('This is the About  small title section', 'wpcamel'),
                'default'  => 'About small title need'
            ),
            array(
                'id'       => 'about_title_main',
                'type'     => 'text',
                'title'    => __('About main title', 'wpcamel'),
                'desc'     => __('This is the About  main title section', 'wpcamel'),
                'default'  => 'About main title need'
            ),

            array(
                'id'       => 'about_description',
                'type'     => 'editor',
                'title'    => __('About Post description here', 'wpcamel'),
                'desc'     => __('This is the About description drop here', 'wpcamel'),
                'default'  => 'About Post description need'
            ),
            array(
                'id'       => 'about_signature_img',
                'type'     => 'media',
                'title'    => __('About signature Post image', 'wpcamel'),
                'desc'     => __('This is the About signature Post image section', 'wpcamel'),
                'default'  => 'About signature Post image need'
            ),  
        )
    ));


    Redux::setSection( $opt_name, array(
        'title' => __( 'Service Option', 'wpcamel' ),
        'id'    => 'Service',
        'desc'  => __( 'Service Post', 'wpcamel' ),
        'icon'  => 'el el-hand-right'
    ) );


    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Service Post image Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Service Post image'),
        'id'         => 'Service_img_id',
        'subsection' => true,
        'fields'     => array(

            
            array(
                'id'       => 'Service_img',
                'type'     => 'media',
                'title'    => __('Service Post image', 'wpcamel'),
                'desc'     => __('This is the Service  Post image section', 'wpcamel'),
                'default'  => 'Service Post image need'
            ),
        )
    ));



    Redux::setSection( $opt_name, array(
        'title'      => __( 'Service Post Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Service Post content'),
        'id'         => 'Service_section_id',
        'subsection' => true,
        'fields'     => array(

            
            array(
                'id'       => 'Service_icon',
                'type'     => 'media',
                'title'    => __('Service Post icon', 'wpcamel'),
                'desc'     => __('This is the Service  Post icon section', 'wpcamel'),
                'default'  => 'Service Post icon need'
            ),


            array(
                'id'       => 'Service_section_title',
                'type'     => 'text',
                'title'    => __('Service section Title input here', 'wpcamel'),
                'desc'     => __('This is the Service section title', 'wpcamel'),
                'default'  => 'Service section title need'
            ), 

            array(
                'id'       => 'Service_section_title2',
                'type'     => 'text',
                'title'    => __('Service section Title2 input here', 'wpcamel'),
                'desc'     => __('This is the Service section title2', 'wpcamel'),
                'default'  => 'Service section title2 need'
            ), 

            array(
                'id'       => 'Service_section_description',
                'type'     => 'editor',
                'title'    => __('Service Post description here', 'wpcamel'),
                'desc'     => __('This is the Service description drop here', 'wpcamel'),
                'default'  => 'Service Post description need'
            ), 
        )
    ));



    Redux::setSection( $opt_name, array(
        'title' => __( 'Single Team  Option', 'wpcamel' ),
        'id'    => 'Single-Team ',
        'desc'  => __( 'Single Team  Post', 'wpcamel' ),
        'icon'  => 'el el-hand-right'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Single Team  Post Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Single Team  Post content'),
        'id'         => 'Single-Team-id ',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'single_team_img',
                'type'     => 'media',
                'title'    => __('Single Team Post image', 'wpcamel'),
                'desc'     => __('This is the Single Team  Post image section', 'wpcamel'),
                'default'  => 'Single Team Post image need'
            ),

            array(
                'id'       => 'single_team_toptitle',
                'type'     => 'text',
                'title'    => __('Single Team top Title input here', 'wpcamel'),
                'desc'     => __('This is the Single Team top title', 'wpcamel'),
                'default'  => 'Single Team top title need'
            ), 

            array(
                'id'       => 'single_team_title',
                'type'     => 'text',
                'title'    => __('Single Team section Title input here', 'wpcamel'),
                'desc'     => __('This is the Single Team section title', 'wpcamel'),
                'default'  => 'Single Team section title need'
            ), 

            array(
                'id'       => 'single_team_description',
                'type'     => 'editor',
                'title'    => __('Single Team Post description here', 'wpcamel'),
                'desc'     => __('This is the Single Team description drop here', 'wpcamel'),
                'default'  => 'Single Team Post description need'
            ), 
 
        )
    ));



    Redux::setSection( $opt_name, array(
        'title' => __( 'Working Area  Option', 'wpcamel' ),
        'id'    => 'working-area ',
        'desc'  => __( 'Working Area  Post', 'wpcamel' ),
        'icon'  => 'el el-hand-right'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Working Area  Post Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Working Area  Post content'),
        'id'         => 'working-area-id ',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'working_area_img',
                'type'     => 'media',
                'title'    => __('Working Area Post image', 'wpcamel'),
                'desc'     => __('This is the Working Area  Post image section', 'wpcamel'),
                'default'  => 'Working Area Post image need'
            ),

            array(
                'id'       => 'working_area_toptitle',
                'type'     => 'text',
                'title'    => __('Working Area top Title input here', 'wpcamel'),
                'desc'     => __('This is the Working Area top title', 'wpcamel'),
                'default'  => 'Working Area top title need'
            ), 

            array(
                'id'       => 'working_area_title',
                'type'     => 'text',
                'title'    => __('Working Area section Title input here', 'wpcamel'),
                'desc'     => __('This is the Working Area section title', 'wpcamel'),
                'default'  => 'Working Area section title need'
            ), 

            array(
                'id'       => 'working_area_description',
                'type'     => 'editor',
                'title'    => __('Working Area Post description here', 'wpcamel'),
                'desc'     => __('This is the Working Area description drop here', 'wpcamel'),
                'default'  => 'Working Area Post description need'
            ), 
 
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Single Working Post', 'wpcamel' ),
        'desc'       => __( 'Single Working Post content'),
        'id'         => 'Single Working-id ',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'Single_Working_img0',
                'type'     => 'media',
                'title'    => __('Working Area Post image1', 'wpcamel'),
                'desc'     => __('This is the Working Area  Post image section', 'wpcamel'),
                'default'  => 'Working Area Post image need'
            ),

            array(
                'id'       => 'Single_Working_img1',
                'type'     => 'media',
                'title'    => __('Working Area Post image2', 'wpcamel'),
                'desc'     => __('This is the Working Area  Post image section', 'wpcamel'),
                'default'  => 'Working Area Post image need'
            ),

            array(
                'id'       => 'Single_Working_img2',
                'type'     => 'media',
                'title'    => __('Working Area Post image3', 'wpcamel'),
                'desc'     => __('This is the Working Area  Post image section', 'wpcamel'),
                'default'  => 'Working Area Post image need'
            ),

            array(
                'id'       => 'Single_Working_title1',
                'type'     => 'text',
                'title'    => __('Working Area top Title input here', 'wpcamel'),
                'desc'     => __('This is the Working Area top title', 'wpcamel'),
                'default'  => 'Working Area title need'
            ), 

            array(
                'id'       => 'Single_Working_title2',
                'type'     => 'text',
                'title'    => __('Working Area section Title input here', 'wpcamel'),
                'desc'     => __('This is the Working Area section title', 'wpcamel'),
                'default'  => 'Working Area title need'
            ), 

            array(
                'id'       => 'Single_Working_title3',
                'type'     => 'text',
                'title'    => __('Working Area section Title input here', 'wpcamel'),
                'desc'     => __('This is the Working Area section title', 'wpcamel'),
                'default'  => 'Working Area title need'
            ), 
 
        )
    ));

    


    Redux::setSection( $opt_name, array(
        'title' => __( 'Client Review', 'wpcamel' ),
        'id'    => 'client-review',
        'desc'  => __( 'Client Review option insert here', 'wpcamel' ),
        'icon'  => 'el el-hand-right'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Client Review Post Options', 'wpcamel' ),
        'desc'       => __( 'Please input here of Client Review  Post content'),
        'id'         => 'client-review-id ',
        'subsection' => true,
        'fields'     => array(


            array(
                'id'       => 'client_review_img',
                'type'     => 'media',
                'title'    => __('Client Review Post image3', 'wpcamel'),
                'desc'     => __('This is the Client Review Post image section', 'wpcamel'),
                'default'  => 'Client Review Post image need'
            ),

            array(
                'id'       => 'client_review_toptitle',
                'type'     => 'text',
                'title'    => __('Client Review top Title', 'wpcamel'),
                'desc'     => __('This is the Client Review top title', 'wpcamel'),
                'default'  => 'Client Review top title need'
            ), 

            array(
                'id'       => 'client_review_title',
                'type'     => 'text',
                'title'    => __('Client Review Title', 'wpcamel'),
                'desc'     => __('This is the Client Review section title', 'wpcamel'),
                'default'  => 'Client Review section title need'
            ), 

            array(
                'id'       => 'client_review_description',
                'type'     => 'editor',
                'title'    => __('Client Review description', 'wpcamel'),
                'desc'     => __('This is the Client Review description drop here', 'wpcamel'),
                'default'  => 'Client Review Post description need'
            ), 

            array(
                'id'       => 'testimonial_content1',
                'type'     => 'editor',
                'title'    => __('Testimonial description1', 'wpcamel'),
                'desc'     => __('This is the Testimonial description drop here', 'wpcamel'),
                'default'  => 'Testimonial Post description need'
            ), 

            array(
                'id'       => 'Testimonial_Client1',
                'type'     => 'text',
                'title'    => __('Testimonial Client Title', 'wpcamel'),
                'desc'     => __('This is the Testimonial Client title', 'wpcamel'),
                'default'  => 'Testimonial Client title need'
            ), 

            array(
                'id'       => 'testimonial_content2',
                'type'     => 'editor',
                'title'    => __('Testimonial description2', 'wpcamel'),
                'desc'     => __('This is the Testimonial description drop here', 'wpcamel'),
                'default'  => 'Testimonial Post description need'
            ),

            array(
                'id'       => 'Testimonial_Client2',
                'type'     => 'text',
                'title'    => __('Testimonial Client Title', 'wpcamel'),
                'desc'     => __('This is the Testimonial Client title', 'wpcamel'),
                'default'  => 'Testimonial Client title need'
            ),  
 
        )
    ));





    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Option', 'wpcamel' ),
        'id'               => 'footer',
        'desc'             => __( 'These are really basic fields!', 'wpcamel' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-hand-down'
        
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Option', 'wpcamel' ),
        'id'               => 'footer-checkbox',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'wpcamel' ) . '',
        'icons' => array(
            array (
                'id'         => 'paypal',
                'icon'       => 'fa-paypal',
                'enabled'    => false,
                'name'       => __ ( 'PayPal', 'wpcamel' ),
                'background' => '',
                'color'      => '#1769ff',
                'url'        => '',
            )),
        
        'fields' => array(
            array(
                'title' =>__('Footer logo upload','Wpcamel'),
                'subtitle' =>__('upload your logo','Wpcamel'),
                'desc' =>__('logo upload for footer','Wpcamel'),
                'type' =>'media',
                'id' => 'footer_logo',
                'compiler' =>true,
                'default' => array(
                'url' => get_template_directory_uri() .'/img/logo.png'
                )
            ),
            
            //footer paragraph text
            array(
                'title' =>__('Footer Text','Wpcamel'),
                'subtitle' =>__('Footer paragraph text','Wpcamel'),
                'desc' =>__('Please enter footer text','Wpcamel'),
                'type' =>'textarea',
                'id' => 'footer_text',
                'default' =>'Please enter some text'
            ),
            
     
            //Social link
    
            array(
                'id'       => 'social_icons',
                'type'     => 'text',
                'title'    => __('Social icons Input type text drop here', 'wpcamel'),
                'desc'     => __('This is the header Social icons section', 'wpcamel'),
                'options' => array(
                    '1' => 'Facebook',
                    '2' => 'Twitter',
                    '3' => 'Youtube',
                    '4' => 'Google Plus',
                    '5' => 'Linkedin',
                     ),
                     
                'default'  => 'Social icons'
                ),

                // Footer copyright text
            array(
                'title' =>__('Footer Text','Wpcamel'),
                'subtitle' =>__('Footer paragraph text','Wpcamel'),
                'desc' =>__('Please enter copyright text','Wpcamel'),
                'type' =>'text',
                'id' => 'copyright_text',
                'default' =>'Copyright text'
            ),
            

            // Footer payment method here
            array(
                'title' =>__('Footer Payment method image','Wpcamel'),
                'subtitle' =>__('Payment method','Wpcamel'),
                'desc' =>__('Please enter your payment method','Wpcamel'),
                'type' =>'media',
                'id' => 'payment_method',
                'default' =>'Add payment method Image'
            ),
                
            
            
            
        ),
        
    ) );




    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( '', 'wpcamel' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'wpcamel' ),
                'desc'   => __( '', 'wpcamel' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

