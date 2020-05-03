<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material stable-add-form" action="../../backend/admin/addstable.php"  method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Stable Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Donald Trump" name="stable_name"  class="resetfield form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="submit" class="stable-add-btn btn btn-success" value="Add New Stable"> </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>