<?php
    // $sessId = $_SESSION["sess-id"]; 
    // if($_SESSION["sess-role"] == 1 && (isset($_SESSION["sess-id"]))){
    //     $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_transactions WHERE user_id = '$sessId' ORDER BY created_at ASC");
    // } else{
    //     $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_transactions ORDER BY created_at ASC");
    // }

    // while($fetchServices = mysqli_fetch_assoc($execQuery1)){
    //     $kraftsman_id = $fetchServices["kraftsman_id"];
    //     $klient_id = $fetchServices["klient_id"];
    //     $s_id = $fetchServices["service_id"];
    //     $status = $fetchServices["status"];

    //     echo'

    //     ';
    // }
?>

<!--CSS FOR TABLE APPOINTMENTS-->
<table class="table">
    <thead>
      <tr>
        <!--if klient role = kraftsman name; else klient name-->
        <th>Name</th> 
        <th>Service</th>
        <th>Place</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kimberly Edge</td>
        <td>Hair Cut</td>
        <td>Marikina City</td>
        <!--if kraftment role-->
        <td>Accept</td>
        <td>Decline</td>
      </tr>
      <tr>
        <td>Kimberly Edge</td>
        <td>Hair Cut</td>
        <td>Marikina City</td>
        <!--if kraftment role-->
        <td>Accept</td>
        <td>Decline</td>
      </tr>
      <tr>
        <td>Kimberly Edge</td>
        <td>Hair Cut</td>
        <td>Marikina City</td>
        <!--if kraftment role-->
        <td>Accept</td>
        <td>Decline</td>
      </tr>
    </tbody>
</table>