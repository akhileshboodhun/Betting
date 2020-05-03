<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Horse</th>
                        <th scope="col">Jockey</th>
                        <th scope="col">Stable</th>
                        <th scope="col">Odds</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
include ('../../global/serverconnectionafterlogin.php');
     $stmt = $conn->prepare("SELECT * FROM vw_specific_race_info WHERE race_id = $raceid
                            ");
                                        $stmt->execute();
                                        while ($row_stmt = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo "<tr>
                                            <td>" . $row_stmt['horse_id'] . "</td>
                                            <td>" . $row_stmt['horse_name'] . "</td>
                                            <td>" . $row_stmt['jockey_name'] . "</td>
                                            <td>" . $row_stmt['stable_name'] . "</td>
                                            <td>" . $row_stmt['odds'] . "</td>
                                            <td><button type=\"submit\" class=\"btn\">BET</button> </td>
                                            </tr>
                                            ";
                                        }
                                        ?>
                    </tbody>
</table>