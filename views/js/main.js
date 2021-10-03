$(document).ready(function($) {

	"use strict";

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};

 loader();


$( document ).ready(function() {
    $('#promosModal').modal('toggle')
});

	// $("#videoslider1").prop('muted', false);
	
	// //ponemos mute en no
	
	// $("#play-mute").click( function (){
	// 	if( $("#videoslider1").prop('muted') )
	// 	{
	// 		//si mute esta en no es falso
	// 		$("#videoslider1").prop('muted', false);
	// 		console.log("video con sonido");
	// 	}
	
	// 	else {
	// 	$("#videoslider1").prop('muted', true);
	// 	console.log("video silenciado");
	// 	//sino se pone en mute
	// 	}
	
	// });








	var carousel = function() {
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			stagePadding: 5,
			nav: false,
			navText: ['<span class="icon-chevron-left">', '<span class="icon-chevron-right">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});
	};
	carousel();

  /* ----------------------------------------------------------- */
  /*  1. TOP SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */    

  $('.mu-top-slider').slick({
	dots: true,
	infinite: true,
	arrows: false,
	speed: 600,     
	autoplay: true,
	fade: true,
	
	cssEase: 'linear'
  });








	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');
					navbar.append();
					$("#link_logo").append("<img id='logo-negro' class='navbar__logo' src='views/images/logo.svg' alt='logo nuut grill'> ");
					$("#logo-change").hide()
					
					// $("#logo-change").replaceWith("<img class='navbar__logo' src='images/logo.svg' alt='logo nuut grill'>"); 
            			
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
					$("#logo-change").show();
					$("#logo-negro").remove();


				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.ftco-number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();
	
	

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();

	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();
//navigation footer
	var OnePageFooter = function() {
		$(".smoothscroll[href^='#'], #footer-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();
				var hash = this.hash,
				footerNav = $('.ftco-footer');
				$('html, footer').animate({
				scrollTop: $(hash).offset().top
			}, 700, 'easeInOutExpo', function(){
				window.location.hash = hash;
			});


			// if ( footerNav.is(':visible') ) {
			// 	footerNav.click();
			// }
			});
		// 	$('body').on('activate.bs.scrollspy', function () {
		// 	console.log('nice');

		
		// });
		
	};
	OnePageFooter();
	













	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('#m_date').datepicker({
	  'format': 'm/d/yyyy',
	  'autoclose': true
	});
	$('#m_time').timepicker();



























/* API YOUTUBE */


 // var nextPageToken = "";
    // // Resultados por pagina
    // var resPorPagina = 1;
    // // Paginas a mostrar
    // var paginas = 1;
    // var key = "AIzaSyDSxKQLP-6yz6wn4tGcaQzi0RXzrkIamXk";
    // var idCanal = "UC24x6TWv5MWWkcxn3fdbc9Q";
    // var url = "https://www.googleapis.com/youtube/v3/search?key=" + key + "&channelId=" + idCanal + "&part=snippet,id&order=date&maxResults=" + resPorPagina;
  
    // $.getJSON(url, function (data) {
    //   console.log(data);
    
    // for (var k in data.items) {
    // var tituloVideo=data.items[k]["snippet"].title;
  
    // var urlVideo="https://www.youtube.com/embed/"+data.items[k]["id"].videoId;
    // var fechaVideo=data.items[k]["snippet"].publishedAt;
    // console.log(urlVideo);
    // console.log(k, data.items[k]["id"].videoId);
   
    // // $("#contenedor-iframe").append('<iframe width="100%" height="315" src="'+urlVideo+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    // }
    
    // });


	
	




});

