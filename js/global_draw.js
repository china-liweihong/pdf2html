// JavaScript Document
/**
   *   竖形柱状图
   *	s1:横向坐标值,
   *    ticks：竖向坐标值
   *	id：元素id
   */

var draw_bar = function(id, ydata, xdata) {
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