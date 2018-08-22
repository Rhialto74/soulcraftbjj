// Document Ready Function
$(document).ready(function() {

    //Image preloader
    $("body").krioImageLoader();

  
    //Remove placeholder on click
    $("input,textarea").each(function() {
	$(this).data('holder',$(this).attr('placeholder'));

	$(this).focusin(function(){
	$(this).attr('placeholder','');
	});

	$(this).focusout(function(){
	$(this).attr('placeholder',$(this).data('holder'));
	});
    });

  
  
  
});

// Window Load Function
$( window ).load(function() {

    $(document).ready(function() {

        //Home Slider
        $("#interior_slider").owlCarousel({
            //For Developers    
            navigation: true,
            singleItem: true, // Display only one item. If you want to display more than one - use items
            slideSpeed: 500, // Slide speed
            navigationText: ["", ""], // Change text of previous or next buttons.
            responsive: true, // Make Responsive
            responsiveRefreshRate: 10, // Check window width changes every 50ms for responsive actions
            autoHeight: false, // Add height to owl-wrapper-outer so you can use diffrent heights on slides. Use it only for one item per page setting.
            mouseDrag: true, // Turn off/on mouse events.
            touchDrag: true, // Turn off/on touch events.
            addClassActive: false	    // Add "active" classes on visible items. Works with any numbers of items on screen.

        });

    });
  
  
  
  
  
});
