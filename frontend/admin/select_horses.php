<?php include('../../global/serverconnectionafterlogin.php'); ?>
</label>
    <div class="col-sm-6">
        <select name="select_horses[]" class="resetfield form-control form-control-line">
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
    <a href="javascript:void(0);" class="remove_button fa fa-trash-o"></a></div>