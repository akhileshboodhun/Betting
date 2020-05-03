<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material race-add-form" action="../../backend/admin/addrace.php"  method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Race Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Silicon Valley" name="race_name"  class="resetfield form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date</label>
                                    <div class="col-md-12">
                                    <input type="date" name="date_time" class="resetfield" placeholder="Date" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Distance (in Meters)</label>
                                    <div class="col-md-12">
                                    <input type="text" placeholder="1000" name="distance"  class="resetfield form-control form-control-line"> </div>
                                </div>
                                <div class="field_wrapper">
                                        <div class="form-group">
                                            <label class="col-sm-12">Horse + Jockey</label>
                                            <div class="col-sm-6">
                                                <select name="select_horses[]"  class="resetfield form-control form-control-line">
                                                <option value="">Select Horse</option>
                                                    <?php  
                                                        $list = $conn->prepare("select * from horse order by horse_id asc");
                                                        $list->execute();
                                                        while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                                            echo "<option value=\"" . $row_list['horse_id'] ."\">"  . $row_list['horse_name'] . "</option>" ;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="select_jockeys[]"  class="resetfield form-control form-control-line">
                                                <option value="">Select Jockey</option>
                                                    <?php  
                                                        $list = $conn->prepare("select * from jockey order by jockey_id asc");
                                                        $list->execute();
                                                        while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                                            echo "<option value=\"" . $row_list['jockey_id'] ."\">"  . $row_list['jockey_name'] . "</option>" ;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="add_button fa fa-plus-square" title="Add field"></a>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="submit" class="race-add-btn btn btn-success" value="Add Race to database">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>




 