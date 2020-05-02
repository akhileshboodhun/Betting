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
                        <h4 class="page-title">View All Horses in database</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro

                        </a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">View All Horses in database</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Total: </h3>
                            <!-- <p class="text-muted"> <code>.table</code></p>-->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Horse Name</th>
                                            <th>Date of Birth</th>
                                            <th>Horse Weight</th>
                                            <th>Stable</th>
                                            <th>Owner</th>
                                            
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
                                <div class="add_horse">ADD Horse
                                    <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modal2"></a>
                                    <?php include('add_horse_modal.php'); ?>
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
</body>

</html>
