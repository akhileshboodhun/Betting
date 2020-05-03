
<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Horse</th>
                        <th scope="col">Jockey</th>
                        <th scope="col">Stable</th>
                        <th scope="col">Odds</th>
                        <th scope="col">Amount</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
include ('../../global/serverconnectionafterlogin.php');
     $stmt = $conn->prepare("SELECT * FROM vw_specific_race_info WHERE race_id = $raceid
                            ");
                                        $stmt->execute();
                                        $row_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        $stmt = $conn->prepare("SELECT SUM(odds) AS sum_odds, race_id FROM vw_specific_race_info WHERE race_id = $raceid GROUP BY race_id");
                                        $stmt->execute();
                                        $s_odds = $stmt->fetch(PDO::FETCH_ASSOC);
                                        
                                        foreach($row_stmt as $rs){
                                            echo "
                                            <tr>
                                                <form action=\"../../backend/race/addbet.php\" method=\"POST\">
                                                    <td>" . $rs['horse_id'] . "</td>
                                                    <td>" . $rs['horse_name'] . "</td>
                                                    <td>" . $rs['horse_dob'] . "</td>
                                                    <td>" . $rs['stable_name'] . "</td>
                                                    <td>" . $rs['odds'] . "</td>";
                                                    include('calculate_odds.php');
                                                    include('hidden_fields.php');
                                                    
                                                   echo " <td><button type=\"submit\" class=\"btn bet-button\">BET</button> </td>
                                                </form>

                                            </tr>
                                                    ";
                                        }
                                        ?>
                    </tbody>
</table>



