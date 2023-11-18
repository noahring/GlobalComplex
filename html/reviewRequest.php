<!DOCTYPE html>
<html>
    <?php
         error_reporting(E_ALL);
         ini_set('display_errors', 1);
     
         $config = parse_ini_file('home/mysql.ini');
         $conn = new mysqli(
             $config['mysqli.default_host'],
             $config['mysqli.default_user'],
             $config['mysqli.default_pw']);
     
         if ($conn->connect_errno) {
             echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
             exit();
         }
     
         $conn->select_db('bugs');
     
         $query = "SELECT * FROM requests";
         $result = $conn->query($query);
     
         resultToReviewTable($request);
    ?>
</html>
