<?php include('../../global/serverconnectionafterlogin.php'); ?>
</label>
    <div class="col-sm-12">
        <select name="select_horses[]" class="resetfield form-control form-control-line">
        <option value="">Select Horse</option>
            <?php  
                $list = $conn->prepare("select * from horse order by horse_id asc");
                $list->execute();
                while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                    echo "<option value=\"" . $row_list['horse_id'] ."\">"  . $row_list['horse_name'] . "</option>" ;
            ?>
        </select>
        <a href="javascript:void(0);" class="remove_button fa fa-trash-o"></a></div>
    </div>