jQuery(document).ready(function($){

    /* Move Fornt page widgets to frontpage panel */
	wp.customize.section( 'sidebar-widgets-info' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-info' ).priority( '70' );
    
    //Scroll to front page section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    }); 
    
    /* Home page preview url */
    wp.customize.panel( 'frontpage_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( travel_muni_cdata.home );
            }
        });
    });

    $( 'input[name=travel-muni-flush-local-fonts-button]' ).on( 'click', function( e ) {
        var data = {
            wp_customize: 'on',
            action: 'travel_muni_flush_fonts_folder',
            nonce: travel_muni_cdata.flushFonts
        };  
        $( 'input[name=travel-muni-flush-local-fonts-button]' ).attr('disabled', 'disabled');

        $.post( ajaxurl, data, function ( response ) {
            if ( response && response.success ) {
                $( 'input[name=travel-muni-flush-local-fonts-button]' ).val( 'Successfully Flushed' );
            } else {
                $( 'input[name=travel-muni-flush-local-fonts-button]' ).val( 'Failed, Reload Page and Try Again' );
            }
        });
    });
    
});

function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        
        case 'accordion-section-intro_section':
        preview_section_id = "intro_section";
        break;

        case 'accordion-section-sidebar-widgets-info':
        preview_section_id = "about_section";
        break;
        
        case 'accordion-section-destination_section':
        preview_section_id = "destination_section";
        break;
        
        case 'accordion-section-testimonial_section':
        preview_section_id = "testimonials_section";
        break;
        
        case 'accordion-section-popular_section':
        preview_section_id = "popular_section";
        break;

        case 'accordion-section-activities_section':
        preview_section_id = "activity_section";
        break;

        case 'accordion-section-special_offer_section':
        preview_section_id = "special_section";
        break;

        case 'accordion-section-cta_section':
        preview_section_id = "cta_section";
        break;

        case 'accordion-section-sidebar-widgets-info':
        preview_section_id = "about_section";
        break;

        case 'accordion-section-blog_section':
        preview_section_id = "blog_section";
        break;
        
        case 'accordion-section-recommendation_section':
        preview_section_id = "recommendation_section";
        break;
        
        case 'accordion-section-best_selling_section':
        preview_section_id = "bestseller_section";
        break;

        case 'accordion-section-top_deals_section':
        preview_section_id = "topdeals_section";
        break;

        case 'accordion-section-front_sort':
        preview_section_id = "banner_section";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}

( function( api ) {

    // Extends our custom "example-1" section.
    api.sectionConstructor['travel-muni-pro-section'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );