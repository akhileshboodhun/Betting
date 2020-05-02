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
                            <li class="active">Basic Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">View All Races in DB</h3>
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
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $stmt = $conn->prepare('SELECT h.horse_id, h.horse_name, h.horse_dob, h.horse_weight, s.stable_name
                                                                FROM horse h LEFT JOIN stable s
                                                                ON h.stable_id = s.stable_id
                                                             ');
                                        $stmt->execute();
                                        while ($row_stmt = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo "<tr>
                                                    <td>" . $row_stmt['horse_id'] . "</td>
                                                    <td>" . $row_stmt['horse_name'] . "</td>
                                                    <td>" . $row_stmt['horse_dob'] . "</td>
                                                    <td>" . $row_stmt['horse_weight'] . "</td>
                                                    <td>" . $row_stmt['stable_name'] . "</td>
                                                    
                                                    </tr>
                                                    ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
</body>

</html>
