<html>
	<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; 
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Data Mahasiswa Politeknik Caltex Riau 2020'
         },
         xAxis: {
            categories: ['Asal Daerah']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
               <?php 
        	include('config.php');
           $sql   = "SELECT *  FROM mahasiswa1111";
            $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
            while( $ret = mysqli_fetch_array( $query ) ){
            	$asal_daerah=$ret['asal_daerah']; 
 
                 $sql_jumlah   = "SELECT Jumlah FROM mahasiswa1111 WHERE asal_daerah='$asal_daerah'";        
                 $query_jumlah = mysqli_query( $conn,$sql_jumlah ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['Jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $asal_daerah; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>