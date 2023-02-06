$(function() {
	'use strict'
	/***************** LINE CHARTS *****************/
	$('#sparkline1').sparkline('html', {
		width: 200,
		height: 70,
		lineColor: '#8760fb',
		fillColor: false,
		tooltipContainer: $('.main-content')
	});
	$('#sparkline2').sparkline('html', {
		width: 200,
		height: 70,
		lineColor: '#eb6f33',
		fillColor: false
	});
	/************** AREA CHARTS ********************/
	$('#sparkline3').sparkline('html', {
		width: 200,
		height: 70,
		lineColor: '#8760fb',
		fillColor: 'rgba(113, 76, 190,0.2)',
	});
	$('#sparkline4').sparkline('html', {
		width: 200,
		height: 70,
		lineColor: '#eb6f33',
		fillColor: 'rgba(235, 111, 51,0.2)'
	});
	/******************* BAR CHARTS *****************/
	$('#sparkline5').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 70,
		barColor: '#8760fb',
		chartRangeMax: 12
	});
	$('#sparkline6').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 70,
		barColor: '#eb6f33',
		chartRangeMax: 12
	});
	/***************** STACKED BAR CHARTS ****************/
	$('#sparkline7').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 70,
		barColor: '#8760fb',
		chartRangeMax: 12
	});
	$('#sparkline7').sparkline([4, 5, 6, 7, 4, 5, 8, 7, 6, 6, 4, 7, 6, 4, 7], {
		composite: true,
		type: 'bar',
		barWidth: 10,
		height: 70,
		barColor: '#eb6f33',
		chartRangeMax: 12
	});
	$('#sparkline8').sparkline('html', {
		type: 'bar',
		barWidth: 10,
		height: 70,
		barColor: '#01b8ff',
		chartRangeMax: 12
	});
	$('#sparkline8').sparkline([4, 5, 6, 7, 4, 5, 8, 7, 6, 6, 4, 7, 6, 4, 7], {
		composite: true,
		type: 'bar',
		barWidth: 10,
		height: 70,
		barColor: '#ff473d',
		chartRangeMax: 12
	});
	/**************** PIE CHART ****************/
	$('#sparkline9').sparkline('html', {
		type: 'pie',
		width: 70,
		height: 70,
		sliceColors: ['#8760fb', '#eb6f33', '#01b8ff']
	});
	$('#sparkline10').sparkline('html', {
		type: 'pie',
		width: 70,
		height: 70,
		sliceColors: ['#8760fb', '#eb6f33', '#01b8ff', '#ff473d', '#03c895', '#ffc107']
	});
});