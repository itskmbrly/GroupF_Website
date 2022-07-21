<div class="feedback-section">
    <center>
        <form action="handle-feedback.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <textarea class="form-control" rows="5" cols="15" id="comment" name="feeedback" placeholder="Write your feedback here" required></textarea>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <input type="submit" class="btnFeedback" value="Submit">
            <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
        </form>
    </center>

    <div class="shown-feedbacks">
        <?php
            //FETCH ALL COMMENTS FROM A CERTAIN SERVICE
            $selectQuery2 = mysqli_query($con, "SELECT * FROM tbl_feedbacks WHERE kraftsman_id = '$service_id'");
            while($serviceInformation = mysqli_fetch_assoc($selectQuery2)){
                $userFeedbackId = $serviceInformation["klient_id"];
                $feedback = $serviceInformation["feedback"];
                $feedback_created_at = $serviceInformation["created_at"];

                //FETCH KLIENT INFORMATION
                $selectQuery3 = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$userFeedbackId'");
                $userInformation - mysqli_fetch_assoc($selectQuery3);
                $feedback_fname = $userInformation["first_name"];
                $feedback_lname = $userInformation["last_name"];
                $feedback_dp = $userInformation["profile_picture"];

                echo'
                    <div class="media border p-3">';
                        if($feedback_dp == 'user.png'){
                            echo"<img src='..uploads/display_picture/$feedback_dp'>";
                        } else{
                            echo'
                                <img src="../uploads/display_picture/'; echo $userFeedbackId . "/" . $feedback_dp; echo'" alt="Display Picture" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            ';
                        } echo'
                        <div class="media-body">
                            <h4>'; echo $feedback_fname . " " . $feedback_lname; echo'<small><i>Posted on'; echo $feedback_created_at; echo'</i></small></h4>
                            <p>'; echo $feedback; echo'</p>      
                        </div>
                    </div>
                ';
            }
            
        ?>
    </div>
</div>
<script>
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