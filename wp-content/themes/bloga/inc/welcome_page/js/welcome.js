jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About bfastmag page -> Actions required tab */
    var bfastmag_nr_required_actions = bfastmagWelcomeScreenObject.nr_required_actions;

    if ( (typeof bfastmag_nr_required_actions !== 'undefined') && (bfastmag_nr_required_actions != '0') ) {
        jQuery('li.bfastmag-req-red-tab a').append('<span class="bfastmag-actions-count">' + bfastmag_nr_required_actions + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".bfastmag-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'bfastmag_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : bfastmagWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.bfastmag-tab-pane#required_actions h1').append('<div id="temp_load" style="text-align:center"><img src="' + bfastmagWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var bfastmag_actions_count = jQuery('.bfastmag-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof bfastmag_actions_count !== 'undefined' ) {
                    if( bfastmag_actions_count == '1' ) {
                        jQuery('.bfastmag-actions-count').remove();
                        jQuery('.bfastmag-tab-pane#required_actions').append('<p>' + bfastmagWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.bfastmag-actions-count').text(parseInt(bfastmag_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function bfastmag_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".bfastmag-tab-pane").not(tab).css("display", "none");
        jQuery(tab).show();
	}

	var bfastmag_actions_anchor = location.hash;

	if( (typeof bfastmag_actions_anchor !== 'undefined') && (bfastmag_actions_anchor != '') ) {
		bfastmag_welcome_page_tabs('a[href="'+ bfastmag_actions_anchor +'"]');
	}

    jQuery(".bfastmag-nav-tabs a").click(function(event) {
        event.preventDefault();
		bfastmag_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.bfastmag-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
