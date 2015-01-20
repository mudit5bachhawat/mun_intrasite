<?php
session_name("admin");
session_start();

if (!isset($_SESSION['email'])) header("Location: index.php");
include_once('inc/db.php');
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/png">
    <link rel="shortcut icon" href="../favicon.ico" type="image/ico">

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include_once("inc/navbar.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Statistics
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">No Action</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>City</th>
                                                    <th>Number of Registration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $query="SELECT city,count(*) FROM ".TBL_REG." GROUP BY city ORDER BY city ASC";
                                                    $result=mysqli_query($db_connection,$query);
                                                    $count=0;
                                                    if (!$result) {
                                                        die(mysqli_error($db_connection));
                                                    }
                                                    while($row = mysqli_fetch_array($result)) 
                                                    {
                                                      echo "<tr><td>".$row['city']."</td><td>".$row['count(*)']."</td></tr>";
                                                        $count=$count+$row['count(*)'];
                                                        }
                                                ?>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                                
                            </div>
                            <div class="col-lg-8">
                                <div id="morris-bar-chart"></div>
                                <div id="morris-donut-chart"></div>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
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

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/dashboard-demo.php"></script>
    <script>
            /*$('.table').dataTable({
                paging: false
            });        
            $('#DataTables_Table_0_wrapper .row').eq(0).children().eq(0).html("<label><b>Total no of registrations: <?= $count ?></b></label>")
                                                <?php 
                                                    /*$query="SELECT field3,count(*) FROM ".TBL_REG." GROUP BY field3 ORDER BY field3 ASC";
                                                    $result=mysqli_query($db_connection,$query);
                                                    $count=0;
                                                    $data['5']=0;
                                                    if (!$result) {
                                                        die(mysqli_error($db_connection));
                                                    }
                                                    while($row = mysqli_fetch_array($result)) 
                                                    {
                                                        $data[$row['field3']]=$row['count(*)'];
                                                        $count=$count+1;
                                                    }*/
                                                ?>
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Science",
                    value: <?= $data['Science'] ?>
                }, {
                    label: "Arts",
                    value: <?php if ($data['Arts']=='') echo "0"; else echo $data['Arts']; ?>
                }, {
                    label: "Commerce",
                    value: <?= $data['Commerce'] ?>
                }, {
                    label: "Other",
                    value: <?= $data['Other'] ?>
                }, {
                    label: "Engineering",
                    value: <?= $data['Engineering'] ?>
                }, {
                    label: "Management",
                    value: <?= $data['Management'] ?>
                }],
                resize: true
            });

            getDetails=function(column,value){
                
            };*/

    </script>
</body>

</html>
