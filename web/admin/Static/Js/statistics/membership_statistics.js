$(function(){

    $('#start_time').layDate();
    $('#end_time').layDate();

    var myChart = echarts.init(document.getElementById('statistics'),'macarons');
    var res = {};
    var option = {
        title : {
            text: '会员新增趋势'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['新增会员','有单会员']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : res.time
            }
        ],
        yAxis : [
            {
                type : 'value',
                axisLabel : {
                    formatter: '{value} 人'
                }
            }
        ],
        series : [
            {
                name:'新增会员',
                type:'line',
                data:res.data
            }
        ]
    };
    myChart.setOption(option);

});
