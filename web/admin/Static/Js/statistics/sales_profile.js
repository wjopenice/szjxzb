$(function(){

    $('#start_time').layDate();
    $('#end_time').layDate();

    var res = {};
    var myChart = echarts.init(document.getElementById('statistics'),'macarons');
    var option = {
        tooltip : {
            trigger: 'axis'
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType: {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        legend: {
            data:['交易金额','订单数','客单价']
        },
        xAxis : [
            {
                type : 'category',
                data : res.time
            }
        ],
        yAxis : [
            {
                type : 'value',
                name : '金额',
                axisLabel : {
                    formatter: ' ￥'
                }
            },
            {
                type : 'value',
                name : '客单价',
                axisLabel : {
                    formatter: ' ￥'
                }
            }
        ],
        series : [
            {
                name:'交易金额',
                type:'bar',
                data:res.amount
            },
            {
                name:'订单数',
                type:'bar',
                data:res.order
            },
            {
                name:'客单价',
                type:'line',
                yAxisIndex: 1,
                data:res.sign
            }
        ]
    };
    myChart.setOption(option);

});

