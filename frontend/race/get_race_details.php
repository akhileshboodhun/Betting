<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Horse No.</th>
                        <th scope="col">Horse</th>
                        <th scope="col">Jockey</th>
                        <th scope="col">Odds</th>
                        <th scope="col">Stable</th>
                        <th scope="col">Bet</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
include ('../../global/serverconnectionafterlogin.php');
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
                                                    <td><button class=\"btn\">BET</button> </td>
                                                    </tr>
                                                    ";
                                        }
                                        ?>
                    </tbody>
                </table>





                




