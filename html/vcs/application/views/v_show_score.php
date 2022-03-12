<style>
    #container {
        height: 500px;
    }
</style>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col">
            <div id="container"></div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var cho_vot_id = <?php echo $cho_vot_id; ?>;

    $(document).ready(function() {
        get_data_score_ajax(cho_vot_id)
});
    function get_data_score_ajax(cho_vot_id) {
        $.ajax({
            type: 'post',
            //path ตาม ที่ php เลย
            url: '<?php echo base_url('Dashboard_score/get_score_vote_ajax'); ?>',
            dataType: 'json',
            data: {
                cho_vot_id: cho_vot_id,
            },
            success: function() {

            },
            error: function() {
                alert('ajax get data Chart not working');
            }
        }).then(function(json_data) {
            create_chart_dashborad(json_data['arr_score']) // สร้าง chart ตามฟังก์ชัน
            console.log(json_data);
        });
    }


    function create_chart_dashborad(arr_score) {
        var obj_data_point = []; // อาเรย์ข้อมูลที่ สร้าง Barchart  ประเภทกิจกรรม
            

          arr_score.forEach((row, index) => {
       
             obj_data_point.push({
                    name: row['cho_name'],
                    y: parseInt(row['cho_score']), // str to int
                });

                // จะได้ bar chart
            });

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'OSSD #10'
            },
            subtitle: {
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'คะแนน'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
            },

            series: [{
                name: "มกุล",
                colorByPoint: true,
                data: obj_data_point,
            }],
            exporting: {
            buttons: {
                customButton: {
                    x: -62,
                    onclick: function () {
                        get_data_score_ajax(cho_vot_id);
                    },
                    text: 'Refetch',
                }
            }
        }
        });
    }

    Highcharts.SVGRenderer.prototype.symbols.refetch = function (x, y, w, h) {
    var path = [
        // Arrow stem
        'M', x + w * 0.5, y,
        'L', x + w * 0.5, y + h * 0.7,
        // Arrow head
        'M', x + w * 0.3, y + h * 0.5,
        'L', x + w * 0.5, y + h * 0.7,
        'L', x + w * 0.7, y + h * 0.5,
        // Box
        'M', x, y + h * 0.9,
        'L', x, y + h,
        'L', x + w, y + h,
        'L', x + w, y + h * 0.9
    ];
    return path;
};
</script>