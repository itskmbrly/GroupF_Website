<div class="feedback-section">
    <center>
        <form action="handleFeedback.php" method="POST">
            <div class="form-group">
            <textarea class="form-control" rows="5" cols="15" id="comment" name="text" placeholder="Write your feedback here"></textarea>
            </div>
            <input type="submit" class="btnFeedback" value="Submit">
        </form>
    </center>

    <div class="shown-feedbacks">
        <?php
            //FETCH ALL COMMENTS FROM A CERTAIN SERVICE
            $selectQuery = mysqli_query($con, "SELECT * FROM tbl_feedbacks WHERE kraftsman_id = '$service_id'");
            $serviceInformation = mysqli_fetch_assoc($selectQuery);
            $userFeedbackId = $serviceInformation["klient_id"];
            $feedback = $serviceInformation["feedback"];
            $created_at = $serviceInformation["created_at"];

            //FETCH KLIENT INFORMATION
            $selectQuery2 = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$userFeedbackId'");
            $userInformation - mysqli_fetch_assoc($selectQuery2);
            $fname = $userInformation["first_name"];
            $lname = $userInformation["last_name"];
            $dp = $userInformation["profile_picture"];

            echo'
                <div class="media border p-3">
                    <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h4>'; echo $fname . " " . $lname; echo'<small><i>Posted on'; echo $created_at; echo'</i></small></h4>
                        <p>'; echo $feedback; echo'</p>      
                    </div>
                </div>
            ';
        ?>
    </div>
</div>