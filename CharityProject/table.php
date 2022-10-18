<?php
include("volounteers.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>
            <th>ID</th>
            <th>FIO</th>
            <th>Teleplhone Number</th>
            <th>Arrival location</th>
            <th>Target Destination</th>
            <th>Car Description</th>
            <th>Capacity</th>
            <th>Booked</th>
            <th>Date and time of departure</th>    
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['FIO']??''; ?></td>
      <td><?php echo $data['Telephone number']??''; ?></td>
      <td><?php echo $data['Arrival location']??''; ?></td>
      <td><?php echo $data['Target destination']??''; ?></td>
      <td><?php echo $data['Car description']??''; ?></td>
      <td><?php echo $data['Capacity']??''; ?></td>
      <td><?php echo $data['Booked']??''; ?></td>
      <td><?php echo $data['Date and time of departure']??''; ?></td>    
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="9">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>