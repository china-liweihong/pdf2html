// JavaScript Document
   /**
   *   ������״ͼ
   *	s1:��������ֵ,
   *    ticks����������ֵ
   *	id��Ԫ��id
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
