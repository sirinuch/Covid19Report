
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

 </head>
 <body id="document">
     <p>Name</p>
     <input type="text" id="nameSearch"></input>
     <button id="searchbutton">Search</button>
<p id="demo"></p>

<script>
$(document).ready(function(){

    // mutiIndex ที่ต้องการค้นหา
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

    $('#searchbutton').on('click', function () {
        var nameSearch = document.getElementById("nameSearch");

        var a = javascript_arrayname.multiIndexOf(nameSearch.value);
        document.getElementById("demo").innerHTML = a;

        // javascript_arrayPlace.forEach(myFunction);
        // function myFunction(item, index) {
        //             document.getElementById("demo").innerHTML += index + ":" + item + "<br>"; 
        //     }
    

      
        
    } );

  } );

</script>

 </body>

 </html>
 