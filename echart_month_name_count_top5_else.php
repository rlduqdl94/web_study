<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  </head>
  <body>

<input type="button" name="" value="테스트" class="btn btn-primary" onclick="start('테스트')">
<input type="button" name="" value="test" class="btn btn-primary" onclick="start('test')">
    <div class="card-body" id="container999" style="width: auto;height:500px;">
</div>



<div class="table-responsive">
  <table id="example2" class="table table-bordered table-striped">
     <!-- example1은 선택 가능 search 기능 까지있다. -->
    <thead>
    <tr>

      <th>이름</th>
      <th>날짜</th>

    </tr>
    </thead>
      <tbody id="material_table">

        <?php
        date_default_timezone_set('Asia/Seoul');

        // $serverName = "211.250.242.31,1455";
        $serverName = "10.0.0.2,1433";

        $connectionOptions = array(
            "database" => "study", // 데이터베이스명
            "uid" => "sa",   // 유저 아이디
            "pwd" => "sejoongDB9778@$",    // 유저 비번
            "CharacterSet" => "UTF-8"
        );

        // DB커넥션 연결
        $con = sqlsrv_connect($serverName, $connectionOptions);

        // 파람/옵션 설정 ..
        $params = array();
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

        $sql = "SELECT * FROM [study].[dbo].[echart]";
        $result = sqlsrv_query($con,$sql,$params,$options);

        $total = sqlsrv_num_rows($result);
         ?>
        <?php for ($i=0; $i < $total; $i++) {
          $row = sqlsrv_fetch_array($result);
          $pro_name = $row['pro_name'];

          $date_time = $row['LOT_date_time'];
        ?>
        <tr>
          <td><?=$pro_name?></td>
          <td><?=$date_time?></td>


        </tr>

      <?php } ?>
    </tbody>
  </table>
  </div>
<script src="../../plugins/jquery/jquery.min.js"></script>



<!-- echart -->
<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.3.2/dist/echarts.min.js"></script>


<script src="./echart_style.js"></script>
<!-- echart 끝 -->




<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "lengthChange": true,
    });
  });
</script>



<script type="text/javascript">

var top_1 = ['','','','','','','','','','','',''];
var top_2 = ['','','','','','','','','','','',''];
var top_3 = ['','','','','','','','','','','',''];
var top_4 = ['','','','','','','','','','','',''];
var top_5 = ['','','','','','','','','','','',''];
var top_0 = ['','','','','','','','','','','',''];
function getFields(input, field) {
    var output = [];
    for (var i=0; i < input.length ; ++i)
        output.push(input[i][field]);
    return output;
}

