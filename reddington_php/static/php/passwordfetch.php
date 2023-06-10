<?php
include('../connection/conn.php');
 $u = " ";

// fetch query
function fetch_data($connection, $unames){
  $query = " SELECT  `username`,`password` FROM `accounts`";
  // Store the query results in result
  $result = mysqli_query($connection, $query);
  // $found = mysqli_fetch_assoc($result);
  // get the num of rows
  $row = mysqli_num_rows($result);
  // Check if the row arrays not empty 
  $byte = array();
        while ($row = mysqli_fetch_assoc($result)) {
                // if more tha one value in list
                $unames = $row['username'];
                $pwords = $row['password'];
                // echo $pwords;
                array_push($byte, [$unames,$pwords]);
        }
        // echo(print_r($byte));
      // header("Content-Type: application/json");
  echo json_encode($byte,JSON_PRETTY_PRINT);
      // echo(print_r($byte));
  }
fetch_data($conn, $u)

?>