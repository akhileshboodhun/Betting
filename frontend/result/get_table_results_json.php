
<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">No.</th>
                        <th scope="col">Horse</th>
                        <th scope="col">Jockey</th>
                        <th scope="col">Stable</th>
                        <th scope="col">Odds</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                                        $url = "http://localhost/betting/frontend/result/get_view_results_json.php?raceidjson=$raceid";
                                        //call api
                                        $json = file_get_contents($url);
                                        //convert json to array when true; else into object
                                        $row_stmt_json = json_decode($json, true);
                                        foreach($row_stmt_json as $rs){
                                            echo "
                                            <tr>
                                                <form action=\"../../backend/race/addbet.php\" method=\"POST\">
                                                    <td>#" . $rs['rank'] . "</td>
                                                    <td>" . $rs['horse_id'] . "</td>
                                                    <td>" . $rs['horse_name'] . "</td>
                                                    <td>" . $rs['jockey_name'] . "</td>
                                                    <td>" . $rs['stable_name'] . "</td>
                                                    <td>" . $rs['odds'] . "</td>
                                                    
                                                </form>

                                            </tr>
                                                    ";
                                        }
                                        ?>
                    </tbody>
</table>



