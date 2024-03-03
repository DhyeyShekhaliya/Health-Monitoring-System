<?php
  require("config.php");
  if(!empty($_GET))
  {
    $irValue = $_GET['ir'];
    $time = date('h:i a');
    $date = date('d-m-Y');
    $query = mysqli_query($connection,"INSERT INTO data1(ir_data,time,date) VALUES('$irValue','$time','$date')");

    if($query)
    {
        echo "Saved!";
    }

    else
    {
        echo "Error!";
    }
  }
?> 