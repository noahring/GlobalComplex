<!-- Should make add selected requests to the transaction table with the checkout 
with the checkout date set to tomorrow and the specimen id set to the first specimen
of the desired species -->
<html>

<?php
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
 
     include('resultToReviewTable.php');
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
    }
    var_dump($result);
?>
</html>