var initPieChart = function() {
		$('.percentage-light').easyPieChart({
			barColor: function(percent) {
				percent /= 100;
				return "rgb(" + Math.round(255 * (1-percent)) + ", " + Math.round(255 * percent) + ", 0)";
			},
			trackColor: '#666',
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: 15,
			animate: 1000
		});

		$('.updateEasyPieChart').on('click', function(e) {
		  e.preventDefault();
		  $('.percentage-light').each(function() {
			var newValue = Math.round(100*Math.random());
			$(this).data('easyPieChart').update(newValue);
			$('span', this).text(newValue);
		  });
		  
		  
		});
	};
	
function drawpie()
{
	 var data = [
    ['Heavy Industry', 12],['Retail', 9], ['Light Industry', 14]
  ];
  var plot1 = jQuery.jqplot ('chart1', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
		  diameter:100,
        }
      }, 
      legend: { show:false, location: 'e',  xoffset: 120 },
	  borderWidth: 2.0,  
	 grid: {  
	 		background: '#fff' ,
			shadowAlpha: 0.07,
			borderWidth: 0,
			shadow: false,
		} ,
	shadowAlpha:0.01,
	gridPadding: {top:0, bottom:0, left:0, right:0},      
    }
  );
}	