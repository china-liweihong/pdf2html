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
				shadowAngle: 135,
                rendererOptions: {
                    barDirection: 'horizontal',
                       
                },
                pointLabels: {show: true}
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks,
					show: false
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
				pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
                shadowAngle: 5,
                rendererOptions: {
                    barDirection: 'vertical',
                    highlightMouseDown: true   
                },
                pointLabels: {show: true, formatString: '%s'}
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
	 
	 var draw_donut_pie = function(s1,id,l)
	{
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
                location: l,
                placement: 'inside'
            },
		  });
	 }
	
var draw_bar = function(id,ydata,xdata)
{
        // 路径配置
        require.config({
            paths:{ 
                'echarts' : 'http://echarts.baidu.com/build/echarts',
                'echarts/chart/bar' : './js/echart/build/build'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById(id)); 
                
            var     option = {
     
	tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'line'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    calculable : false,
    xAxis : [
        {
            type : 'value',
            boundaryGap : [0, 0.09]
        }
    ],
    yAxis : [
        {
            type : 'category',
            data : ydata
        }
    ],
    series : [
        {
           
            type:'bar',
            data:xdata
        }
    ]
};
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
}
	
 

