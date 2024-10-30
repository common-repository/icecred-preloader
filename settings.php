<?php

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class IcecredPreloader
{
    private $options;

    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'icecred_preloader_settings' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'wp_enqueue_color_picker' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function icecred_preloader_settings()
    {
        add_menu_page(
            'Preloader',
            'Preloader',
            'manage_options',
            'icecred-preloader',
            array( $this, 'icecred_preloader_form' )
        );
    }

    public function icecred_preloader_form()
    {
        $this->options = get_option( 'icecred_preloader' );
        ?>

        <div class="wrap">
            <form method="post" action="options.php">
                <?php
                settings_fields( 'icecred_preloader_group' );
                do_settings_sections( 'icecred_preloader_page' );
                submit_button();
                ?>
            </form>

        </div>
    <?php
    }

    function wp_enqueue_color_picker( $hook_suffix ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker-script-handle', plugins_url('assets/admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'icecred_preloader_group',
            'icecred_preloader',
            array( $this, 'sanitize' )
        );

        add_settings_section(
            'setting_section_id',
            '<h1>Icecred Preloader</h1>',
            array( $this, 'print_section_info' ),
            'icecred_preloader_page'
        );

        add_settings_field(
            'background_color',
            'Background Color',
            array( $this, 'background_color_callback' ),
            'icecred_preloader_page',
            'setting_section_id'
        );
    }

    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['background_color'] ) )
            $new_input['background_color'] = sanitize_text_field( $input['background_color'] );

        return $new_input;
    }

    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    public function background_color_callback()
    {
        printf(
            '<input type="text" id="background_color"
                    name="icecred_preloader[background_color]" value="%s" />',
            isset( $this->options['background_color'] ) ?
                esc_attr( $this->options['background_color']) : ''
        );
    }

}

if( is_admin() ) {
    $icecred_preloader = new IcecredPreloader();
}
