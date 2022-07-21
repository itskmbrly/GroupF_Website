<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--CSS FILE-->
    <link rel="stylesheet" href="../css/style.css">    
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/icon/JK.png">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ranga&display=swap" rel="stylesheet">
    <title>Jentle Kare</title>
</head>
<body>
    <?php include_once("navbar.php"); ?>
    <div class="right">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>

        <div class="w3-container moderator-container">
            <!--Banner-->
            <div class="container p-3 my-3 banner text-white">
                <h2>Good Day, <?php echo $fname; ?>!</h2>
                <h3>Welcome to JentleKare.</h3>
                <i>A platform for all your beauty needs.</i>
            </div>
            <!--Button for List Users-->
              <button type="button" class="btnForVerification" data-toggle="modal" data-target="#myModal1">Verify Users</button>
            <!--Button for Declined Appointments-->
            <button type="button" class="btnForDeclinedAppointments" data-toggle="modal" data-target="#myModal2">Declined Appointments</button>
        
            <!-- The Modal 1-->
            <div class="modal fade" id="myModal1">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">List of Users</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <table class='table' id='listOfUsers'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Accept</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                    //FETCHING ALL THE DATA INSIDE THE TABLE USERS
                                    $execGetUsers = mysqli_query($con, "SELECT * FROM tbl_users WHERE verified = 0 ORDER BY created_at ASC");

                                    while($listOfUsers = mysqli_fetch_assoc($execGetUsers)){
                                        $user_id  = $listOfUsers["id"];
                                        $k_fname    = "`".$listOfUsers["first_name"]."`";
                                        $k_lname    = "`".$listOfUsers["last_name"]."`";
                                        $k_email    = $listOfUsers["email"];
                                        $k_role_id  = $listOfUsers["role_id"];

                                        if($k_role_id == 1){
                                            $k_role_id = "Kraftsman";
                                        } else if($k_role_id == 2){
                                            $k_role_id = "Klient";
                                        } else if($k_role_id == 3){
                                            $k_role_id = "Admin";
                                        } else if($k_role_id == 4){
                                            $k_role_id = "Moderator";
                                        }

                                        echo"
                                            <tbody>
                                                <tr>
                                                    <td>".str_replace('`', '', $k_lname).", ".str_replace('`', '', $k_fname)."</td>
                                                    <td>$k_email</td>
                                                    <td>$k_role_id</td>
                                                    <td><a href='views.php>id=$user_id' target='_blank'>Open Credential</a></td>
                                                    <td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal3' onclick='javascript: acceptUser(".$user_id.", ".$k_lname.", ".$k_fname.")'>Accept</button></td>
                                                </tr>        
                                            </tbody>
                                        ";
                                    }
                                ?>
                            </table>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- The Modal 2-->
            <div class="modal fade" id="myModal2">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Declined Appointments</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <table class='table' id='listOfUsers'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Service Name</th>
                                    </tr>
                                </thead>
                                <?php
                                    //FETCHING ALL THE DECLINED APPOINTMENTS AND IT'S REASON
                                    $declinedQuery = mysqli_query($con, "SELECT * FROM tbl_declinedappointments");
                                    while($fetchDeclined = mysqli_fetch_assoc($declinedQuery)){
                                        $f_id = $fetchDeclined["id"];
                                        $f_transaction_id = $fetchDeclined["transaction_id"];
                                        $f_reason = $fetchDeclined["reason"];

                                        //FETCH USER INFORMATION OF KRAFTSMAN ID
                                        $queryTransaction = mysqli_query($con, "SELECT * FROM tb_transactions WHERE id= '$f_transaction_id'");
                                        $fetchTransactionInfo = mysqli_fetch_assoc($queryTransaction);
                                        $f_kraftsman_id = $fetchTransactionInfo["kraftsman_id"];
                                        $f_service_id = $fetchTransactionInfo["service_id"];
                                        
                                        //FETCH USER INFORMATION OF KRAFTSMAN ID
                                        $queryKraftsman = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$f_kraftsman_id'");
                                        $fetchKraftsman = mysqli_fetch_assoc($queryKraftsman);
                                        $fk_fname = $fetchKraftsman["first_name"];
                                        $fk_lname = $fetchKraftsman["last_name"];

                                        //FETCH SERVICE NAME OF SERVICE ID
                                        $queryService = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE id = '$f_service_id'");
                                        $fetchServiceId = mysqli_fetch_assoc($queryService);
                                        $fsn_service_id = $fetchKraftsman["service_id"];

                                        $queryServiceName = mysqli_query($con, "SELECT * FROM tbl_services WHERE id = '$fsn_service_id'");
                                        $fetchServiceName = mysqli_fetch_Assoc($queryServiceName);
                                        $fsn_service_name = $fetchServiceName["service_name"];

                                        echo"
                                            <tbody>
                                                <tr>
                                                    <td>".str_replace('`', '', $fk_lname).", ".str_replace('`', '', $fk_fname)."</td>
                                                    <td>$fsn_service_name</td>
                                                    <td><button type='button' class='btn btn-primary data-toggle='modal' data-target='#myModal4' onclick='javascript: open(".$f_id.", ".$f_transaction_id.", ".$fk_lname.", ".$fk_fname.", ".$fsn_service_name.", ".$f_reason.")'>Open</button></td>
                                                </tr>        
                                            </tbody>
                                        ";
                                    }
                                ?>
                            </table>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- The Modal 3-->
            <div class="modal fade" id="myModal3">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title accept-user-modal-header"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            Are you sure you want to accept the credentials of this user?
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class='btn btn-success'><a class="accept-user-modal-link" href=''>Yes</a></button>
                            <button class='btn btn-danger'><a href='moderator.php'>No</a></button>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- The Modal 4-->
            <div class="modal fade" id="myModal4">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title accept-dcapp-modal-header"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="accept-dcapp-modal-body-content-header"></div>
                            <div class="accept-dcapp-modal-body-content"></div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class='btn btn-success'><a class="accept-dcapp-modal-link accept-dcapp-modal-link2" href=''>Yes</a></button>
                            <button class='btn btn-danger'><a href='moderator.php'>No</a></button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
  </div>
</body>
<script>
    function acceptUser(id, lname, fname){
        var p = document.getElementsByClassName("accept-user-modal-header");
        p[0].innerHTML = "Accept - "+ lname + ", " + fname;
        var c = document.getElementsByClassName("accept-user-modal-link");
        c[0].setAttribute('href', 'handle-user-accept.php?id='+id);
    }

    function open(id, transaction_id, lname, fname, service, reason){
        var a = document.getElementsByClassName("accept-dcapp-modal-header");
        a[0].innerHTML = "Kraftsman: "+ lname + ", " + fname;
        var b = document.getElementsByClassName("accept-dcapp-modal-link");
        b[0].setAttribute('href', 'handle-accept-dcapp.php?id='+id);
        var c = document.getElementsByClassName("accept-dcapp-modal-body-content-header");
        c[0].innerHTML = "Service: "+ service;
        var d = document.getElementsByClassName("accept-dcapp-modal-body-content");
        d[0].innerHTML = "Reason: "+ reason;
        var e = document.getElementsByClassName("accept-dcapp-modal-link2");
        e[0].setAttribute('href', 'handle-accept-dcapp.php?t_id='+transaction_id);
    }
</script>
</html>