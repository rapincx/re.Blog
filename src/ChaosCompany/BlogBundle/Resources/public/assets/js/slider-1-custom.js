$(document).ready(function(){
	
/*-----------------------------------------------------------
		main slider version-1
--------------------------------------------------------------*/
	
	var slider_one_content_part = $("#slider_one_content_part");
	var slider_one_img_part = $("#slider_one_img_part");
 
  slider_one_content_part.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination: false,
	
	autoWidth: true,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
	navigationText: [
		'<i class="fa fa-angle-up" aria-hidden="true"></i>',
		'<i class="fa fa-angle-down" aria-hidden="true"></i>'
	],
  });
 
  slider_one_img_part.owlCarousel({
    singleItem : true,
	slideSpeed : 1500,
    pagination:false,
	
    responsiveRefreshRate : 100,
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });
 
  function syncPosition(el){
    var current = this.currentItem;
    $("#slider_one_img_part")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#slider_one_img_part").data("owlCarousel") !== undefined){
      center(current)
    }
  }
 
  $("#slider_one_img_part").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    slider_one_content_part.trigger("owl.goTo",number);
  });
 
  function center(number){
    var slider_one_img_partvisible = slider_one_img_part.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in slider_one_img_partvisible){
      if(num === slider_one_img_partvisible[i]){
        var found = true;
      }
    }
 
    if(found===false){
      if(num>slider_one_img_partvisible[slider_one_img_partvisible.length-1]){
        slider_one_img_part.trigger("owl.goTo", num - slider_one_img_partvisible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        slider_one_img_part.trigger("owl.goTo", num);
      }
    } else if(num === slider_one_img_partvisible[slider_one_img_partvisible.length-1]){
      slider_one_img_part.trigger("owl.goTo", slider_one_img_partvisible[1])
    } else if(num === slider_one_img_partvisible[0]){
      slider_one_img_part.trigger("owl.goTo", num-1)
    }
    
  }
 setTimeout(function() {
		$("#slider_one_img_part").each(function() {
		$(this).data('owlCarousel').calculateAll();
		});
 }, 0);
 
});