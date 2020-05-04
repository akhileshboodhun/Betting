<?php include('../../global/serverconnectionafterlogin.php'); ?>
</label>
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
    
    <a href="javascript:void(0);" class="remove_button fa fa-trash-o"></a></div>