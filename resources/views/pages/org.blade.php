@extends('layouts.app')

@section('content')
<style>
	.google-visualization-orgchart-table,
	.google-visualization-orgchart-table tr,
	.google-visualization-orgchart-table td {
		border-collapse: collapse;
		background: white;
	}
	
</style>
<br>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {packages:["orgchart"]});
		google.charts.setOnLoadCallback(drawChart);
		let employee = <?= $employees ?>;
        
		function drawChart() {
			var data = new google.visualization.DataTable();
			var options = {
				allowHtml: true,
				backgroundColor: { fill:'transparent' },
				'is3D':true
			};
			data.addColumn('string', 'Name');
			data.addColumn('string', 'Manager');
			data.addColumn('string', 'ToolTip');
			employee.forEach(element => {
				data.addRows([
					[{'v': `${element.empno}`, 'f': `${element.fname}`}, `${element.employee_supervisor}`, '']
				]);
			});
			// For each orgchart box, provide the name, manager, and tooltip to show.
			
			// Create the chart.
			var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
			// Draw the chart, setting the allowHtml option to true for the tooltips.
			chart.draw(data, options);
		}
	$('#loading').hide();
	</script>
	<div style="overflow-x:auto">
		<div id="chart_div" style="zoom:60%"></div>
	</div>
@endsection
