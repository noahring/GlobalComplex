<!-- The ip address of my virtual machine 34.172.58.91-->
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function resultToHTMLTable($result){
        $data = $result->fetch_all();
        $numRows = $result->num_rows;
        //echo $numRows;
        $numColumns = $result->field_count;
        //echo $numColumns;
        $columnNames = $result->fetch_fields();
        ?>
        <form action = "processReview.php" method=POST>
            <table>
            <thead>
                <tr>
        <?php
        for($i=0; $i<$numColumns; $i++){ //get title row
                ?>
                <th>
                    <?php echo $columnNames[$i]->name; ?>
                </th>
            <?php
        }
        ?>
            <th>Delete?</th>
                </tr>
            </thead>
            <tbody>
        <?php
        for($j=0; $j<$numRows; $j+=1){ //make rows
                ?>
                <tr>
                    <?php
                    for($i=0; $i<$numColumns; $i++){ //put cells in rows
                        ?> 
                        <td><?php echo $data[$j][$i]; ?></td>
                        <?php
                    }
                    //var_dump($data);
                    $id = $data[$j][0];
                    ?>
                    <td>
                        <input type="checkbox"
                            name="checkbox<?php echo $id; ?>"
                            value=<?php echo $id; ?>
                            />
                    </td> 
                </tr>   
            <?php
        }
            ?>
            </tbody>
            </table>
            <input type ="submit" value ="Aprove selected Requests" method = POST/>
    </form>
        <?php
        return;
    }
?>
