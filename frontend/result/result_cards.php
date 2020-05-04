<div class="col-sm-3">
    <div class="card card-block">
        <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Suffolk_Downs_horse_racing.JPG/220px-Suffolk_Downs_horse_racing.JPG" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;"></img>
        <div class="card-block">
            <h4 class="card-title"><?php echo $racename; ?></h4>
            <a class="card-text">Date: <?php echo $racedate; ?></a>
            <button class=" bet-button btn btn-primary modal-trigger float-right" data-toggle="modal" data-target="#modal<?php echo $raceid; ?>">View Details</button>
        </div>
    </div>
</div>