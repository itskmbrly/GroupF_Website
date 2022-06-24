<?php
    include_once("connection.php");
    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];

        //FETCHING THE USER'S NAME AND ROLE
        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        $fetchInfo = mysqli_fetch_assoc($userInfo);
        $fname = $fetchInfo["first_name"];
        $lname = $fetchInfo["last_name"];
        $id   = $fetchInfo["id"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare</title>
</head>
<body>

    <?php include_once("navbar.php"); ?>
    <div class='container p-5 my-5 border bg-white'>
        <h4 style='text-align:center' class="lblTitle">A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
        <h2 class="gmorning lblGM">Good Morning, <?php echo $fname; ?>!</h2>
        <h5 class="lblWelc">Welcome to JentleKare.</h5>
    </div>
    <!-- TABLE - LIST OF APPOINTMENTS -->      
    <div class='container mt-3'>
        <h2 class="lbllistofAppt">List of Appointments</h2>           
        <table class='table' id='listOfAppointments'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Date & Time</th>
                    <th>Decline</th>
                </tr>
            </thead>
            <?php
                //FETCHING ALL THE DATA INSIDE THE TABLE SERVICES
                $execGetAppointments = mysqli_query($con, "SELECT * FROM tbl_transactions WHERE kraftsman_id = '$id' ORDER BY date");

                while($listOfAppointments = mysqli_fetch_assoc($execGetAppointments)){
                    $appointmentID = $listOfAppointments["id"];
                    $klientID      = $listOfAppointments["klient_id"];
                    $servName      = "`".$listOfAppointments["service"]."`";
                    $date          = $listOfAppointments["date"];
                    $time          = $listOfAppointments["time"];
                    
                    $selectKlient = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$klientID'");
                    $fetchKlient  = mysqli_fetch_assoc($selectKlient);
                    $fname        = $fetchKlient["first_name"];
                    $lname        = $fetchKlient["last_name"];
                    $address      = $fetchKlient["address"];
                    $email        = $fetchKlient["email"];

                    $selectAddress = mysqli_query($con, "SELECT * FROM tbl_address WHERE id = '$address'");
                    $fetchAddress  = mysqli_fetch_assoc($selectAddress);
                    $address       = $fetchAddress["address"];
                    $barangay      = $fetchAddress["barangay"];
                    $city          = $fetchAddress["city"];
                    $province      = $fetchAddress["province"];
                    $zip           = $fetchAddress["zip"];
                    
                    echo"
                        <tbody>
                            <tr>
                                <td>$lname, $fname</td>
                                <td>$address $barangay $city $province $zip</td>
                                <td>$email</td>
                                <td>".str_replace('`', '', $servName)."</td>
                                <td>$date $time</td>
                                <td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#myModal2' onclick='javascript: declineService(".$appointmentID.", ".$fname.", ".$lname.")'>Delete</button></td>
                            </tr>        
                        </tbody>
                    ";
                }
            ?>     
        </table>
    </div>
    <!-- The Modal - Decline Appointment -->
    <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title delete-service-modal-header"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <h4>Are you sure you want to decline this service?</h4>
            <form action="handle_decline_appointment.php" method="POST">
                <textarea name="inputReason" id="inpReason" cols="30" rows="10"></textarea>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class='btn btn-success'><a class="delete-service-modal-link" href="">Yes</a></button>
            <button class='btn btn-danger'><a href='index.php'>No</a></button>
        </div>

        </div>
    </div>
    </div>
</body>
<!-- <script>
    function declineService(id, fname, lname)
    {
        var p = document.getElementsByClassName("delete-service-modal-header");
        p[0].innerHTML = "Decline - "+ fname + lname;
        var c = document.getElementsByClassName("delete-service-modal-link");
        c[0].setAttribute('href', 'handle_service_decline.php?id='+id);
    }
</script> -->
</html>