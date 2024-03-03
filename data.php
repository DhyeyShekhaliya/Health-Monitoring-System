<?php
   require("config.php");
?>
<div class="container">
    <?php include("project-title.php"); ?>
    <h4 class="displaty-4 border-bottom">Heart Monitor</h4>


    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">hr Data</th>
      <th scope="col">Time</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $sr = 1;
       $query = mysqli_query($connection,"SELECT * FROM data1 ORDER BY id DESC");
       while($pr = mysqli_fetch_array($query))
       {
        ?>
       
    
    <tr>
      <th scope="row"><?php echo $sr++; ?></th>
      <td><?php echo $pr['ir_data']; ?></td>
      <td><?php echo $pr['time']; ?></td>
      <td><?php echo $pr['date']; ?></td>
      <td><a href="delete.php" class="btn btn-danger btn-sm">Delete</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>