
var hash = 'red';
var curTheme;
// for echarts online home page
var fileLocation = './js/echart/echarts';
require.config({
  paths: {
    echarts: fileLocation,
  
    'echarts/chart/pie': fileLocation,
  }
});
/*
// 按需加载
require(['echarts', 'js/echart/theme/' + hash,  'echarts/chart/pie'], requireCallback);

function requireCallback(ec, defaultTheme){
	echarts = ec;
	draw_echarts_bar("housingtypes",housingtypes_option);
//	draw_echarts_bar("AGEDISTRIBUTION",AGEDISTRIBUTION_option);
}
*/
function draw_echarts_bar(id,options)
{
	var domMain = document.getElementById(id);
	var myChart;
	myChart = echarts.init(domMain, curTheme);
	window.onresize = myChart.resize; 
	myChart.setOption(options, true);
}

/**
   *   竖形柱状图
   *	s1:横向坐标值,
   *    ticks：竖向坐标值
   *	id：元素id
   */

function draw_charts_column(id, ydata, xdata) {
  // 路径配置
   require.config({
    paths: {
      'echarts': './js/echart/echarts'
    }
  });
  // 使用
  require(['echarts', 'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
  ],
  function(ec) {
    // 基于准备好的dom，初始化echarts图表
    var myChart = ec.init(document.getElementById(id));
    var option = {
      tooltip: {
        trigger: 'axis',
        axisPointer: { // 坐标轴指示器，坐标轴触发有效
          type: 'line' // 默认为直线，可选为：'line' | 'shadow'
        }
      },
      calculable: false,
      xAxis: [{
        type: 'value',
        boundaryGap: [0, 0.09]
      }],
      yAxis: [{
        type: 'category',
        data: ydata
      }],
      series: [{
        type: 'bar',
        data: xdata
      }]
    };
    // 为echarts对象加载数据 
    myChart.setOption(option);
  });
}


/**
   *   竖形柱状图
   *	s1:横向坐标值,
   *    ticks：竖向坐标值
   *	id：元素id
   */

function draw_echart_pie(id,tname,tdata) {
 // 路径配置
var fileLocation = './js/echart/echarts';
require.config({
  paths: {
    echarts: fileLocation,
    'echarts/chart/pie': fileLocation,
  }
});
// 基于准备好的dom，初始化echarts图表
 var options = {
				  tooltip: {
					trigger: 'item',
					formatter: "{a} <br/>{b} : {c} ({d}%)"
				  },
				  calculable: false,
				  series: [{
									name: tname,
									type: 'pie',
									selectedMode: 'single',
									radius: [0, 70],
									itemStyle: {normal: {label: { position: 'inner'},labelLine: {show: false} }},
									data: []
								  },
								  {
									name: tname,
									type: 'pie',
									radius: [80, 140],
									data: tdata
								  }]
	};
  // 使用
  require(['echarts','echarts/chart/pie' ],// 使用柱状图就加载bar模块，按需加载
	  function(echarts) {
					var domMain = document.getElementById(id);
					var myChart;
					myChart = echarts.init(domMain, curTheme);
					window.onresize = myChart.resize; 
					myChart.setOption(options, true);
			}		
	);
}
