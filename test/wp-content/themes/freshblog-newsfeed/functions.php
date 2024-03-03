<?php 
// Get customizer options
require_once get_template_directory() . '/vendor/autoload.php';
use SuperbThemesCustomizer\CustomizerControls;


function freshblog_newsfeed_custom_header_setup()
{
    add_theme_support('custom-header', apply_filters('freshblog_newsfeed_custom_header_args', array(
        'default-image'          => '',
        'default-text-color'     => '000000',
        'flex-width'         => true,
        'flex-height'        => true,
        'width'              => 1200,
        'height'             => 500,
        'default-image'         => '',
        'wp-head-callback'       => 'freshblog_newsfeed_header_style',
    ) ) );
    register_default_headers( array(
        'header-bg' => array(
            'url'           => get_theme_file_uri( '/img/bg-img-min.png' ),
            'thumbnail_url' => get_theme_file_uri( '/img/bg-img-min.png' ),
            'description'   => _x( 'Default', 'Default header image', 'freshblog-newsfeed' )
        ),  
    ) );
}
add_action('after_setup_theme', 'freshblog_newsfeed_custom_header_setup', 999);

if (!function_exists('freshblog_newsfeed_header_style')) :
    function freshblog_newsfeed_header_style()
    {
        $header_text_color = get_header_textcolor();
        $header_image = get_header_image();
        if (empty($header_image) && $header_text_color == get_theme_support('custom-header', 'default-text-color')) {
            return;
        }
        ?>
        <style type="text/css">
            .site-title a,
            .site-description,
            .logofont,
            .site-title,
            .logodescription {
                color: #<?php echo esc_attr($header_text_color); ?>;
            }

            <?php if (!display_header_text()) : ?>.logofont,
            .logodescription {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                display: none;
            }

            <?php
        endif;

        if (!display_header_text()) : ?>.logofont,
        .site-title,
        p.logodescription {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
            display: none;
        }

        <?php
    else :
        ?>.site-title a,
        .site-title,
        .site-description,
        .logodescription {
            color: #<?php echo esc_attr($header_text_color); ?>;
        }

    <?php endif; ?>
</style>
<?php
}
endif;



// New color variables
if(method_exists(CustomizerControls::class, "OverwriteDefault")) {
    CustomizerControls::OverwriteDefault(CustomizerControls::GENERAL_BOXMODE, "1");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_SIDEBAR, "0");

}


// Get stylesheet
add_action( 'wp_enqueue_scripts', 'freshblog_newsfeed_enqueue_styles' );
function freshblog_newsfeed_enqueue_styles() {
	wp_enqueue_style( 'freshblog-newsfeed-parent-style', get_template_directory_uri() . '/style.css' ); 
} 



// New fonts
function freshblog_newsfeed_enqueue_assets() {
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'freshblog-newsfeed-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'freshblog_newsfeed_enqueue_assets');
