document.createElement('header');
document.createElement('footer');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('nav');

Array.prototype.unique = function() {
    var o = {},
    i,
    l = this.length,
    r = [];
    for (i = 0; i < l; i += 1) o[this[i]] = this[i];
    for (i in o) r.push(o[i]);
    return r;
};

var testVar = null;

function custommsg() 
{
	document.getElementById("form-message").style.display=""; 
	document.getElementById("form-message").innerHTML="Thanks for your interest!"; 
	document.getElementById("form-container").style.display="none";
} 
	
function isValidEmail(f) 
{
	var str = f.elements[1].value;
	   return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
}



$(document).ready(function() {
	
//  nav stuff
	
	$("nav#header_nav>div>ul>li").each(function(index, element){$(element).attr("id", index);});
	$("nav#header_nav>ul>li").each(function(i) {
	    $(this).attr('id',"nav" + i);
		$(this).addClass('main_nav');
	});
	

	var mainNavTop = -2;
//inspect type of single view to activate correct menu item
	if( $('article').hasClass('game') ) $("li.games").addClass('current-menu-item');
  else if ($('article').hasClass('resource')) $("li.resources").addClass('current-menu-item');
	else if ($('article').hasClass('post')) $("li.blog").addClass('current-menu-item');

	$("li.main_nav").each(function(){


		if( $(this).hasClass('current-menu-item') )
		{
			$(this).css('top', mainNavTop);
		}

		else
		{
			$(this).hover(function() {

			    $(this).stop().animate({'top':mainNavTop},'slow','easeOutBounce');
			    }, function () {
			    $(this).stop().animate({'top':'-18px'}, 'fast');
			});
		}


	});

	$('#menu-custom-main-nav-1 li a span.separator:first').remove();
	
//	end nav stuff


//extra bit to have nav flag down on single post views
//	if( $('article').hasClass('game') ) $("li.main_nav.menu-item-461").addClass('current-menu-item');

  $('li.current-category-ancestor').css('top',mainNavTop);
  $('li.current-menu-item').css('top',mainNavTop);
//  slider stuff

	 $('.anythingSlider').anythingSlider({
		easing: "easeInExpo",        // Anything other than "linear" or "swing" requires the easing plugin
		autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
		delay: 3800,                    // How long between slide transitions in AutoPlay mode
		startStopped: false,            // If autoPlay is on, this can force it to start stopped
		animationTime: 1200,             // How long the slide transition takes
		hashTags: true,                 // Should links change the hashtag in the URL?
		buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
		pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
		startText: "Go",                // Start text
		stopText: "Stop",               // Stop text
	 });
	

// end slider stuff


// social media stuff

	
	$(".subscribe").each(function(){
		$(this).hover(function(){
			$(this).stop().animate({'margin-top':'30px'}, 'slow', 'easeOutBounce');
		}, function(){
			$(this).stop().animate({'margin-top':'2px'}, 'fast');
		});
	});

		


// random stuff
	
	$('div.tocopy').remove();
	
// end random stuff

//	news section
	
	$('marquee').marquee('pointer').mouseover(function () {
	  $(this).trigger('stop');
	}).mouseout(function () {
	  $(this).trigger('start');
	}).mousemove(function (event) {
	  if ($(this).data('drag') == true) {
	    this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
	  }
	}).mousedown(function (event) {
	  $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
	}).mouseup(function () {
	  $(this).data('drag', false);
	});
	


    

	$('.anythingSlider .wrapper ul li div.slider_caption p').each(function(){
	 $(this).text($(this).html().substring(0,200 )); 
	});

});

