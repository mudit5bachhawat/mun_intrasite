<?php
session_name("admin");
session_start();

if (!isset($_SESSION['email'])) header("Location: index.php");
if ($_SESSION["type"]=="ges_finance") $finance=true; else $finance=false;
include_once('inc/db.php');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Database</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/png">
    <link rel="shortcut icon" href="../favicon.ico" type="image/ico">

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="//cdn.datatables.net/tabletools/2.2.1/css/dataTables.tableTools.css" rel="stylesheet">
    <link href="//cdn.datatables.net/colvis/1.1.0/css/dataTables.colVis.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style type="text/css">
    .col-sm-10
    {
        padding-left: 40px;
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <?php include_once('inc/navbar.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Database
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ap</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Resume</th>
                                            <th><?php if ($finance==true) echo "Reciept"; else echo "Letter"; ?></th>
                                            <th>Gender</th>
                                            <th>Designation</th>
                                            <th>City</th>
                                            <th>College</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Name of Higher Authority</th>
                                            <th>Contact of Higher Authority</th>
                                            <th>Name of Incharge</th>
                                            <th>Contact of Incharge</th>
                                            <th>Stage</th>
                                            <th>Arrival Timestamp</th>
                                            <th>Departure Timestamp</th>
                                            <th>Ticket Details</th>
                                            <th>Accomodation</th>
                                            <th>Payment Type</th>
                                            <th>Reciept ID</th>
                                            <th>Verification</th>
                                            <th>Timestamp</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $query="SELECT *,DATE_ADD(timestamp,INTERVAL 45000 MINUTE_SECOND) FROM ".TBL_REG." ORDER BY timestamp ASC";
                                            $result=mysqli_query($db_connection,$query);
                                            $count=1;
                                            if (!$result) {
                                                die(mysqli_error($db_connection));
                                            }
                                            while($row = mysqli_fetch_array($result)) 
                                            {
                                                if ($finance==true){
                                                    $file="reciept";
                                                    if ($row["payment_verified"]!=""){

                                                        $verified="success"; 
                                                        $function="";  
                                                        $icon="glyphicon glyphicon-ok-sign";  
                                                    }
                                                    else
                                                    {
                                                        $verified="danger";  
                                                        $function="approve";
                                                        $icon="glyphicon glyphicon-ok";

                                                    }


                                                }
                                                else{
                                                    $file="letter";
                                                    if ($row["document_verify"]!="") {
                                                        $verified="success"; 
                                                        $function="";  
                                                        $icon="glyphicon glyphicon-ok-sign";  
                                                    }
                                                    else
                                                    {
                                                        $verified="danger";  
                                                        $function="approve";
                                                        $icon="glyphicon glyphicon-ok";

                                                    }
                                                }
                                              echo "<tr class='' id='".$row['id']."'><td><button onclick='$function(".$row['id'].")' class='btn btn-$verified btn-sm'><span class='success $icon'></span></button></td><td>".$row['id']."</td><td>".$row['name']."</td><td class='text-center'><a target='_blank' href='//static.ecell-iitkgp.org/ges2015/reg/resume/".$row['id']."'><span class='glyphicon glyphicon-pencil'></span></a></td><td class='text-center'><a target='_blank' href='//static.ecell-iitkgp.org/ges2015/reg/$file/".$row['id']."'><span class='glyphicon glyphicon-pencil'></span></a></td><td>".$row['gender']."</td><td>".$row['designation']."</td><td>".$row['city']."</td><td>".$row['college']."</td><td style='disply:none'>".$row['mobile']."</td><td style='disply:none'>".$row['email']."</td><td style='disply:none'>".$row['n1']."</td><td style='disply:none'>".$row['c1']."</td><td style='disply:none'>".$row['n2']."</td><td style='disply:none'>".$row['c2']."</td><td style='disply:none'>".$row['stage']."</td><td style='disply:none'>".$row['arr_timestamp']."</td><td style='disply:none'>".$row['dep_timestamp']."</td><td style='disply:none'>".$row['ticket']."</td><td style='disply:none'>".$row['acco']."</td><td style='disply:none'>".$row['payment_type']."</td><td style='disply:none'>".$row['payment_reciept']."</td><td style='disply:none'>".$row['payment_verified']."</td><td style='disply:none'>".$row['timestamp']."</td>";
                                                $count=$count+1;
                                                }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>

                                    </tfoot>
                                </table>
                            </div>


                            <!-- /.table-responsive 
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->





                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="//cdn.datatables.net/tabletools/2.2.1/js/dataTables.tableTools.min.js"></script>
    <script src="//cdn.datatables.net/colvis/1.1.0/js/dataTables.colVis.min.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    var table,dialog;

    $(document).ready(function() {

        //$('#dataTables-example tr').css('cursor', 'pointer');


        $(document).ready(function() {
        // Setup - add a text input to each footer cell
            table2=$('#dataTables-example').DataTable({
                
                "aoColumns": [
                  null,
                  null,
                  null,
                  null,
                  null,
                  { "bVisible": false },
                  null,
                  null,
                  { "bVisible": false },
                  { "bVisible": false },
                  null,
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                  { "bVisible": false },
                ],
                "dom": 'TC<"clear">lfrtip',
                "tableToolsp": {
                    "sSwfPath": "admin/swf/copy_csv_xls_pdf.swf"
                },
                "oTableTools": {
                    "aButtons": [
                        {
                    "sExtends": "pdf",
                    "mColumns": "visible"
                        },
                        {
                    "sExtends": "csv",
                    "mColumns": "visible"
                        },
                        {
                    "sExtends": "print",
                    "mColumns": "visible"
                        },
                        {
                    "sExtends": "copy",
                    "mColumns": "visible"
                        }
                    ]
                }
            });

            // Apply the filter
            $("#dataTables-example tfoot input").on( 'keyup change', function () {
                table
                    .column( $(this).parent().index()+':visible' )
                    .search( this.value )
                    .draw();
            });
            $('*[placeholder="Search Profile"]').css('visibility','hidden');
            $('.ColVis_MasterButton').css('margin-left','4px');
        });
        approve=function(id){
            var jqxhr = $.post( "verify.php",{
                field:"<?php if ($finance==true) echo "payment_verified"; else echo "document_verify"; ?>",
                value:"verified",
                id:id
            })
              .done(function(data) {
                //$("#"+id).addClass("success");
                $("#"+id).children().eq(0).children().removeClass("btn-danger").addClass("btn-success");
                $("#"+id).children().eq(0).children().children().removeClass("glyphicon-ok").addClass("glyphicon-ok-sign");
                //alert(data);
              });
        }



        $('#dataTables-example tbody').delegate("tr","click",function(){
            //showModal(this.getAttribute('id'));
        })
    });




    </script>
    <style type="text/css">
        .morris-hover{position:absolute;z-index:1000;}
    </style>
</body>

</html>
