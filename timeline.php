<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>

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
<form class="form-horizontal" action="history.php" method="post">
  <a class="navbar-brand" href="main.php">COVID-19 Exposure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="newtable.php">Member</a>
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
        
        <div class="container">
    <h2>รายชื่อแสดงข้อมูลผู้ใช้งานที่ไปสถานที่ร่วมกัน</h2>
    <div>
        <!-- <label for="shootdate">ชื่อ:</label>

        <input type="text" id="searchname" name="searchname">
        <button type="button" id="searchbutton">search</button> -->


        <!-- <button type="button" onclick="searchFunction()">search</button> -->
        </br></br>


        <div class="display" style="width:100%">

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>

                    <th>ชื่อ - นามสกุล</th>


                </tr>
                </thead>
                <tbody>
</form>

                <?php
                error_reporting(E_ALL);
                ini_set("display_errors", 1);
                
                include ("./includes/db.php");
                $ref = "timestamp";
                $data = $database->getReference ( $ref )->getValue ();


                $i = 0;
                foreach ($data as $key => $data1) {
                    $i++;
                    $arrayname[ $i ] = $data1[ 'name' ];

                }

                $arrayuni = array_unique ( $arrayname );

                foreach ($arrayuni as $key => $arrayuni1) {
                    echo '<tr>';
                    echo '<td>' . $arrayuni1 . '</td>';
                    echo '</tr>';

                }

                ?>
                </tbody>
            </table>
            </br>
            </br>
            </br>
            </br>
            </br>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exposureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exposurePerson"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <label for="enddate">วันที่</label>
                    <input type="date" id="enddate">

                    <label for="startdate">ถึง </label>
                    <input type="date" id="startdate">

                    
                    <!-- <input name="startdate" id="startdate" type="text"> -->
                    <!-- <input name="enddate" id="enddate" type="text"> -->

                        <table id="table" class="display" style="width:100%">
                            <thead>
                            <div class="modal-footer">

                            <form action="../Risk/history.php" method="GET">
                                <button type="submit" id="Hname" name="Hname" value="" class="btn btn-primary">ดูประวัติการเดินทาง</button>
                            </form>

                            </div>
                            <tr>

                                <th>ชื่อ - นามสกุล</th>
                                <th>สถานที่</th>
                                <th>เช็คเข้า</th>
                                <th>เช็คออก</th>

                            </tr>
                            </thead>

                            <tbody id="tabletbody">

                            </tbody>
                        </table>
                        <p id="demo"></p></br></br></br>
                    </div>
                    
                </div>
            </div>
        
        </div>
    
        
        <script>



            Date.prototype.stdate = (function() {
                var local = new Date(this);
                local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                return local.toJSON().slice(0,10);
            });
            
            Date.prototype.endate = (function() {
                var dateoutput = new Date();
                dateoutput.setDate(dateoutput.getDate() - 14);
                return dateoutput.toJSON().slice(0,10);
            });
   
 
          

                    //แสดงตาราง
            $(document).ready(function () {
                

                var table = $('#example').DataTable({
                    orderCellsTop: true,
                    // fixedHeader: true
                    
                });

                var table2 = $('#table').DataTable({
                    fixedHeader: {
                        header: true,
                        footer: true,
                    },
                    "order": [[ 3, "desc" ]]
                });

                        
                $('#startdate').val(new Date().stdate());
                $('#enddate').val(new Date().endate());
       
                $('#startdate, #enddate').on('change', function() {
                    var startdate = document.getElementById("startdate").value;
                    var enddate = document.getElementById("enddate").value;

                    var startdateaf = moment(startdate , "YYYY-MM-DD").format("DD/MM/YYYY");
                    var enddateaf = moment(enddate , "YYYY-MM-DD").format("DD/MM/YYYY");
                    
                    //moment หา array ปี/เดือน/วัน
                    var a = moment(moment(startdate , "YYYY-MM-DD").toArray());
                    var b = moment(moment(enddate , "YYYY-MM-DD").toArray());

                    var mDate = "";

                    var diffday = a.diff(b, 'days');
                    var stdate;
                    
                        if(diffday< 0){
                            // แจ้งเตื่อน วันที่ เริ่ม น้อยกว่า จบ
                            alert("กรุณาเลือกวันที่ให้ถูกต้อง");
                        }
                    for(stdate = 0 ;stdate <= diffday ; stdate++){

                    // console.log(moment(b).format("DD/MM/YYYY") );

                            if (stdate == diffday) { //ถ้าเป็นตัวสุดท้ายจะไม่ต่อด้วย,
                                mDate = mDate.concat(moment(b).format("DD/MM/YYYY"));
                            } else {
                                mDate = mDate.concat(moment(b).format("DD/MM/YYYY"), "|");
                            }
                

                    b.add(1, 'days');

                    }


                    
                    table2.search(mDate,true,false).draw();
                    
                } );


                // ==================================================================

                $('#example tbody').on('click', 'tr', function () {
                    // console.log( table.row( this ).data() );
                    $name = table.row(this).data()
                    // console.log($name['0']);
                    Searchbyname($name['0']);
                });
                        //ฟังก์ชัน search
                Array.prototype.multiIndexOf = function (el) {
                    var idxs = [];
                    for (var i = this.length - 1; i >= 0; i--) {
                        if (this[i] === el) {
                            idxs.unshift(i);
                        }
                    }
                    return idxs;
                };
                    // ไม่ให้แสดงรายชื่อซ้ำ
                function aUnique(value, index, self) {
                    return self.indexOf(value) === index;
                }


                <?php
                include ("includes/db.php");
                $ref = "timestamp";
                $data = $database->getReference ( $ref )->getValue ();

                    //ข้อมูลเก็บไว้เป็น array
                $i = 0;
                foreach ($data as $key => $data1) {
                    $name[ $i ] = $data1[ 'name' ];
                    $Place[ $i ] = $data1[ 'Place' ];
                    $CheckIn[ $i ] = $data1[ 'CheckIn' ];
                    $Checkout[ $i ] = $data1[ 'Checkout' ];
                    $i++;
                  }
                  // แปลงจาก array เป็น json
                $js_name = json_encode ( $name , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayname = " . $js_name . ";\n";
                $js_Place = json_encode ( $Place , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayPlace = " . $js_Place . ";\n";
                $js_CheckIn = json_encode ( $CheckIn , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayCheckIn = " . $js_CheckIn . ";\n";
                $js_Checkout = json_encode ( $Checkout , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayCheckout = " . $js_Checkout . ";\n";

                //  date and time to date
                for ($t = 0; $t < count ( $CheckIn ); $t++) {
                    $CheckInday[ $t ] = date ( "dd-mm-yyyy" , strtotime ( $CheckIn[ $t ] ) );
                }

                $js_CheckInday = json_encode ( $CheckInday , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayCheckInDay = " . $js_CheckInday . ";\n";
                ?>


                function Searchbyname(nameSearch) {
                    $('#exposureModal').modal('show');
                    $('#exposurePerson').html('ประวัติการ Contact ' + nameSearch);


                        document.getElementById("Hname").value = nameSearch;
                    
                    var aindex = javascript_arrayname.multiIndexOf(nameSearch);
                    var rsplace, rsplacetext = "";
                    var rsCheckIn, rsCheckIntext = "";

                    for (j = 0; j < aindex.length; j++) {
                         
                        $CheckIn = javascript_arrayCheckInDay[aindex[j]];
                        $place = javascript_arrayPlace[aindex[j]];

                        rsplace = javascript_arrayPlace.multiIndexOf($place);
                        rsCheckIn = javascript_arrayCheckInDay.multiIndexOf($CheckIn);

                        for (k = 0; k < rsplace.length; k++) {
                            if (k == rsplace.length - 1) { //ถ้าเป็นตัวสุดท้ายจะไม่ต่อด้วย,
                                rsplacetext = rsplacetext.concat(rsplace[k]);
                            } else {
                                rsplacetext = rsplacetext.concat(rsplace[k], ",");
                            }
                        }

                        for (l = 0; l < rsCheckIn.length; l++) {
                            if (l == rsCheckIn.length - 1) {
                                rsCheckIntext = rsCheckIntext.concat(rsCheckIn[l]);
                            } else {
                                rsCheckIntext = rsCheckIntext.concat(rsCheckIn[l], ",");
                            }
                        }
                    }
                   

                    var rsplacearraysp = rsplacetext.split(",");
                    var rsCheckInarraysp = rsCheckIntext.split(",");

                    var rsplacearrayspunique = rsplacearraysp.filter(aUnique);
                    var rsCheckInarrayspunique = rsCheckInarraysp.filter(aUnique);

                        //เช็คสถานที่และเวลา
                    const intersection = rsplacearrayspunique.filter(element => rsCheckInarrayspunique.includes(element));

                    // console.log("intersection : "+intersection);
                    var riskdata = [];
                    for (p = 0; p < intersection.length; p++) {
                        riskdata[p] = {
                            id: intersection[p],
                            name: javascript_arrayname[intersection[p]],
                            place: javascript_arrayPlace[intersection[p]],
                            checkin: javascript_arrayCheckIn[intersection[p]],
                            checkout: javascript_arrayCheckout[intersection[p]]
                        };

                    }

                    function onlyUnique(value, index, self) { 
                        return self.indexOf(value) === index;
                    }

                    let exposure = [];

                    // clear table
                    table2.clear().draw();
                    table2.search("",true,false).draw();

                    var count = 0;
                    var int;
                    var checkindate = [] , checkoutdate = [] ,responseDate = [];
                    // add data to table

                    for (z = 0; z < intersection.length; z++) {

                        checkindate[z] = moment(riskdata[z].checkin , "DD-MM-YYYY[T]hh:mm").format("DD/MM/YYYY");
                        checkoutdate[z] = moment(riskdata[z].checkout , "DD-MM-YYYY[T]hh:mm").format("DD/MM/YYYY");

                        //    console.log("check in :"+riskdata[z].checkin+" to :"+checkindate[z]);
                        //    console.log("check out :"+riskdata[z].checkout+" to :"+checkoutdate[z]);

                        if(riskdata[z].name == nameSearch)
                        {
                           //donoting
                        }else{
                            table2.row.add([
                            riskdata[z].name,
                            riskdata[z].place,
                            checkindate[z], 
                            checkoutdate[z], 
                        ]).draw(false);
                        count++;

                        }
                        // console.log(riskdata[z].name);
                        // document.getElementById("demo").innerHTML += riskdata[z].name+"</br>";
                        exposure.push(riskdata[z].name);
                    }

                    let unique = exposure.filter(onlyUnique);
                    document.getElementById("demo").innerHTML = "จำนวน" + " " + --unique.length + " " + "คน";


                }


                $('#searchname').on('keyup', function () {
                    var name = document.getElementById("searchname").value;

                    table
                        .columns(0)
                        .search(name)
                        .draw();
                });
                
            });

            </script>



    </div>
</div>
</body>
</html>