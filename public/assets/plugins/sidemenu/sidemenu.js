$(function() {
	$('.main-sidebar .with-sub').on('click', function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	})
	$(document).on('click touchstart', function(e) {
		e.stopPropagation();
		// closing of sidebar menu when clicking outside of it
		if (!$(e.target).closest('.main-header-menu-icon').length) {
			var sidebarTarg = $(e.target).closest('.main-sidebar').length;
			if (!sidebarTarg) {
				$('body').removeClass('main-sidebar-show');
			}
		}
	});
	
	$(document).on('click', '#mainSidebarToggle' ,function(event) {
		event.preventDefault();
		if (window.matchMedia('(min-width: 768px)').matches) {
			$('body').toggleClass('main-sidebar-hide');
		} else {
			$('body').toggleClass('main-sidebar-show');
		}
	});
	$(".side-menu").hover(function() {
		if ($('body').hasClass('main-sidebar-hide')) {
			$('body').addClass('main-sidebar-open');
		}
	}, function() {
		if ($('body').hasClass('main-sidebar-hide')) {
			$('body').removeClass('main-sidebar-open');
		}
	});
	
	/*---Scroling ---*/
	//P-scroll
	new PerfectScrollbar('.side-menu', {
		suppressScrollX: true
	});
	
});