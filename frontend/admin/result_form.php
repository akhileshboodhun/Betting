<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material result-add-form" action="../../backend/result/payout.php"  method="POST">
                                <div class="form-group" id="select_race">
                                    <label class="col-sm-12">SELECT RACE TO SET RESULT </label>
                                    <div class="col-sm-12">
                                        <select  name="race_id"  class="resetfield form-control form-control-line ">
                                                <option value="">Select Race</option>
                                                <?php  
                                                        $list = $conn->prepare("SELECT DISTINCT race_id, race_name FROM vw_create_result");
                                                        $list->execute();
                                                        while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                                        echo "<option value=\"" . $row_list['race_id'] ."\">"  . $row_list['race_name'] . "</option>" ;
                                                        
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                 
                                <div class="result_wrapper">
                                        <div class="form-group">
                                        <label class="col-sm-12">RANK#</label>
                                                <div class="col-sm-12">
                                                        <select  name="select_horses2[]" class="resetfield form-control form-control-line">
                                                                <option value="">participant</option>
                                                                <?php  
                                                                        $list = $conn->prepare("SELECT * FROM vw_create_result WHERE race_id = 796547");
                                                                        $list->execute();
                                                                        while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                                                        echo "<option value=\"" . $row_list['horse_id'] ."\">"  . $row_list['horse_name'] . "-" . $row_list['jockey_name'] . "</option>" ;
                                                                ?>
                                                        </select>
                                                </div>
                                        </div>
                                        <a href="javascript:void(0);" class="add_button fa fa-plus-square" title="Add field"></a>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="submit" class="race-add-btn btn btn-success" value="SET RESULT">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>

