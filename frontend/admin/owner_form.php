<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material owner-add-form" action="../../backend/admin/addowner.php"  method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Owner Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Donald Trump" name="owner_name"  class="resetfield form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="submit" class="owner-add-btn btn btn-success" value="Register New Owner">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>