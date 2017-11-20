
jQuery(document).ready(function() {
	
	var wow = new WOW(
	  {
	    boxClass:     'wowload',      // animated element css class (default is wow)
	    animateClass: 'animated', // animation css class (default is animated)
	    offset:       0,          // distance to the element when triggering the animation (default is 0)
	    mobile:       true,       // trigger animations on mobile devices (default is true)
	    live:         true        // act on asynchronously loaded content (default is true)
	  }
	);
	wow.init();


    /*------------------------- Servico Slider ----------------------------*/

    var itemSlider = $("#servico-slider");

    itemSlider.owlCarousel({
      autoPlay : 3000,
      stopOnHover : true,
      pagination : false,
      paginationNumbers: false,

      itemsCustom : [
      [0, 1],
      [450, 2],
      [600, 2],
      [700, 2],
      [1000, 3],
      [1200, 4],
      ],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
      });


 // Custom Navigation 
 $(".post-next").click(function(){
  itemSlider.trigger('owl.next');
});
 $(".post-prev").click(function(){
  itemSlider.trigger('owl.prev');
});


});

  