<?php
    session_start();

    if (!isset($_SESSION['email'])) header("Location: index.php");
    include_once('inc/db.php');

    if (!isset($_GET['id']))
        exit();

    $id=trim($_GET['id']); 
       
    if (isset($_GET['update']))
    {
        $data=$_POST['data'];
        $data['A']=mysqli_real_escape_string($db_connection,$data['A']);
        $data['B']=mysqli_real_escape_string($db_connection,$data['B']);
        $data['C']=mysqli_real_escape_string($db_connection,$data['C']);
        $data['D']=mysqli_real_escape_string($db_connection,$data['D']);
        $data['by']=mysqli_real_escape_string($db_connection,$data['by']);
        $data['selected']=mysqli_real_escape_string($db_connection,$data['selected']);
        $data['comment']=mysqli_real_escape_string($db_connection,$data['comment']);

        $query = "UPDATE cap SET `a` = '".$data['A']."', `b` = '".$data['B']."', `c` = '".$data['C']."', `d` = '".$data['D']."', `by` ='".$data['by']."', `comment` ='".$data['comment']."', `selected` ='".$data['selected']."' WHERE id= ".$id;
        $result=mysqli_query($db_connection,$query);
        echo $result;
        exit();
    }

    if (isset($_GET['remove']))
    {

        $query = "INSERT INTO cap_removed\n"
        . " SELECT *\n"
        . " FROM cap\n"
        . " WHERE cap.id=".$_GET['id'].";\n";
        $query2= " DELETE FROM cap\n"
        . " WHERE cap.id=".$_GET['id'].";\n"
        . "";

        $result=mysqli_query($db_connection,$query);
        $result=$result+mysqli_query($db_connection,$query2);
        echo $result;
        exit();
    }





?>



