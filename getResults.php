<?php
set_time_limit ( 0);
error_reporting(E_ERROR | E_PARSE);
require 'HotelAPI.php';
if (isset($_POST['hotel_location']) == false || isset($_POST['hotel_radius']) == false){
    header('Location: index.php');
    die();
}
//grab the info here etc.
$hotel = new HotelAPI();
$results = $hotel->GrabHotels($_POST['hotel_location'], $_POST['hotel_radius']);

?>
<head>

    <title>HotelAPI - Results</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body class="text-center">
</nav>
<div class="container h-100">

    <div class="h-100 justify-content-center align-items-center">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>ID#</th>
                <th>Hotel ID</th>
                <th>Cheapest Price(GetPackages)</th>
                <th>Contract ID</th>
                <th>Supplier</th>
                <th>Room Name</th>
                <th>Cheapest Price(Search)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $r){
                echo '<tr>';
                echo '<td>' . $r['hotel_id'] . '</td>';
                echo '<td>' . $r['hotel_id'] . '</td>';
                echo '<td>' . $r['final_price'] . '</td>';
                echo '<td>' . $r['contract_id'] . '</td>';
                echo '<td>' . $r['supplier_id'] . '</td>';
                echo '<td>' . $r['room_name'] . '</td>';
                echo '<td>' . $r['first_price'] . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#example').DataTable( {
            // Default Length.
            "pageLength": 5000,
            // Add export options
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],

            // change search text
            "language": {
                "search": "Filter records:"
            },

            // ID tab
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>
</body>