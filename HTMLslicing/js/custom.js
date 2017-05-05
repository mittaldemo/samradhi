$("#donations").owlCarousel({ 
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    items : 1,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [979,1],
	itemsTablet : [768,1],
	navigation : true,
	pagination:false,
	autoPlay:false,
	slideSpeed : 300,
    paginationSpeed : 400,
	navigationText:	["<i aria-hidden='true' class='fa fa-angle-up'></i>","<i aria-hidden='true' class='fa fa-angle-down'></i>"],
	transitionStyle : "fade"
    });
	
	
	$("#feedback").owlCarousel({ 
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    items : 1,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [979,1],
	itemsTablet : [768,1],
	navigation : false,
	pagination:false,
	autoPlay:false,
	slideSpeed : 300,
    paginationSpeed : 400,
	transitionStyle : "fade"
    });
	
	
	$("#donations2").owlCarousel({ 
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    items : 1,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [979,1],
	itemsTablet : [768,1],
	navigation : true,
	pagination:false,
	autoPlay:false,
	slideSpeed : 300,
    paginationSpeed : 400,
	navigationText:	["<i aria-hidden='true' class='fa fa-angle-left'></i>","<i aria-hidden='true' class='fa fa-angle-right'></i>"],
	transitionStyle : "fade"
    });
	
	
$(document).ready(function(){
$(".s-box").selectbox();
});	



// JavaScript Document

$(document).ready(function() {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
 
  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination:false,
    afterAction : syncPosition,
	navigation : false,
	pagination:false,
	autoPlay:false,
	navigationText:	["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"],
    responsiveRefreshRate : 200,
  });
 
  sync2.owlCarousel({
    items : 4,
    itemsDesktop      : [1199,5],
    itemsDesktopSmall     : [979,5],
    itemsTablet       : [768,4],
    itemsMobile       : [479,2],
    pagination:false,
    responsiveRefreshRate : 100,
	navigation : true,
	pagination:true,
	autoPlay:false,
	navigationText:	["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });
 
  function syncPosition(el){
    var current = this.currentItem;
    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#sync2").data("owlCarousel") !== undefined){
      center(current)
    }
  }
 
  $("#sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  });
 
  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }
 
    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
    
  }
 
});