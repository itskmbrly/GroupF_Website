<?php
    if($_SESSION["sess-role"] == 1 && (isset($_SESSION["sess-id"]))){
        $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_transactions WHERE kraftsman_id = '$sessId' ORDER BY created_at ASC");
    } else{
        $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_transactions ORDER BY created_at ASC");
    }
    echo'
        <table class="table">
            <thead>
                <tr>';
                    if($_SESSION["sess-role"] == 1){
                        echo"<th>Klient Name</th>";
                    } else if($_SESSION["sess-role"] == 2){
                        echo"<th>Kraftsman Name</th>";
                    } echo'
                    <th>Service</th>
                    <th>Date</th>';
                    if($_SESSION["sess-role"] == 1){
                    echo "<th>Address</th>";
                    }
                    echo '<th>Status</th>';
                    if($_SESSION["sess-role"] == 1){
                        echo "<th>&nbsp;</th>";
                    }
                echo '</tr>
            </thead>
            <tbody>
    ';
    while($fetchServices = mysqli_fetch_assoc($execQuery1)){
        $transac_id = $fetchServices["id"];
        $kraftsman_id = $fetchServices["kraftsman_id"];
        $klient_id = $fetchServices["klient_id"];
        $s_id = $fetchServices["service_id"];
        $s_date = $fetchServices["date"];
        $s_time = $fetchServices["time"];
        $status = $fetchServices["status"];

        $status_name = 'Waiting for Approval';
        if($status == 1){
            $status_name = "Approved";
        } else if($status == 2){
            $status_name = "Declined";
        }

        // GET TIME
        $timeQuery = mysqli_query($con, "SELECT * FROM tbl_time WHERE id = '$s_time'");
        $fetchAppointmentInfo2 = mysqli_fetch_assoc($timeQuery);
        $time = $fetchAppointmentInfo2["time"];

        //SELECT QUERY FOR SERVICE APPOINTED
        $appointmentQuery = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE service_id = '$s_id'");
        $fetchAppointmentInfo = mysqli_fetch_assoc($appointmentQuery);
        $s_id2 = $fetchAppointmentInfo["service_id"];

        $appointmentQuery2 = mysqli_query($con, "SELECT * FROM tbl_services WHERE id = '$s_id2'");
        $fetchAppointmentInfo2 = mysqli_fetch_assoc($appointmentQuery2);
        $service_name = $fetchAppointmentInfo2["service_name"];
        
        //SELECT QUERY FOR KLIENT
        $klientQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$klient_id'");
        $fetchKlientInfo = mysqli_fetch_assoc($klientQuery);
        $klient_fname = $fetchKlientInfo["first_name"];
        $klient_lname = $fetchKlientInfo["last_name"];
        $klient_address_id =$fetchKlientInfo["address_id"];

        //SELECT QUERY FOR ADDRESS
        $addressQuery = mysqli_query($con, "SELECT * FROM tbl_address WHERE id = '$klient_address_id'");
        $fetchAddress = mysqli_fetch_assoc($addressQuery);
        $a_address = $fetchAddress["address"];
        $a_barangay = $fetchAddress["barangay"];
        $a_city = $fetchAddress["city"];
        $a_province = $fetchAddress["province"];
        $a_zip = $fetchAddress["zip"];
    

        //SELECT QUERY FOR KRAFTSMAN
        $kraftsmanQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$kraftsman_id'");
        $fetchKraftsmanInfo = mysqli_fetch_assoc($kraftsmanQuery);
        $kraftsman_fname = $fetchKraftsmanInfo["first_name"];
        $kraftsman_lname = $fetchKraftsmanInfo["last_name"];
        $fullname = $lname.' '.$fname;
        echo'
                <tr>';
                    if($_SESSION["sess-role"] == 1){
                        echo"<td>" . $klient_fname . " " . $klient_lname; "</td>";
                    } else if($_SESSION["sess-role"] == 2){
                        echo"<td>" . $kraftsman_fname . " " . $kraftsman_lname; "</td>";
                    } 
                    echo'<td>'; echo $service_name; echo'</td>
                    <td>'; echo $s_date . " @" . $time; echo'</td>';

                    if($_SESSION["sess-role"] == 1){
                        echo"<td>" ; echo $a_address . " " . $a_barangay . " ". $a_city . " " . $a_province . " " . $a_zip; "</td>";
                    } 
                    echo'
                    <td>'; echo $status_name; 
                    if($_SESSION["sess-role"] == 1 && $status == 0){
                        echo"
                            <td style='width: 190px;'>
                                <button type='button' class='btn btn-success' onclick='javascript: confirmAppointment(".$transac_id.")'>Accept</button>
                                <button type='button' value='".$transac_id."' name=\"".$fullname."\" class='btn btn-danger declineBtn' data-toggle='modal' data-target='#myModal1'>Decline</button>
                            </td>
                        ";
                    } else{
                        echo"
                            <td style='width: 190px;'>&nbsp;</td>
                        ";
                    } echo'
                </tr>
        ';
    }
    echo'
        </tbody>
    </table>';
?>

<!-- The Modal - Decline Appointment -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title decline-user-modal-header"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="handle-appointment-decline.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <input type="hidden" name="id" id="kraftsman_id">
                        <textarea class="form-control" rows="5" cols="15" id="comment" name="reason" placeholder="Write your reason here" required></textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="submit" class='btn btn-success'><a class="decline-appointment-modal-link" href=''>Yes</a></button>
                    <button class='btn btn-danger'><a href='appointments.php'>No</a></button>
                </form>
            </div>

        </div>
    </div>
</div> 

<script>
    $(document).ready(function(){
        $(document).on('click', '.declineBtn', function(){
            document.getElementById("kraftsman_id").value = this.value;
            var p = document.getElementsByClassName("decline-user-modal-header");
            p[0].innerHTML = "Decline - "+ this.name;
            var c = document.getElementsByClassName("decline-appointment-modal-link");
            c[0].setAttribute('href', 'handle-appointment-decline.php?id='+this.value);
        });
    });

    function confirmAppointment(id)
    {
        location.href='handle-appointment-accept.php?id='+id;
    }

    function declineAppointment(id, lname, fname){
        
    }

    // Disable form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>
