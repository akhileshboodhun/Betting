<?php session_start();
include('../../global/serverconnectionafterlogin.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../plugins/images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../../css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style2.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../../css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php include('admin_nav.php');
include('../../global/serverconnectionafterlogin.php'); ?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <div class="add_race">
                        <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modal1"></a>
                        <?php include('add_race_modal.php'); ?>
                    </div>
                    <h3 class="box-title">Total Races</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">
                                <?php $query = "SELECT count(*) as count from race ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                foreach ($counts as $count) {
                                }
                                echo $count['count'];
                                ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <div class="add_horse">
                        <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modal2"></a>
                        <?php include('add_horse_modal.php'); ?>
                    </div>
                    <h3 class="box-title">Total Horses</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">
                                <?php $query = "SELECT count(*) as count from horse ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                foreach ($counts as $count) {
                                }
                                echo $count['count'];
                                ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <div class="add_result">
                        <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modalAddResult"></a>
                        <?php include('add_result_modal.php'); ?>
                    </div>
                    <h3 class="box-title">Results</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">
                                <?php  $query = "SELECT count(*) as count from results ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                ?>
                            </span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.row -->
        <!--row -->
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <div class="add_jockey">
                        <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modalAddJockey"></a>
                        <?php include('add_jockey_modal.php'); ?>
                    </div>
                    <h3 class="box-title">Total Jockeys</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">
                                <?php $query = "SELECT count(*) as count from jockey  ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                foreach ($counts as $count) {
                                }
                                echo $count['count'];
                                ?>
                            </span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <div class="add_owner">
                        <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modalAddOwner"></a>
                        <?php include('add_owner_modal.php'); ?>
                    </div>
                    <h3 class="box-title">Owners</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">
                                <?php $query = "SELECT count(*) as count from horse_owner  ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                foreach ($counts as $count) {
                                }
                                echo $count['count'];
                                ?>
                            </span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <div class="add_stable">
                        <a href="#" class="modal-trigger fa fa-plus-square" data-toggle="modal" data-target="#modalAddStable"></a>
                        <?php include('add_stable_modal.php'); ?>
                    </div>
                    <h3 class="box-title">Stables</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">
                                <?php $query = "SELECT count(*) as count from stable  ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                foreach ($counts as $count) {
                                }
                                echo $count['count'];
                                ?>
                            </span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.row -->
        <!--row -->
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Bets</h3>                  
                    <div id="ct-visits" style="height: 405px;"></div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Race DEtails</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $profilequery = "SELECT * from vw_specific_race_info";
                                $selection = $conn->prepare($profilequery);
                                $selection->execute();
                                $details = $selection->fetchAll();
                                foreach ($details as $detail) {                               
                                echo "   <tr>";
                                echo "                                    <td>" . $detail['race_id'] . "</td>";
                                echo "                                    <td class=\"txt-oflo\">" . $detail['horse_name'] . "<td>";
                                echo "                                    <td>" . $detail['stable_name'] . "</td>";
                                echo "                                    <td class=\"txt-oflo\">" . $detail['jockey_name'] . "</td>";
                                echo "                                    <td><span class=\"text-info\">" . $detail['odds'] . "</span> </td>";
                                echo "                                </tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
        <span id="dummy"></span>

    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="../../js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="../../js/waves.js"></script>
<!--Counter js -->
<script src="../../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="../../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!-- chartist chart -->
<script src="../../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="../../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../../js/custom.min.js"></script>
<script src="../../js/dashboard1.js"></script>
<script src="../../js/new_chart.js"></script>
<script src="../../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script src="../../js/add_universal_form.js"></script>
<!--<script src="../../js/number_spinner.js"></script>-->
<script src="../../js/dynamic_textfields.js"></script>
<!--<script src="../../js/pristine.js"></script>-->
<!--<script src="../../js/pristine-apply.js"></script>-->
<script src="../../js/result_dynamic_add.js"></script>
</body>

</html>