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
   <!-- Include the above in your HEAD tag -->
   <div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-3">
               <div class="well well-sm">
                   <form class="form-horizontal" action="login.php" method="post">
                       <fieldset>
                           <legend class="text-center">Login</legend>
                           <!-- Username input-->
                           <div class="form-group">
                               <label class="col-md-3 control-label" for="name">Username</label>
                               <div class="col-md-9">
                                   <input id="Username" name="Username" type="text" placeholder="Username" class="form-control">
                               </div>
                           </div>
                           <!-- Password input-->
                           <div class="form-group">
                               <label class="col-md-3 control-label" for="email">Password</label>
                               <div class="col-md-9">
                                   <input id="Password" name="Password" type="password" placeholder="Password" class="form-control">
                               </div>
                           </div>
                           <!-- Form actions -->
                           <div class="form-group">
                               <div class="col-md-12 text-right">
                                   <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                               </div>
                           </div>
                       </fieldset>
                   </form>
               </div>
           </div>
       </div>
   </div>
</body>
</html>