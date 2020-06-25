<!DOCTYPE html>
<html lang="en">
<head>
  <title>Location</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <a class="navbar-brand" href="#">COVID-19 Exposure</a>
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
  
<div class="row h-100 justify-content-center align-items-center " >
  <h2>เพิ่มข้อมูลสถานที่</h2>
   </div>
   <div class="row h-100 justify-content-center align-items-center">
   <div  class="col-md-9" >
            <form action="add_loc.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
           <label for="exampleFormControlInput1">สถานที่</label>
           <input type="text" class="form-control" name="location" placeholder="สถานที่">
       </div>
       <div class="form-group">
           <label for="exampleInputEmail1">ที่อยู่</label>
           <input type="text" class="form-control" name="address"  placeholder="ที่อยู่">
       </div>
       <button type="submit" name="push" class="btn btn-primary">Submit</button>
   </form>
   </div>
   </div>
</body>
</html>