function start(status){
  console.log(status);
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: './get_echart_month.php',
    // url: 'https://api.manana.kr/karaoke/kumyoung.json',
    contentType :   "application/x-www-form-urlencoded; charset=UTF-8",
    async:false, // 전역변수 설정 변수
    data : {
      status:status
    },
    success: function (retVal) {
  console.log(retVal);
  var pro_name = getFields(retVal, "pro_name");


var pro_name = new Set(pro_name);


var pro_name = [...pro_name];
  console.log(pro_name)

for (var i = 0; i < retVal.length; i++) {
  if(retVal[i].pro_name == pro_name[0]){
    // console.log(retVal[i].LOT_date_time.match('-01'))
    if (retVal[i].LOT_date_time.match('-01') != null) {
      top_1[0] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-02') != null) {
      top_1[1] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-03') != null) {
      top_1[2] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-04') != null) {
      top_1[3] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-05') != null) {
      top_1[4] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-06') != null) {
      top_1[5] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-07') != null) {
      top_1[6] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-08') != null) {
      top_1[7] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-09') != null) {
      top_1[8] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-10') != null) {
      top_1[9] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-11') != null) {
      top_1[10] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-12') != null) {
      top_1[11] = retVal[i].count;
    }
  }

  // 2
  if(retVal[i].pro_name == pro_name[1]){
    // console.log(retVal[i].LOT_date_time.match('-01'))
    if (retVal[i].LOT_date_time.match('-01') != null) {
      top_2[0] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-02') != null) {
      top_2[1] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-03') != null) {
      top_2[2] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-04') != null) {
      top_2[3] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-05') != null) {
      top_2[4] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-06') != null) {
      top_2[5] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-07') != null) {
      top_2[6] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-08') != null) {
      top_2[7] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-09') != null) {
      top_2[8] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-10') != null) {
      top_2[9] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-11') != null) {
      top_2[10] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-12') != null) {
      top_2[11] = retVal[i].count;
    }
  }

  // 3
  if(retVal[i].pro_name == pro_name[2]){
    // console.log(retVal[i].LOT_date_time.match('-01'))
    if (retVal[i].LOT_date_time.match('-01') != null) {
      top_3[0] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-02') != null) {
      top_3[1] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-03') != null) {
      top_3[2] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-04') != null) {
      top_3[3] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-05') != null) {
      top_3[4] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-06') != null) {
      top_3[5] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-07') != null) {
      top_3[6] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-08') != null) {
      top_3[7] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-09') != null) {
      top_3[8] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-10') != null) {
      top_3[9] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-11') != null) {
      top_3[10] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-12') != null) {
      top_3[11] = retVal[i].count;
    }
  }
  // 4
  if(retVal[i].pro_name == pro_name[3]){
    // console.log(retVal[i].LOT_date_time.match('-01'))
    if (retVal[i].LOT_date_time.match('-01') != null) {
      top_4[0] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-02') != null) {
      top_4[1] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-03') != null) {
      top_4[2] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-04') != null) {
      top_4[3] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-05') != null) {
      top_4[4] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-06') != null) {
      top_4[5] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-07') != null) {
      top_4[6] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-08') != null) {
      top_4[7] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-09') != null) {
      top_4[8] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-10') != null) {
      top_4[9] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-11') != null) {
      top_4[10] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-12') != null) {
      top_4[11] = retVal[i].count;
    }
  }
  // 5
  if(retVal[i].pro_name == pro_name[4]){
    // console.log(retVal[i].LOT_date_time.match('-01'))
    if (retVal[i].LOT_date_time.match('-01') != null) {
      top_5[0] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-02') != null) {
      top_5[1] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-03') != null) {
      top_5[2] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-04') != null) {
      top_5[3] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-05') != null) {
      top_5[4] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-06') != null) {
      top_5[5] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-07') != null) {
      top_5[6] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-08') != null) {
      top_5[7] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-09') != null) {
      top_5[8] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-10') != null) {
      top_5[9] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-11') != null) {
      top_5[10] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-12') != null) {
      top_5[11] = retVal[i].count;
    }
  }
  // 기타
  if(retVal[i].pro_name == pro_name[5]){
    // console.log(retVal[i].LOT_date_time.match('-01'))
    if (retVal[i].LOT_date_time.match('-01') != null) {
      top_0[0] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-02') != null) {
      top_0[1] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-03') != null) {
      top_0[2] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-04') != null) {
      top_0[3] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-05') != null) {
      top_0[4] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-06') != null) {
      top_0[5] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-07') != null) {
      top_0[6] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-08') != null) {
      top_0[7] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-09') != null) {
      top_0[8] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-10') != null) {
      top_0[9] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-11') != null) {
      top_0[10] = retVal[i].count;
    }
    if (retVal[i].LOT_date_time.match('-12') != null) {
      top_0[11] = retVal[i].count;
    }
  }
}


console.log(top_0);
console.log(top_1);
console.log(top_2);
console.log(top_3);
console.log(top_4);
console.log(top_5);
start_chart(pro_name,top_0,top_1,top_2,top_3,top_4,top_5)
    },
    error: function (request, status, error) {
        console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
        // 오류가 날경우 console창 오류 메세지 출력
    }
  });
}

</script>


  <script type="text/javascript">

function start_chart(pro_name,top_0,top_1,top_2,top_3,top_4,top_5){

    var dom = document.getElementById('container999');
    var myChart = echarts.init(dom, 'westeros', {
      renderer: 'canvas',
      useDirtyRect: false
    });
    var app = {};

    var option;

    option = {
  tooltip: {
    trigger: 'axis',
    axisPointer: {
      type: 'shadow'
    }
  },
  legend: {},
  grid: {
    left: '3%',
    right: '4%',
    bottom: '3%',
    containLabel: true
  },
  xAxis: [
    {
      type: 'category',
      data: ['1월', '2월', '3월', '4월', '5월', '6월', '7월','8월','9월','10월','11월','12월']
    }
  ],
  yAxis: [
    {
      type: 'value'
    }
  ],
  series: [
    // {
    //   name: 'Direct',
    //   type: 'bar',
    //   emphasis: {
    //     focus: 'series'
    //   },
    //   data: [320, 332, 301, 334, 390, 330, 320]
    // },
    {
      name: pro_name[0],
      type: 'bar',
      stack: 'Ad',
      emphasis: {
        focus: 'series'
      },
      data: top_1
    },
    {
      name: pro_name[1],
      type: 'bar',
      stack: 'Ad',
      emphasis: {
        focus: 'series'
      },
      data: top_2
    },
    {
      name: pro_name[2],
      type: 'bar',
      stack: 'Ad',
      emphasis: {
        focus: 'series'
      },
      data: top_3
    },
    {
      name: pro_name[3],
      type: 'bar',
      stack: 'Ad',
      emphasis: {
        focus: 'series'
      },
      data: top_4
    },
    {
      name: pro_name[4],
      type: 'bar',
      stack: 'Ad',
      emphasis: {
        focus: 'series'
      },
      data: top_5
    },
    {
      name: pro_name[5],
      type: 'bar',
      stack: 'Ad',
      emphasis: {
        focus: 'series'
      },
      data: top_0
    },
    // {
    //   name: 'Union Ads',
    //   type: 'bar',
    //   stack: 'Ad',
    //   emphasis: {
    //     focus: 'series'
    //   },
    //   data: [220, 182, 191, 234, 290, 330, 310]
    // },
    // {
    //   name: 'Video Ads',
    //   type: 'bar',
    //   stack: 'Ad',
    //   emphasis: {
    //     focus: 'series'
    //   },
    //   data: [150, 232, 201, 154, 190, 330, 410]
    // },




  ]
};

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);

  }

    start('테스트')
  </script>
  </body>
</html>
