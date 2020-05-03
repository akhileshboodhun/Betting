<?php include('../../global/serverconnectionafterlogin.php'); ?>
<?php include('tables_head.php'); ?>
<?php include('admin_nav.php'); ?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Basic Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro

                        </a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">View All Races in DB</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Total:</h3>
                            <p class="text-muted ">Select Date 
                                <select  name="racedatetime" class="form-control form-control-line">
                                        <option value="">Select Date</option>
                                        <?php  
                                            $list = $conn->prepare("select date_time from race order by date_time asc");
                                            $list->execute();
                                            while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
                                    echo "<option value=\"" . $row_list['date_time'] ."\">"  . $row_list['date_time'] . "</option>" ;
                                            ?>
                                </select>
                                <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Search</a>
                            </p>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Race Name</>
                                            <th>Distance</th>
                                            <th>No of Horses</th>
                                            <th>#</th>
                                            <th>*</th>
                                            <th>£</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $stmt = $conn->prepare('SELECT race_name, distance, no_horses
                                                                FROM race 
                                                             ');
                                        $stmt->execute();
                                        while ($row_stmt = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo "<tr>
                                                    <td>" . $row_stmt['race_name'] . "</td>
                                                    <td>" . $row_stmt['distance'] . "</td>
                                                    <td>" . $row_stmt['no_horses'] . "</td>
                                                    <td><button class=\"btn\" data-toggle=\"modal\" data-target=\"#modal\">View Details</button> </td>
                                                    <td><button class=\"btn\">edit</button> </td>
                                                    <td><button class=\"btn\">del</button> </td>
                                                   
                                                    </tr>
                                                    ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="add_race">ADD RACE
                                    <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modal1"></a>
                                    <?php include('add_race_modal.php'); ?>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../../js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../js/custom.min.js"></script>
    <script src="../../js/add_universal_form.js"></script>
</body>

</html>
