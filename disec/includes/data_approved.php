                    <?php 
							session_start();
							include_once('connectDB.php');
							if ((is_logon()==3)||(is_logon()==0)||(is_logon()==1)) die("<h1>You dont have access</h1>");
					?>
					
						<table class="table">
					<?php
                            $result = mysqli_query($db_connection,"SELECT * FROM tbl_message ORDER BY time_stamp DESC");
                            while($row = mysqli_fetch_array($result))
                                {
                        ?>
							<tr>
                            <td class="col-md-2">
                                <button class="btn btn-success btn-block" onclick="approve_message('<?php echo $row['index'];  ?>',1)">Allow</button>
                                <button class="btn btn-danger btn-block" onclick="approve_message('<?php echo $row['index'];  ?>',0)">Reject</button>
                            </td>
                            <td>
                                <p  style="word-break:break-all;"><?php echo $row['message']; ?></p>
                                <small><?php echo 'Sent from '.$row['message_from'].' to '.$row['message_to']; ?>.</small>
                            </td>
                        </tr>
                        
						<?php
									}
                        ?>    
						<table>