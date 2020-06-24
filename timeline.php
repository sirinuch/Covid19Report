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
<body>
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
        <a class="nav-link" href="location.php">Location</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="py-2">
        <!-- ใส่ PHP Code ของหน้าทั้งหมดทั้งมวลตรงนี้นะ -->
        <div class="container">
    <h2>Timeline</h2>
    <div>
        <label for="shootdate">ชื่อ:</label>

        <input type="text" id="searchname" name="searchname">
        <button type="button" id="searchbutton">search</button>


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
                        <table id="table" class="display" style="width:100%">
                            <thead>
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
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <script>


            $(document).ready(function () {

                var table = $('#example').DataTable({
                    orderCellsTop: true,
                    // fixedHeader: true
                });

                var table2 = $('#table').DataTable({
                    fixedHeader: {
                        header: true,
                        footer: true
                    }
                });

                $('#example tbody').on('click', 'tr', function () {
                    // console.log( table.row( this ).data() );
                    $name = table.row(this).data()
                    // console.log($name['0']);
                    Searchbyname($name['0']);
                });

                Array.prototype.multiIndexOf = function (el) {
                    var idxs = [];
                    for (var i = this.length - 1; i >= 0; i--) {
                        if (this[i] === el) {
                            idxs.unshift(i);
                        }
                    }
                    return idxs;
                };

                function aUnique(value, index, self) {
                    return self.indexOf(value) === index;
                }


                <?php
                include ("includes/db.php");
                $ref = "timestamp";
                $data = $database->getReference ( $ref )->getValue ();



                $i = 0;
                foreach ($data as $key => $data1) {
                    $name[ $i ] = $data1[ 'name' ];
                    $Place[ $i ] = $data1[ 'Place' ];
                    $CheckIn[ $i ] = $data1[ 'CheckIn' ];
                    $Checkout[ $i ] = $data1[ 'Checkout' ];
                    $i++;
                }
                $js_name = json_encode ( $name , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayname = " . $js_name . ";\n";
                $js_Place = json_encode ( $Place , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayPlace = " . $js_Place . ";\n";
                $js_CheckIn = json_encode ( $CheckIn , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayCheckIn = " . $js_CheckIn . ";\n";
                $js_Checkout = json_encode ( $Checkout , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayCheckout = " . $js_Checkout . ";\n";

                //  dateandtime to date
                for ($t = 0; $t < count ( $CheckIn ); $t++) {
                    $CheckInday[ $t ] = date ( "d-m-yy" , strtotime ( $CheckIn[ $t ] ) );
                }

                $js_CheckInday = json_encode ( $CheckInday , JSON_UNESCAPED_UNICODE );
                echo "var javascript_arrayCheckInDay = " . $js_CheckInday . ";\n";
                ?>

                function Searchbyname(nameSearch) {
                    $('#exposureModal').modal('show');
                    $('#exposurePerson').html('ประวัติการเดินทางของ ' + nameSearch);
                    var aindex = javascript_arrayname.multiIndexOf(nameSearch);
                    var rsplace, rsplacetext = "";
                    var rsCheckIn, rsCheckIntext = "";

                    for (j = 0; j < aindex.length; j++) {
                        $CheckIn = javascript_arrayCheckInDay[aindex[j]];
                        $place = javascript_arrayPlace[aindex[j]];

                        rsplace = javascript_arrayPlace.multiIndexOf($place);
                        rsCheckIn = javascript_arrayCheckInDay.multiIndexOf($CheckIn);

                        for (k = 0; k < rsplace.length; k++) {
                            if (k == rsplace.length - 1) {
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
                    var count = 0;
                    var int;
                    // add data to table
                    for (z = 0; z < intersection.length; z++) {
                        moment.locale('th');
                        table2.row.add([
                            riskdata[z].name,
                            riskdata[z].place,
                            moment(riskdata[z].checkin, "DD MM YYYY hh:mm:ss"),
                            moment(riskdata[z].checkout, "DD MM YYYY hh:mm:ss")
                        ]).draw(false);
                        console.log(moment().format('LLLL'))
                        // console.log(riskdata[z].name);
                        // document.getElementById("demo").innerHTML += riskdata[z].name+"</br>";
                        count++;
                        exposure.push(riskdata[z].name);
                    }

                    let unique = exposure.filter(onlyUnique);

                    document.getElementById("demo").innerHTML = "จำนวน" + " " + unique.length + " " + "คน";


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
        <!-- <script>
                $('#tabletbody').collapse({
                toggle: false
                })

            </script> -->
    </div>
</div>
</body>
</html>