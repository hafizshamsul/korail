<?php
 // Check for error
 if ($conn->query($sql) == false) {
 echo "ERROR: Could not able to execute $sql . " . $conn->error;
 }

 // Close connection
 $conn->close();
?>