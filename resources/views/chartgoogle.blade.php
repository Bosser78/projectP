@extends('layouts.master')

@section('content')


<style>
.chartt {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50vh; /* 100% ของความสูงของ viewport */
}</style>
<div class="chartt">
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>
</div>
</section>
{{-- ไว้ดูค่าข้อมูล --}}
{{-- <h1>{{ $stringValue = json_encode($answer) }}</h1>

<script>
// ตรงนี้คุณสามารถใช้ $answer ใน JavaScript
var data = {!! $stringValue !!};
</script> --}}


<script>

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColColors);

function drawColColors() {
      var data = new google.visualization.arrayToDataTable({{ Js::from($answer) }});


      var options = {
        title: 'จำนวนยาที่ขายออก',
        colors: ['#9575cd', '#33ac71'],
        hAxis: {
          title: 'ชื่อยา',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'จำนวน'
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

</script>


