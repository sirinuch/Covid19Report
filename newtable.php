<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/th.js" type="text/javascript"  charset="UTF-8"></script>

</head>
<body onload="selectFunction()">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php">COVID-19 Exposure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="timeline.php">Tracking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newtable.php">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">QR Generate</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="py-2">
        <!-- ใส่ PHP Code ของหน้าทั้งหมดทั้งมวลตรงนี้นะ -->
        <div class="container-fluid" >
  <h2>Tracking All Member</h2>
  <label for="shootdate">Date:</label>
  <input type="date" id="shootdate">
  location
      <select name="location" id="location" size="">
        <option value="all">all</option>
      </select>    
<!-- <button type="button" onclick="searchFunction()">search</button> -->
</br></br>
<div class="display" style="">
<script>
function selectFunction() {
  var x = document.getElementById("location");
  <?php
           include("includes/db.php");
           $ref = "timestamp";
           $data = $database->getReference($ref)->getValue();
           $i = 0;
           foreach($data as $key => $data1){
              $array[$i] = $data1['Place'];
              //  echo $data1['Place'];
               $i++;
           }
           $arrayuni= array_unique($array);
          $z = 0;
          foreach($arrayuni as $key => $data2){
            $z++;
          // echo  $data2."\n";

         echo "var option".$z." = document.createElement('option');";
         echo " option".$z.".text = '".$data2."';\n";
         echo "x.add(option".$z.");\n";

           }
           ?>
}
</script>
<table id="example" class="display" style="width:100%">
<thead>
      <tr>
      
        <th>ชื่อ - นามสกุล</th>
        <th>สถานที่</th>
        <th>เช็คเข้า</th>
        <th>เช็คออก</th>
        
      </tr>
    </thead>
<tbody>


    <?php
           include("includes/db.php");
           $ref = "timestamp";
           $data = $database->getReference($ref)->getValue();
           

           $i = 0;
           foreach($data as $key => $data1){
               $i++;

            $CheckIn = $data1['CheckIn'];  
            $Checkout = $data1['Checkout']; 
            $newCheckIn = date("yy-m-d", strtotime($CheckIn));  
            $newCheckout = date("yy-m-d", strtotime($Checkout));  

            // $newCheckIn = date("d F Y / H:i:s", strtotime($CheckIn));  
            // $newCheckout = date("d F Y / H:i:s", strtotime($Checkout));  

           ?>
        
           <tr>
               
               <td><?php echo $data1['name']; ?></td>
               <td><?php echo $data1['Place']; ?></td>
               <td><?php echo $newCheckIn; ?></td>
               <td><?php echo $newCheckout; ?></td>
              
           </tr>
           <?php 
           }
           ?>
       </tbody>
</table>
</div>
    <script>
                $( function() {
                    $("#shootdate" ).datepicker({dateFormat: 'dd-mm-yy' });
                    $('#example').DataTable();
                        dataTable.draw();
                    });
    </script>
    <script>
    $(document).ready(function() {
        
        $('#example tbody').on( 'click', 'tr', function () {
        // console.log( table.row( this ).data() );
        $rowdata = table.row( this ).data()

        table.search( $rowdata['1'].concat(" ", $rowdata['2']) ).draw();

        // console.log($rowdata['0']+ $rowdata['1']+$rowdata['2']);
    
        } );

        var table = $('#example').DataTable( {
            orderCellsTop: true,
            fixedHeader: true
        } );  
        var dateselect;
        var locationselect;

        $('#shootdate').on( 'change', function () {
            // alert(this.value);
            dateselect = this.value;
            // ตรงนี้ 
            table.search(this.value).draw();
            } );

        $('#location').on( 'change', function () {
            // alert(dateselect);
            if(this.value=="all"){
                locationselect = ""
            }else{
                locationselect = this.value;
            }

            if(dateselect != null){
                table.search( dateselect.concat(" ", locationselect) ).draw();
            }else{
                table.search( locationselect ).draw();
            }

                } );


    } );
    </script>
    
    </div>
</div>
</body>
</html>