<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material race-add-form" action="../../backend/admin/addjockey.php"  method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Jockey Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Silicon Valley" name="jockey_name"  class="resetfield form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">DOB</label>
                                    <div class="col-md-12">
                                    <input type="date" name="jockey_dob" class="resetfield" placeholder="Date" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Weight</label>
                                    <div class="col-md-12">
                                    <input type="text" placeholder="50" name="jockey_weight"  class="resetfield form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="submit" class="jockey-add-btn btn btn-success" value="Register New Jockey">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>