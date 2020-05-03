<?php include('../../global/serverconnectionafterlogin.php'); ?>

<p class="text-muted ">Select Date 
                                <select  name="racedatetime" class="form-control form-control-line">
                                        <option value="">Select Date</option>
                                        <?php  
                                            $list = $conn->prepare("select date_time from race order by date_time asc");
                                            $list->execute();
                                            while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                    echo "<option value=\"" . $row_list['date_time'] ."\">"  . $row_list['date_time'] . "</option>" ;
                                            ?>
                                </select>
                                <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Search</a>
                            </p>