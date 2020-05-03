<input type="hidden" name="race_id" value="<?php echo $raceid;?>" >
<input type="hidden" name="horse_id" value="<?php echo $rs['horse_id'];?>" >
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" >
<input type="hidden" name="bet_odd" value="<?php echo $new_odds;?>" >
<input type="hidden" name="other_odd_inc" value="<?php echo $each_other_odds_inc;?>" >
<input type="hidden" class="bet-btn1" name="bet_amount" value="50" >
<td><input class="bet-btn2" type="number" name="bet_amount2" value="50" placeholder="amount" data-bts-button-down-class="btn btn-secondary" data-bts-button-up-class="btn btn-secondary" data-bts-min="50" data-bts-prefix="$"></td>
<script>
$('tr').on('change', '.bet-btn2', function(e){
        e.preventDefault();
        $($($(this).closest('tr')).find('.bet-btn1')).val( $(this).val()  );
    });
</script>