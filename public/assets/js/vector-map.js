$(function() {
	'use strict';
	$('#vmap').vectorMap({
		map: 'world_en',
		backgroundColor: 'transparent',
		color: '#ffffff',
		hoverOpacity: 0.7,
		selectedColor: '#77778e33',
		enableZoom: true,
		showTooltip: true,
		scaleColors: ['#8760fb', '#6c4dc5'],
		values: sample_data,
		normalizeFunction: 'polynomial'
	});
	$('#vmap2').vectorMap({
		map: 'usa_en',
		color: '#eb6f33',
		showTooltip: true,
		backgroundColor: 'transparent',
		hoverColor: '#c55b28'
	});
	$('#vmap3').vectorMap({
		map: 'canada_en',
		color: '#01b8ff',
		borderColor: '#fff',
		backgroundColor: 'transparent',
		hoverColor: '#069fda',
		showLabels: true
	});

});