<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Selection</title>
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
    #page-wrapper
    {
        margin-left: 0px!important;
        padding: 0px;
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <?php /*include_once('inc/navbar.php');*/ ?>
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-bodya">
                            
                            <div class="modala fadea" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialoga">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Database</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-6">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> Name:</span> <strong id="display-name" class="text-info">-</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> City:</span> <strong id="display-city" class="text-info">-</strong>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-6">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> Mobile:</span> <strong id="display-mobile" class="text-info">-</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> College:</span> <strong id="display-college" class="text-info col-md-8" style="padding-left:0px">-</strong>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-6">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> Department:</span> <strong id="display-dep" class="text-info col-md-8" style="padding-left:0px">-</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> Year:</span> <strong id="display-year" class="text-info">-</strong>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <span class="col-md-2"><i class="fa fa-arrow-right"></i> Email:</span> <strong id="display-email" class="text-info">-</strong>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <span class="col-md-2"><i class="fa fa-arrow-right"></i> Brief Info:</span> <strong id="display-info" class="text-info col-md-10" style="padding-left:0px">-</strong>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <span class="col-md-4"><i class="fa fa-arrow-right"></i> Socially Active:</span> <strong id="display-social" class="text-info">-</strong>
                                        </div>
                                    </div>

                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <p><i class="fa fa-arrow-right"></i> What do you understand by Entrepreneurship?</p>
                                            <p><strong id="display-q1" class="text-info">-</strong></p>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <p><i class="fa fa-arrow-right"></i> Describe the Entrepreneurial Ecosystem of your City?</p>
                                            <p><strong id="display-q2" class="text-info">-</strong></p>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <p><i class="fa fa-arrow-right"></i> Given a chance to replace an Entrepreneur, whom would you replace and why?</p>
                                            <p><strong id="display-q3" class="text-info">-</strong></p>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <p><i class="fa fa-arrow-right"></i> Are you interested in opening up a start-up? If yes, do you have an Idea to work upon?</p>
                                            <p><strong id="display-q4" class="text-info">-</strong></p>
                                        </div>
                                    </div>
                                    <div class="row padding-bottom-10">
                                        <div class="col-md-12">
                                            <p><i class="fa fa-arrow-right"></i> Past Achievements</p>
                                            <p><strong id="display-q5" class="text-info">-</strong></p>
                                        </div>
                                    </div>

                                  <hr>
                                  <form class="form" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" for="A" style="padding-top: 7px;">Communication Skills</label>
                                        <div class="col-sm-2">
                                          <input name="A" class="form-control" type="text" id="A" placeholder="Marks" default="0">   
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" for="B" style="padding-top: 7px;">Funda</label>
                                        <div class="col-sm-2">
                                          <input name="B" class="form-control" type="text" id="B" placeholder="Marks" default="0">   
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" for="C" style="padding-top: 7px;">Convincing Skills</label>
                                        <div class="col-sm-2">
                                          <input name="C" class="form-control" type="text" id="C" placeholder="Marks" default="0">   
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label" for="D" style="padding-top: 7px;">College activities Funda</label>
                                        <div class="col-sm-2">
                                          <input name="D" class="form-control" type="text" id="D" placeholder="Marks" default="0">   
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="intBy" style="padding-top: 7px;">Interviewed By</label>
                                        <div class="col-sm-4">
                                          <input name="" class="form-control" type="text" id="intBy" placeholder="Name of Senior Manager " >   
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="comment" style="padding-top: 7px;">Comments</label>
                                        <div class="col-sm-4">
                                          <input name="" class="form-control" type="text" id="comment" placeholder="Comments " >   
                                        </div>
                                    </div>
                                  </form>


                                    <br>

                                    <div class="form-group">
                                        <br>
                                      <label class="col-sm-2 control-label" for="social">Selected:</label>
                                      <div class="col-sm-9">

                                        <div class="radio">
                                          <label>
                                            <input id="yes" type="radio" name="selected" value="Yes">
                                            Yes
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input id="no" type="radio" name="selected" value="No">
                                            No
                                          </label>
                                        </div>

                                      </div>
                                    </div>
                                    <br>
                                  </div>


                                  <div class="modal-footer">





                                    <button type="button" class="btn btn-primary" onclick="updateInfo();">Update</button>
                                    <button type="button" class="btn btn-primary" onclick="removeEntry();"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;Remove</button>
                                  </div>
                                </div>
                              </div>
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
    var data;

    updateInfo=function(){
        data={};

        data.A=$('#A').val();
        data.B=$('#B').val();
        data.C=$('#C').val();
        data.D=$('#D').val();
        data.comment=$('#comment').val();
        data.by=$('#intBy').val();
        data.selected=$("input[name=selected]:checked").val();
      $.post(window.location.href+"&update=",
      {
        data:data
      },
      function(resp,status){
        resp=(resp.trim());
        if (Number(resp)==1) 
            {
                alert('Info Updated Successfully ')
            };

      });
    };
    removeEntry=function(){
      $.post(window.location.href+"&remove=",
      {
        data:"Hello"
      },
      function(resp,status){
        resp=(resp.trim());
        if (Number(resp)==2) 
            {
                alert('Entry Removed !!');
                window.close();
            }
        else alert("Error !!");

      });
    };

    $(document).ready(function() {
                                                    <?php 
                                                        $query="SELECT * FROM cap WHERE id='".$id."' ORDER BY timestamp ASC";

                                                        $result=mysqli_query($db_connection,$query);
                                                        $count=1;
                                                        if (!$result) {
                                                            die(mysqli_error($db_connection));
                                                        }
                                                        $row = mysqli_fetch_array($result);
                                                        
                                                          /* "<tr id='".$row['id']."'><td><span class='label label-success pointer' onclick='showModal(".$row['id'].")'>View</span></td><td>".$row['name']."</td><td>".$row['city']."</td><td>".$row['college']."</td><td>".$row['year']."</td><td>".$row['email']."</td><td style='disply:none'>".$row['mobile']."</td></td><td style='disply:none'>".$row['bio']."</td></td><td style='disply:none'>".$row['social']."</td></td><td style='disply:none'>".$row['q1']."</td></td><td style='disply:none'>".$row['q2']."</td></td><td style='disply:none'>".$row['q3']."</td></td><td style='disply:none'>".$row['q4']."</td></td><td style='disply:none'>".$row['q5']."</td><td style='disply:none'>".$row['department']."</td><td style='disply:none'>".$row['DATE_ADD(timestamp,INTERVAL 45000 MINUTE_SECOND)']."</td>";*/
                                                        
                                                    ?>

			$('#display-name').html(<?= json_encode($row['name']) ?>);			
			$('#display-city').html(<?= json_encode($row['city']) ?>);			
			$('#display-college').html(<?= json_encode($row['college']) ?>);			
			$('#display-year').html(<?= json_encode($row['year']) ?>);			
			$('#display-email').html(<?= json_encode($row['email']) ?>);
			$('#display-mobile').html(<?= json_encode($row['mobile']) ?>);
			$('#display-info').html(<?= json_encode($row['bio']) ?>);
			$('#display-social').html(<?= json_encode($row['social']) ?>);
			$('#display-q1').html(<?= json_encode($row['q1']) ?>);
			$('#display-q2').html(<?= json_encode($row['q2']) ?>);
			$('#display-q3').html(<?= json_encode($row['q3']) ?>);
			$('#display-q4').html(<?= json_encode($row['q4']) ?>);
            $('#display-q5').html(<?= json_encode($row['q5']) ?>);
            $('#display-dep').html(<?= json_encode($row['department']) ?>);
            $('#A').val(<?= json_encode($row['a']) ?>);
            $('#B').val(<?= json_encode($row['b']) ?>);
            $('#C').val(<?= json_encode($row['c']) ?>);
            $('#D').val(<?= json_encode($row['d']) ?>);
            $('#intBy').val(<?= json_encode($row['by']) ?>);
            $('#comment').val(<?= json_encode($row['comment']) ?>);

			isSelected=(<?= json_encode($row['selected']) ?>);
            if (isSelected=="Yes")
                $('#yes').prop("checked",true);
            else if (isSelected=="No")
                $('#no').prop("checked",true);

    });
    </script>
    <style type="text/css">
        .morris-hover{position:absolute;z-index:1000;}
    </style>
</body>

</html>
