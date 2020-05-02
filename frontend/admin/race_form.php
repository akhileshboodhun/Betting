<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material race-add-form" action="../../backend/admin/addrace.php"  method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Race Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Silicon Valley" name="race_name" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date</label>
                                    <div class="col-md-12">
                                    <input type="date" name="date_time" placeholder="Date" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Distance (in Meters)</label>
                                    <div class="col-md-12">
                                    <input type="text" placeholder="1000" name="distance" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">No. of Horses </label>
                                    <div class="col-sm-12">
                                        <select name="no_horses" class="form-control form-control-line">
                                            <option value="4"> 4</option>
                                            <option value="5"> 5</option>
                                            <option value="6"> 6</option>
                                            <option value="7"> 7</option>
                                            <option value="8"> 8</option>
                                            <option value="9"> 9</option>
                                            <option value="10"> 10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="submit" class="race-add-btn btn btn-success" value="Add Race to database">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>