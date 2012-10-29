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
	
	//this is to get the category names from all the articles on the page
	var subcats = [];
	$('article[class*="category"]').each(function(index){
		var allClasses = $(this).attr('class').split(' ');
		
		for(var i = 0; i<allClasses.length; i++)
		{
			var matches = /^category\-(.+)/.exec(allClasses[i]);
			if(matches != null) subcats.push(matches[1]);
			
		}
	});
	subcats = subcats.unique();

	
	//this is to get the tab names from all the articles on the page
	var subtags = [];
	$('article[class*="tag"]').each(function(index){
		var allClasses = $(this).attr('class').split(' ');
		
		for(var i = 0; i<allClasses.length; i++)
		{
			var matches = /^tag\-(.+)/.exec(allClasses[i]);
			if(matches != null) subtags.push(matches[1]);
			
		}
	});
	subtags = subtags.unique();
	
		
//	subNavList will hold either tags or categories depending on parent menu item
	var subNavList = null;
	
//	subNavMarginTop will adjust the offset of the subnav depending on the number of items in the list
	var subNavMarginTop =  85;
	var subNavMarginRollover = 163;

	var mainNavTop = -2;
	$("li.main_nav").each(function(){

		if( $(this).hasClass('current-menu-item') && $(this).is('.menu-item-994, .menu-item-1323') )
		{
			if($(this).is('.menu-item-994')) subNavList = {'list':subcats, 'type':'category'};
			else if($(this).is('.menu-item-1323')) subNavList = {'list':subtags, 'type':'tag'};

			$(this).prepend("<ul class='subnav'></ul>");


			$('.subnav').append('<li class="background4 cap"></li>');

			for(var i = 0; i<subNavList.list.length; i++)
			{
				$('.subnav').append('<li class="background'+(i%5)+' '+subNavList.list[i]+'" >'+subNavList.list[i]+'</li>');
			}

			var allColor = Math.floor(Math.random() * (4 + 1));
			$('.subnav').append('<li class="background'+allColor+' all">all</li>');
			$('.subnav').append('<li class="tail"></li>');


			//this will offset subNavMargin relative to the number of items in the list
			var x = subNavList.list.length - 2;
			if( x > 0 ) subNavMarginTop = subNavMarginTop - (25 * x);

			
			
			$('ul.subnav').css('top',subNavMarginTop);
		}

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

	$('ul.subnav').hover(function() {
		$(this).stop().animate({'top':subNavMarginRollover},'slow');
		}, function () {
		$(this).stop().animate({'top':subNavMarginTop}, 'slow');
	});
	
	var detachedArticles = null;
	$('ul.subnav li').click(function(){
		function fixGrid(){
			$('article.resource').removeClass('last');
			var articles = $('article.resource:visible, article.person:visible');
			var i = 0;
			var j = 0;
			while(i < articles.length){
				j++;
				if(j%3 == 0)
				{
					$(articles).eq(i).addClass('last');
				}
				i++;
			}
		}
		$('ul.subnav').append($(this));
		$(this).insertBefore($('ul.subnav li.tail'));
		$('ul.subnav').css('top',subNavMarginTop);
		
		if(detachedArticles)
		{
			$('section#feature_spots, section#bio_spots').prepend(detachedArticles);
			detachedArticles = null;
		}
		
		if(!$(this).hasClass('all')){
			detachedArticles = $("article.resource, article.person").not('.'+subNavList.type+'-'+$(this).text()).detach();
			console.log('.'+subNavList.type+'-'+$(this).text());
		}
		
		fixGrid();
		

	
	});
	

	$('#menu-custom-main-nav-1 li a span.separator:first').remove();
	
//	end nav stuff


//extra bit to have nav flag down on single post views
	if( $('article').hasClass('game') ) $("li.main_nav.menu-item-461").css('top',mainNavTop);
	else if ($('article').hasClass('resource')) $("li.main_nav.menu-item-994").css('top',mainNavTop);
	else if ($('article').hasClass('post')) $("li.main_nav.menu-item-1348").css('top',mainNavTop);
		

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
	


    
//    end news section
	
//	this shortens the news feed to fit in the banner
	

	
//	this shortens the slider caption
	
	$('.anythingSlider .wrapper ul li div.slider_caption p').each(function(){
	 $(this).text($(this).html().substring(0,200 )); 
	});

//	end news section
	


//image gallery
//	$("span.gallery-icon a").attr('class', 'fancybox');
//	$("span.gallery-icon a").attr('rel', 'gallery');
	
//	$("a.fancybox").fancybox();

//end image gallery
	

});

