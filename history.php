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
    <!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
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
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="main.php">COVID-19 Exposure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="newtable.php">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="timeline.php">Tracking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="location.php">Location</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="py-2">
        <!-- ใส่ PHP Code ของหน้าทั้งหมดทั้งมวลตรงนี้นะ -->
        <div class="container-fluid" >
  <h2>รายชื่อการเดินทางของ <?php  echo $_GET["Hname"]; ?></h2>
 
</br></br>
<div class="display" style="">
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
           $name = $_GET["Hname"]; 

           foreach($data as $key => $data1){
            
            if($name == $data1['name']){
            $i++;
            $CheckIn = $data1['CheckIn'];  
            $Checkout = $data1['Checkout']; 
            $newCheckIn = date("yy-m-d", strtotime($CheckIn));  
            $newCheckout = date("yy-m-d", strtotime($Checkout));  

           ?>
        
           <tr>
               
               <td><?php echo $data1['name']; ?></td>
               <td><?php echo $data1['Place']; ?></td>
               <td><?php echo $newCheckIn; ?></td>
               <td><?php echo $newCheckout; ?></td>
              
           </tr>
           <?php 
            }
           }
           ?>
       </tbody>
</table>
</div>
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            "order": [[ 3, "desc" ]]
        } );
    } );
    </script>
    
    </div>
</div>
</body>
</html>