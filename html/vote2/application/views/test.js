

	/**
	 * for onclick to change status
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 */
     $("#button_topic_show").click(function(){
		// console.log($(this).prop("checked"))
		var myKeyVals = { is_checked : $(this).prop("checked")}
		var saveData = $.ajax({
			type: 'POST',
			url: "https://se.buu.ac.th/gami_ossd/index.php/Leaderboard/update_status_show/",
			data: myKeyVals,
			dataType: "text",
			success: function(resultData) { toastr['success']("ดำเนินการเสร็จสิ้น") }
		});
	})

	/**
	 *  add Commma to string number.
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
	 */
	function numberWithCommas(x) {
		var raw_number = parseInt(x)
		return raw_number.toLocaleString();
	}

	var gold_url = "https://se.buu.ac.th/gami_ossd/assets/dist/img/gold_crown.png"
	var sliver_url = "https://se.buu.ac.th/gami_ossd/assets/dist/img/sliver_crown.png"
	var bronze_url = "https://se.buu.ac.th/gami_ossd/assets/dist/img/broezn_crown.png"
	var default_formatter = {
			enabled: true,
			useHTML: true,
			verticalAlign: 'top',
			crop: false,
			overflow: 'none',
			x: 0,
			y: -40,
			formatter: function () {
				return '<div style="text-align: center;" class="tooltip-title-font"><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
			}
	}
	var gold_formatter = {
				enabled: true,
				useHTML: true,
				y: -70,
				formatter: function () {
					return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="'+gold_url+'"></img><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
				}
	}
	var sliver_formatter =  {
				enabled: true,
				useHTML: true,
				y: -70,
				formatter: function () {
					return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="'+sliver_url+'"></img><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
				}
	}
	var bronze_formatter =  {
				enabled: true,
				useHTML: true,
				y: -70,
				formatter: function () {
					return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="'+bronze_url+'"></img><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
				}
	}
	// Set data bar chart
	var data_bar_chart = [{
		name: "จำนวนเงิน",
		showInLegend: false, 
		dataLabels: default_formatter,
		data: [{
			y: 0,          
			dataLabels:  gold_formatter
		},{
			y: 0,         
			dataLabels:  sliver_formatter
		},{
			y: 0,         
			dataLabels:  bronze_formatter
		}, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }]
		}
	];

	// Set bar char
	var bar_chart = Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Open Source Software Developers Camp #9'
		},
		// subtitle: {
		//     text: 'Open Source Software Developers Camp'
		// },
		xAxis: {
			categories: [
				'มกุล 0',
				'มกุล 1',
				'มกุล 2',
				'มกุล 3',
				'มกุล 4',
				'มกุล 5',
				'มกุล 6',
				'มกุล 7',
				'มกุล 8',
				'มกุล 9',
			],
			labels: {
				useHTML: true,
				formatter: function() {
					return '<img src="https://se.buu.ac.th/gami_ossd/assets/dist/img/cluster/cluster'+this.value.substring(this.value.length-1)+'.png" style="width: 30px; vertical-align: middle" /><span style="font-size:14px;font-weight:700"> '+this.value+'</span>';
				}
			},
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'จำนวนเงิน ($E)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="background-color: white;color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0;background-color: white;"><b>{point.y:,.2f} $E</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: data_bar_chart
	});

	/**
	 * findIndicesOfMax
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
	 */
	function findIndicesOfMax(inp, count) {
		var outp = new Array();
		for (var i = 0; i < inp.length; i++) {
			outp.push(i);
			if (outp.length > count) {
				outp.sort(function(a, b) { return inp[b].y - inp[a].y; });
				outp.pop();
			}
		}
		return outp;
	} // End findIndicesOfMax

	/**
	 * Setup Data to Chart
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @Update Namchok Singhachai
	 * @return mixed
	 */
	async function set_data_chart(){

		let colorHex;
		let colorTeam;

		colorTeam = [
			{"id":1,"color":"#a6a6a6"},
			{"id":2,"color":"#a6a6a6"},
			{"id":3,"color":"#a6a6a6"},
			{"id":4,"color":"#a6a6a6"},
			{"id":5,"color":"#a6a6a6"},
			{"id":6,"color":"#a6a6a6"},
			{"id":7,"color":"#a6a6a6"},
			{"id":8,"color":"#a6a6a6"},
			{"id":9,"color":"#a6a6a6"},
			{"id":10,"color":"#a6a6a6"},
		]; // For set team color

		await $.ajax({
			type: "GET",
			url: "https://se.buu.ac.th/gami_ossd/index.php/Leaderboard/getTeamColor",
			dataType: "JSON",
			success: function (res) {
				colorTeam = [
					{"id":1,"color":`${res[0]['color']}`},
					{"id":2,"color":`${res[1]['color']}`},
					{"id":3,"color":`${res[2]['color']}`},
					{"id":4,"color":`${res[3]['color']}`},
					{"id":5,"color":`${res[4]['color']}`},
					{"id":6,"color":`${res[5]['color']}`},
					{"id":7,"color":`${res[6]['color']}`},
					{"id":8,"color":`${res[7]['color']}`},
					{"id":9,"color":`${res[8]['color']}`},
					{"id":10,"color":`${res[9]['color']}`},
				]; // For set team color
			}
		});


		await $.get("https://se.buu.ac.th/gami_ossd/index.php/Leaderboard/get_all_point/", function(data, status){
			raw_data = JSON.parse(data);
			function compare( a, b ) {
			if ( parseInt(a.id) < parseInt(b.id) ){
				return -1;
			}
			if ( parseInt(a.id) > parseInt(b.id) ){
				return 1;
			}
			return 0;
			}

			raw_data.sort(compare);
			// console.log('------ Raw data --------')
			// console.log(raw_data)
			// console.log('---- Data bar chart ------')
			// console.log(data_bar_chart)
			
			for (var i = 0; i < raw_data.length; i++){
				data_bar_chart[0].data[i].y = parseInt(raw_data[i].point)	
				data_bar_chart[0].data[i].dataLabels = "";	
				// console.log('y',data_bar_chart[0].data[i].y)
			}

			data_bar_chart[0].data[0].color = colorTeam[0]["color"];
			data_bar_chart[0].data[1].color = colorTeam[1]["color"];
			data_bar_chart[0].data[2].color = colorTeam[2]["color"];
			data_bar_chart[0].data[3].color = colorTeam[3]["color"];
			data_bar_chart[0].data[4].color = colorTeam[4]["color"];
			data_bar_chart[0].data[5].color = colorTeam[5]["color"];
			data_bar_chart[0].data[6].color = colorTeam[6]["color"];
			data_bar_chart[0].data[7].color = colorTeam[7]["color"];
			data_bar_chart[0].data[8].color = colorTeam[8]["color"];
			data_bar_chart[0].data[9].color = colorTeam[9]["color"];
			// console.log(data_bar_chart)
			
			var indices = findIndicesOfMax(data_bar_chart[0].data, 3);

			for (var i = 0; i < indices.length; i++){
				if(i==0){
					data_bar_chart[0].data[indices[i]].dataLabels = gold_formatter
				}
				if(i==1){
					data_bar_chart[0].data[indices[i]].dataLabels = sliver_formatter
				}
				if(i==2){
					data_bar_chart[0].data[indices[i]].dataLabels = bronze_formatter
				}
			}
			bar_chart.update( {
				series: data_bar_chart
			})
		});
	} // End set_data_chart

	$(document).ready(function () {
		set_data_chart();
		setInterval(function(){ set_data_chart(); console.log(1) }, 5000);
	});
