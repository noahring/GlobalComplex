<!DOCTYPE html>
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
     
         $query = "SELECT requestID, speciesName FROM requests";
         
         $result = $conn->query($query);
         //var_dump($result);
         //echo "reached";
     
         resultToHTMLTable($result);
    ?>
</html>
