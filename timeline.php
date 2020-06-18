<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css"/>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

   
</head>
<body>

  <div class="container">
  <h2>Timeline</h2>
  <div style="text-align:center;"> 
  <label for="shootdate">ชื่อ:</label>

  <input type="text" id="searchname" name="searchname">
  <button type="button" id="searchbutton">search</button>

  
 

      
<!-- <button type="button" onclick="searchFunction()">search</button> -->
</br></br>



<div class="display" style="width:80%">

<table id="example" class="display" style="width:100%">
<thead>
      <tr>
      
        <th>ชื่อ - นามสกุล</th>


        
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
            $arrayname[$i] = $data1['name'];
            
           }
           
           $arrayuni = array_unique($arrayname);

           foreach($arrayuni as $key => $arrayuni1){
            echo '<tr>';
            echo '<td>'.$arrayuni1.'</td>';
            echo '</tr>';
          
            }

           ?>
       </tbody>
</table>

<p id="demo"></p>

</div>
<script>


  $(document).ready(function() {
  
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );  

    $('#example tbody').on( 'click', 'tr', function () {
    // console.log( table.row( this ).data() );
    $name = table.row( this ).data()
    // console.log($name['0']);
    Searchbyname($name['0']);
    } );

    Array.prototype.multiIndexOf = function (el) { 
            var idxs = [];
            for (var i = this.length - 1; i >= 0; i--) {
                if (this[i] === el) {
                    idxs.unshift(i);
                }
            }
            return idxs;
        };


    <?php
                include("includes/db.php");
                $ref = "timestamp";
                $data = $database->getReference($ref)->getValue();
                $i = 0;
                foreach($data as $key => $data1){
                    $name[$i] = $data1['name'];
                    $Place[$i] = $data1['Place'];
                    $CheckIn[$i] = $data1['CheckIn'];  
                    $Checkout[$i] = $data1['Checkout'];  
                    $i++;
                }

                $js_name = json_encode($name ,JSON_UNESCAPED_UNICODE);
                echo "var javascript_arrayname = ". $js_name . ";\n";
                $js_Place = json_encode($Place,JSON_UNESCAPED_UNICODE);
                echo "var javascript_arrayPlace = ". $js_Place . ";\n";
                $js_CheckIn = json_encode($CheckIn,JSON_UNESCAPED_UNICODE);
                echo "var javascript_arrayCheckIn = ". $js_CheckIn . ";\n";
                $js_Checkout = json_encode($Checkout,JSON_UNESCAPED_UNICODE);
                echo "var javascript_arrayCheckout = ". $js_Checkout . ";\n";
            ?>

    function Searchbyname(nameSearch){
        var aindex = javascript_arrayname.multiIndexOf(nameSearch);
        var rsplace ;
        allrsplace = [];
        var rsCheckIn ;
        allrsCheckIn= [];
        l=0;
        

        for(j=0;j<aindex.length;j++){ 
          $CheckIn = javascript_arrayCheckIn[aindex[j]];
          $place = javascript_arrayPlace[aindex[j]];

          rsplace = javascript_arrayPlace.multiIndexOf($place);
          rsCheckIn = javascript_arrayCheckIn.multiIndexOf($CheckIn);
          // allrsplace.push(rsplace);
            for(k=0;k<rsplace.length;k++){
              allrsplace[l] =(rsplace[k]);
              l++;
            }

          // allrsplace.push(rsplace);
          // allrsCheckIn.push(rsCheckIn);

        }


 
        // document.getElementById("demo").innerHTML = allrsplace;
        
        console.dir(allrsplace);


        
    } ;

    $('#searchname').on('keyup', function () {
    var name = document.getElementById("searchname").value ;

            table
              .columns( 0 )
              .search( name )
              .draw();
                // console.log(datainArray);

            } );
    } );

</script>
</body>
</html>