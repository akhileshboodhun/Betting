  <?php
    session_start();
    include('../../global/serverconnectionafterlogin.php');
    $username = $_SESSION['user_name'];
    $profilequery = "SELECT * from user where user_name='$username'";
    $selection = $conn->prepare($profilequery);
    $selection->execute();
    $users = $selection->fetchAll();
foreach ($users as $user) {        
}
    echo $user['user_name'];


     
                                $query = "SELECT count(*) as count from race ";
                                $selection = $conn->prepare($query);
                                $selection->execute();
                                $counts = $selection->fetchAll();
                                foreach ($counts as $count) {
                                }
                                echo $count['count'];
                                ?>