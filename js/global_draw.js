// JavaScript Document
   /**
   *   竖形柱状图
   *	s1:横向坐标值,
   *    ticks：竖向坐标值
   *	id：元素id
   */
	var draw_bar_ver = function (s1,ticks,id)
	{
        $.jqplot.config.enablePlugins = true;
        plot1 = $.jqplot(id, [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });  
	}
	
	var draw_bar_cross = function(data,id)
	{
		plot5 = $.jqplot(id, data, {
            captureRightClick: true,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                shadowAngle: 135,
                rendererOptions: {
                    barDirection: 'vertical',
                    highlightMouseDown: true   
                },
                pointLabels: {show: true, formatString: '%d'}
            },
            legend: {
                show: false,
                location: 'e',
                placement: 'outside'
            },
            axes: {
                yaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer
                }
            }
        });
	}
	
	var draw_pie = function(data,id)
	{
		jQuery.jqplot.config.enablePlugins = true;
  		plot7 = jQuery.jqplot(id,data, 
			{
			  title: ' ', 
			  seriesDefaults: {shadow: true, renderer: jQuery.jqplot.PieRenderer, rendererOptions: { showDataLabels: true } }, 
			  legend: { show:true,location: 's',placement: 'inside' }
			}
		  );
	 }
	 
	 var draw_donut_pie = function(data,id)
	{
		var s1 = [['a',6], ['b',8], ['c',14], ['d',20]];
		  
		   
		  var plot3 = $.jqplot(id, [s1], {
			seriesDefaults: {
			  // make this a donut chart.
			  renderer:$.jqplot.DonutRenderer,
			  rendererOptions:{
				// Donut's can be cut into slices like pies.
				sliceMargin: 3,
				// Pies and donuts can start at any arbitrary angle.
				startAngle: -90,
				showDataLabels: true,
				// By default, data labels show the percentage of the donut/pie.
				// You can show the data 'value' or data 'label' instead.
				dataLabels: 'value'
			  }
			},
            legend: {
                show: true,
                location: 's',
                placement: 'inside'
            },
		  });
	 }
	
	
 

