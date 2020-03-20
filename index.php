<?php

$today = date("Y/m/d", strtotime("+ 30 days"));
$today2 = date("Y/m/d", strtotime("+ 33 days"));
?>
<head>
    <title>HotelAPI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
</head>
<body class="text-center">
<nav class="navbar navbar-light bg-light">
   <center> <span class="navbar-brand mb-0 h1" >Coded with ♡</span></center>
</nav>
<div class="container h-100 col-sm-2">
    <div class="h-100 justify-content-center align-items-center">
        <form action="getResults.php" method="post">
        <div class="form-group">
                <br/><br/>

            <div class="form-group">
                <label for="exampleInputPassword2">HotelLocation</label>
                <input type="text" class="form-control" name="hotel_location" value="644158" id="exampleInputPassword2" value="10" placeholder="Enter Hotel Location">
                <small id="emailHelp2" class="form-text text-muted">Hotel Location ID</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Radius in Meters</label>
                <input type="text" class="form-control" name="hotel_radius" value="75000" id="exampleInputPassword2" value="10" placeholder="Enter Meter Radius">
                <small id="emailHelp2" class="form-text text-muted">Radius in meters</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Search Timeout</label>
                <input type="text" class="form-control" name="timeouts" value="60" id="exampleInputPassword2" value="10" placeholder="Enter Meter Radius">
                <small id="emailHelp2" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">GetPackages Timeout</label>
                <input type="text" class="form-control" name="hotel_packagetime" value="3" id="exampleInputPassword2" value="10" placeholder="Enter Meter Radius">
                <small id="emailHelp2" class="form-text text-muted"></small>
            </div>
            Checkin
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="check_in" value="<?php echo $today ?>" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                CheckOut
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" name="check_out" value="<?php echo $today2 ?>" class="form-control datetimepicker-input"  data-target="#datetimepicker2"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="searchbtn"  onclick="getElementById('searchbtn').disabled = true;document.querySelector('form').submit();">
                Get Results
            </button>
        </form>
    </div>
</div>

<footer class="mastfoot mt-auto">
    <div class="inner">
        Travolutionary
    </div>
</footer>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $(function () {
        //14-Jan-2020%2000:00
        var picker = $('#datetimepicker1').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
    $(function () {
        var picker2 = $('#datetimepicker2').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
</script>
<script type="text/javascript">
    $('#searchbtn').click(function() {
//   $(this).html('<Div style="margin-top:-20px" />; <img  src="loading1.svg" />');

        $('#searchbtn').html('<Div style="margin-top:-20px" /><br><h2>Fetching Results</h2><br><img  src="loading1.svg" />');


    })
</script>