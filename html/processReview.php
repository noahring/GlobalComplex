<!-- Should make add selected requests to the transaction table with the checkout 
with the checkout date set to tomorrow and the specimen id set to the first specimen
of the desired species -->
<html>

<?php
    $query = "SELECT * FROM requests";


    
    $result = $conn->query($query);
    var_dump($_POST);
?>
</html>