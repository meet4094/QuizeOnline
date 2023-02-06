$(function() {
	'use strict'
	
	/* chartjs (#sales) */
	var myCanvas = document.getElementById("sales");
	myCanvas.height = "350";
	
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
	gradientStroke1.addColorStop(0, 'rgba(85, 56, 171, 0.8)');
	gradientStroke1.addColorStop(1, 'rgba(85, 56, 171, 0.2) ');
	
	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
	gradientStroke2.addColorStop(0, 'rgba(1, 184, 255, 0.8)');
	gradientStroke2.addColorStop(1, 'rgba(1, 184, 255, 0.2) ');
	
    var myChart = new Chart( myCanvas, {
		type: 'line',
		data: {
            labels: ["Jan","Feb","Mar", "Apr", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"],
            type: 'line',
            datasets: [ {
				label: 'Total Win',
				data: [47, 45, 154, 38, 156, 24, 65, 31, 137, 39, 162, 51, 35, 141, 35, 27, 93, 53],
				backgroundColor: gradientStroke1,
				borderColor: '#5538ab',
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke1,
				pointBorderColor :'#5538ab',
				pointHoverBorderColor :gradientStroke1,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				lineTension: 0.2,
				 borderWidth: 2,
                    fill: 'origin'
            }, {
				label: 'Total Loss',
				data: [61, 27, 54, 143, 119, 46,47, 45, 54, 138, 56, 24, 165, 31, 37, 39, 62, 51, 35, 41],
				backgroundColor: gradientStroke2,
				borderColor: '#01b8ff',
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke2,
				pointBorderColor :'#01b8ff',
				pointHoverBorderColor :gradientStroke2,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				lineTension: 0.2,
				 borderWidth: 2,
                    fill: 'origin'
            }]
        },
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				cornerRadius: 3,
				intersect: false,
			},
			 stepsize: 200,
                min: 0,
                max: 400,
			legend: {
				display: true,
				labels: {
					usePointStyle: false,
				},
			},
			scales: {
				xAxes: [{
					
					display: true,
					gridLines: {
						display: true,
						drawBorder: false,
						color:'rgba(119, 119, 142, 0.08)'
					},
					ticks: {
                            fontColor: '#b0bac9',
                            autoSkip: true,
                            maxTicksLimit: 9,
                            maxRotation: 0,
                            labelOffset: 10
                        },
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#b0bac9",
					 },
					display: true,
					gridLines: {
						display: true,
						drawBorder: false,
						color:'rgba(119, 119, 142, 0.08)'
					},
					scaleLabel: {
						display: false,
						labelString: 'sales',
						fontColor: 'transparent'
					}
				}]
			},
			title: {
				display:false,
				text: 'Normal Legend'
			}
		}
	});
	/* chartjs (#sales) closed */
	
	
	
	// Peity-donut
	$('.peity-donut').peity('donut');
	
	// Datepicker
	$('.fc-datepicker').datepicker({
		showOtherMonths: true,
		selectOtherMonths: true
	});

	//Select2
	function formatState (state) {
	  if (!state.id) { return state.text; }
	  var $state = $(
		'<span><img src="../../assets/plugins/flag-icon-css/flags/4x3/' +  state.element.value.toLowerCase() +
	'.svg" class="img-flag" /> ' +
	state.text +  '</span>'
	 );
	 return $state;
	};

	$(".select2-flag-search").select2({
	  templateResult: formatState,
	  templateSelection: formatState,
	   width: '100%'
	});
	
	$(".scroll-widget").mCustomScrollbar({
		theme: "minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	

});