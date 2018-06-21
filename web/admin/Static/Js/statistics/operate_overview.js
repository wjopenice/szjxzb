$(function(){

    // 起始位置日历控件
    laydate.skin('molv');//选择肤色
    laydate({
        elem: '#start_time',
        format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
        festival: true, //显示节日
        istime: false,
        choose: function(datas){ //选择日期完毕的回调
            // compare_time($('#start_time').val(),$('#end_time').val());
        }
    });

    // 结束位置日历控件
    laydate({
        elem: '#end_time',
        format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
        festival: true, //显示节日
        istime: false,
        choose: function(datas){ //选择日期完毕的回调
            // compare_time($('#start_time').val(),$('#end_time').val());
        }
    });

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
            data:['商品总额','优惠金额','商品成本','物流费用']
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
                name : '商品总额',
                axisLabel : {
                    formatter: '{value} ￥'
                }
            },
            {
                type : 'value',
                name : '商品成本',
                axisLabel : {
                    formatter: '{value} ￥'
                }
            }
        ],
        series : [
            {
                name:'商品总额',
                type:'bar',
                data:res.goods_arr
            },
            {
                name:'优惠金额',
                type:'bar',
                data:res.coupon_arr
            },
            {
                name:'商品成本',
                type:'bar',
                data:res.cost_arr
            },
            {
                name:'物流费用',
                type:'line',
                yAxisIndex: 1,
                data:res.shipping_arr
            }
        ]
    };

    myChart.setOption(option);



});
