<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Horse No.</th>
                        <th scope="col">Horse</th>
                        <th scope="col">Jockey</th>
                        <th scope="col">Stable</th>
                        <th scope="col">Odds</th>
                        <th scope="col">Bet</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
include ('../../global/serverconnectionafterlogin.php');
     $stmt = $conn->prepare("SELECT h.horse_id, h.horse_name, h.horse_dob, s.stable_name, d.odds
                             FROM horse h JOIN horse_race d JOIN race r JOIN stable s
                             WHERE r.race_id = $raceid AND d.horse_id = h.horse_id AND h.stable_id = s.stable_id AND r.race_id = d.race_id
                             
                            ");
                                        $stmt->execute();
                                        while ($row_stmt = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo "<tr>
                                                    <td>" . $row_stmt['horse_id'] . "</td>
                                                    <td>" . $row_stmt['horse_name'] . "</td>
                                                    <td>" . $row_stmt['horse_dob'] . "</td>
                                                    <td>" . $row_stmt['stable_name'] . "</td>
                                                    <td>" . $row_stmt['odds'] . "</td>
                                                    <td><button class=\"btn\">BET</button> </td>
                                                    </tr>
                                                    ";
                                        }
                                        ?>
                    </tbody>
                </table>





                




