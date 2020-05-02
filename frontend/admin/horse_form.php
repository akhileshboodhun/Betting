<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material horse-add-form" action="../../backend/admin/addhorse.php"  method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Horse Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Kishan" name="horse_name" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Horse Date of Birth</label>
                                    <div class="col-md-12">
                                    <input type="date" name="horse_dob" placeholder="Date Of Birth" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Horse Weight</label>
                                    <div class="col-md-12">
                                        <input type="number" min="200" max="1000" step="10" placeholder="500" name="horse_weight" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Stable </label>
                                    <div class="col-sm-12">
                                        <select  name="stable_id" class="form-control form-control-line">
                                        <option value="">Select Stable</option>
                                        <?php  
                                            $list = $conn->prepare("select * from stable order by stable_id asc");
                                            $list->execute();
                                            while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                    echo "<option value=\"" . $row_list['stable_id'] ."\">"  . $row_list['stable_name'] . "</option>" ;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Owner </label>
                                    <div class="col-sm-12">
                                        <select  name="owner_id" class="form-control form-control-line">
                                        <option value="">Select Stable</option>
                                        <?php  
                                            $list = $conn->prepare("select * from owner order by owner_name asc");
                                            $list->execute();
                                            while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                    echo "<option value=\"" . $row_list['owner_id'] ."\">"  . $row_list['owner_name'] . "</option>" ;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" class="horse-add-btn btn btn-success" value="Add Horse to database">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>