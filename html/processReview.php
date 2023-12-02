<!-- Should make add selected requests to the transaction table with the checkout 
with the checkout date set to tomorrow and the specimen id set to the first specimen
of the desired species -->
<html>

<?php
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
 
     include('resultToTransactionTable.php');
     $config = parse_ini_file('/home/'.get_current_user().'/mysqli.ini');
     $conn = new mysqli(
         $config['mysqli.default_host'],
         $config['mysqli.default_user'],
         $config['mysqli.default_pw']);
 
     if ($conn->connect_errno) {
         echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
         exit();
     }
 
     $conn->select_db('bugs');
     
    
    foreach($_POST as $key => $value){
        $query = "CALL convertRequest ({$key})";
        $result = $conn->query($query);
        //var_dump($result);
    }

    //show the table
    $query = "SELECT transactionID, clientFirstName, clientLastName, speciesName
                    FROM transactions 
                     INNER JOIN clients
                        ON transactions.clientID = clients.clientID
                     INNER JOIN specimens 
                        ON specimens.specimenID = transactions.specimenID
                     WHERE transactions.dateOut IS NULL;";
    $result = $conn->query($query);
    $numRows = $result->num_rows;
    $data = $result->fetch_all();


    $result = $conn->query($query);
    $unixtime = time();
    //echo $unixtime;
    for($i=0; $i< $numRows; $i++){
        //echo "reached";
         $id = $data[$i][0];
         //Svar_dump($_POST);
         foreach($_POST as $key => $value){
            if($key=="send".$id){
                echo "reached";
                $preparedUpdateStatement = "UPDATE transactions
                                               SET dateOut = (FROM_UNIXTIME({$unixtime}))
                                             WHERE transactionID =(?)";
                $updateStatementObject=$conn->prepare($preparedUpdateStatement);
                $updateStatementObject->bind_param("i", $id);
                $updateStatementObject->execute();
            }
        }
    }
    ?><h1>Unsent Transactions<h2>
    <?php
    resultToHTMLTable($result);

    $query = "SELECT transactionID, clientFirstName, clientLastName, speciesName, dateOut
                    FROM transactions 
                     INNER JOIN clients
                        ON transactions.clientID = clients.clientID
                     INNER JOIN specimens 
                        ON specimens.specimenID = transactions.specimenID
                     WHERE transactions.dateOut IS NOT NULL;";
    $result = $conn->query($query);
    resultToHTMLTable($result);

    
?>
</html>