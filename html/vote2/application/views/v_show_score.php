<style>
    #container {
        height: 500px;
    }
</style>
<div class="container body">
    <div class="row mb-3">
        <div class="col" style="margin-left: 1%; padding-top: 1%;">
            <a href="<?php echo base_url() . 'Dashboard_score'; ?>"><?= $vot_name?></a> > ดูผลโหวต
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="container"></div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() .'asset/dist/highcharts.js'?> "></script>
<script src="<?php echo base_url() . 'asset/dist/modules/data.js'?> "></script>
<script src="<?php echo base_url() . 'asset/dist/modules/drilldown.js'?>"></script>
<script src="<?php echo base_url() . 'asset/dist/modules/exporting.js'?> "></script>
<script src="<?php echo base_url() . 'asset/dist//modules/export-data.js' ?>"></script>
<script src="<?php echo base_url() . 'asset/dist/modules/accessibility.js'?> "></script>

<script>
    var gold_url = "https://se.buu.ac.th/gami_ossd/assets/dist/img/gold_crown.png"
    var sliver_url = "https://se.buu.ac.th/gami_ossd/assets/dist/img/sliver_crown.png"
    var bronze_url = "https://se.buu.ac.th/gami_ossd/assets/dist/img/broezn_crown.png"
    var cho_vot_id = <?php echo $cho_vot_id; ?>;
    var gold_formatter = {
        enabled: true,
        useHTML: true,
        y: -70,
        formatter: function() {
            return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="' + gold_url + '"></img><br>' + Highcharts.numberFormat(this.y, 2) + '</div>'
        }
    }
    var sliver_formatter = {
        enabled: true,
        useHTML: true,
        y: -70,
        formatter: function() {
            return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="' + sliver_url + '"></img><br>' + Highcharts.numberFormat(this.y, 2) + '</div>'
        }
    }
    var bronze_formatter = {
        enabled: true,
        useHTML: true,
        y: -70,
        formatter: function() {
            return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="' + bronze_url + '"></img><br>' + Highcharts.numberFormat(this.y, 2) + '</div>'
        }
    }


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


    function findIndicesOfMax(inp, count) {
        var outp = new Array();


        console.log(inp);

        for (var i = 0; i < inp.length; i++) {
            outp.push(i);
        }

        if (outp.length >  count) {
                outp.sort(function(a, b) {
                    return inp[b].y - inp[a].y;
                });
                outp.pop();
            }else{
                outp.sort(function(a, b) {
                    return inp[b].y - inp[a].y;
                });
                outp.pop();
            }
        console.log("outp : " + outp);
        return outp;
    } // End findIndicesOfMax


    function create_chart_dashborad(arr_score) {
        var obj_data_point = []; // อาเรย์ข้อมูลที่ สร้าง Barchart  ประเภทกิจกรรม


        arr_score.forEach((row, index) => {

            obj_data_point.push({
                name: row['cho_name'],
                y: parseInt(row['cho_score']), // str to int
            });

            // จะได้ bar chart
        });

        console.log(obj_data_point);

        // console.log(obj_data_point[0]);


        var indices = findIndicesOfMax(obj_data_point, 3);

        console.log(indices);
        for (var i = 0; i < indices.length; i++) {
            if (i == 0) {
                obj_data_point[indices[i]].dataLabels = gold_formatter
            }
            if (i == 1) {
                obj_data_point[indices[i]].dataLabels = sliver_formatter
            }
            if (i == 2) {
                obj_data_point[indices[i]].dataLabels = bronze_formatter
            }
        }


        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Open Source Software Developers Camp #10'
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
                        onclick: function() {
                            get_data_score_ajax(cho_vot_id);
                        },
                        text: 'Refresh',
                    }
                }
            }
        });
    }
    //dddd
</script>