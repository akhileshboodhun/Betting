<?php include('../../global/serverconnectionafterlogin.php'); ?>
<div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Race Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Silicon Valley" name="race_name" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date</label>
                                    <div class="col-md-12">
                                    <input type="date" name="race_date" placeholder="Date" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Distance (in Meters)</label>
                                    <div class="col-md-12">
                                    <input type="text" placeholder="1000" name="race_dist" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">No. of Horses </label>
                                    <div class="col-sm-12">
                                        <select name="numofhorse_race" class="form-control form-control-line">
                                            <option> 1</option>
                                            <option> 2</option>
                                            <option> 3</option>
                                            <option> 4</option>
                                            <option> 5</option>
                                            <option> 6</option>
                                            <option> 7</option>
                                            <option> 8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Add Race to database</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 </div>