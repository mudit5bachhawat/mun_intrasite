
                    <?php 
						session_start();
							include_once('connectDB.php');
							//if (is_logon()==1) header('Location: main_eb.php');
							//elseif (is_logon()==2) header('Location: main_ip.php');
							//elseif (is_logon()==0) header('Location: login.php');

                            $result = mysqli_query($db_connection,"SELECT * FROM tbl_message WHERE message_from='".$_SESSION['user_name']."' OR message_to='".$_SESSION['user_name']."' ORDER BY time_stamp DESC");
                            while($row = mysqli_fetch_array($result))
                                {
									if ($row['verify']=="1") {
                        ?>
                        <tr>
                            <td>
                                <img class="pull-right" src="res/flags/<?php if ($row['message_from']==$_SESSION['user_name']) echo $row['message_from']; else echo $row['message_from'];  ?>.jpg " alt="<?php echo $row['message_from'];  ?>" width="80">
                                <br>
                            </td>
                            <td>
                                <p style="word-break:break-all;"><?php echo $row['message']; ?></p>
                                <small><?php if ($row['message_from']==$_SESSION['user_name']) echo "Sent to ".$row['message_to']; else echo "Sent from ".$row['message_from'];  ?>.                    
                                Approved
                                </small>
                            </td>
                        </tr>        
                        <?php
									}}
                        ?>    
					

                              

						