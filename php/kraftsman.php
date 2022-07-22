<?php 
    include_once("connection.php"); 
    $services = '';
    $categories = '';
    $pictures = '';

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];

        //FETCHING THE USER'S NAME AND ROLE
        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        $fetchInfo = mysqli_fetch_assoc($userInfo);
        $fname = $fetchInfo["first_name"];
        $lname = $fetchInfo["last_name"];
        $verified = $fetchInfo["verified"];
        $id   = $fetchInfo["id"];

        //SELECT QUERY - TBL_CATEGORIES
        $selectQuery1  = mysqli_query($con, "SELECT * FROM tbl_category");
        while($row1 = mysqli_fetch_assoc($selectQuery1)){
            $categories .= "<option value='" . $row1["id"] . "'>" . $row1["category"] . "</option>";
        }

        //once the user chose a category, a drop down list of services will appear from the specific category id  
        $servQuery = mysqli_query($con, "SELECT * FROM tbl_services");
        while($row2 = mysqli_fetch_assoc($servQuery)){
            $services .= "<option value='". $row2["id"] ."' class='services-options cat-" . $row2["category_id"] . "' id='" . $row2["id"] . "'>" . $row2["service_name"] . "</option>";
        }

        $fetchPictures = mysqli_query($con, "SELECT * FROM tbl_pictures");
        while($row3 = mysqli_fetch_assoc($fetchPictures)){
            $pictures .= "<option class='picture-options cat-" . $row3["category_id"] . "' id='" . $row3["id"] . "'>" . $row3["picture"] . "</option>";
        }
  } 
?>
<div class="k-container">
    <!--Banner-->
    <div class="container p-3 my-3 banner text-white">
        <h2>Good Day, <?php echo $fname; ?>!</h2>
        <h3>Welcome to JentleKare.</h3>
        <i>A platform for all your beauty needs.</i>
    </div>
    <?php 
        $disabled=  "disabled='disabled'";
        if($verified){
            $disabled = '';
        }
    ?>
    <button type="button" class="btn btn-add-serv" data-toggle="modal" data-target="#myModal" <?php echo $disabled; ?> >
        Add Service
    </button>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Add Service</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="handle-kraft-add-service.php" method="POST" class="needs-validation" novalidate>
                        <div class="form-group fg">
                            <select name="inputCategory" id="cat-slct" class="custom-select" required onchange="catShow(value)">
                                <option value="" disabled selected hidden>Choose a Category</option>
                                <?php echo $categories; ?>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group fg" style="display:none;" id="select-services">
                            <select name="inputService" id="serv-slct" class="custom-select" required >
                                <option value="" disabled selected hidden>Choose a Service</option>
                                <?php echo $services; ?>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group fg" style="display:none;" id="select-picture">
                            <select name="inputServPic" id="serv-pic" class="custom-select" required onchange="picShow(value)">
                                <option value="" disabled selected hidden>Choose a Picture</option>
                                <?php echo $pictures; ?>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group fg">
                            <div class="picture-box">
                                <img src="../images/open-box.png" alt="Default Image" id="img">
                            </div>
                        </div>
                        <div class="form-group fg">
                            <input type="number" name="inputPrice" id="inputPrice" class="form-control" required placeholder="Enter Price">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
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

    holder = 0;
    function catShow(value){
        if(value != ""){
            let selected_category = document.getElementById("cat-slct");
            let service_blank = document.getElementById("serv-slct");
            let serv_pic_blank = document.getElementById("serv-pic");
            let services = document.getElementById("select-services");
            let picture = document.getElementById("select-picture");
            let serv_pic_img = document.getElementById("img");
            services.style.display = "block";
            picture.style.display = "block";
            
            // hide all services
            var services2 = document.getElementsByClassName('services-options');
            for(var i = 0; i < services2.length; i++){
                services2[i].style.display = "none";
            }

            var services3 = document.getElementsByClassName('cat-'+ value);
            for(var i = 0; i < services3.length; i++){
                services3[i].style.display = "block";
            }

            var serv_pic2 = document.getElementsByClassName('picture-options');
            for(var i = 0; i < serv_pic2.length; i++){
                serv_pic2[i].style.display = "none";
            }

            var serv_pic3 = document.getElementsByClassName('cat-'+ value);
            for(var i = 0; i < serv_pic3.length; i++){
                serv_pic3[i].style.display = "block";
            }

            service_blank.value = "";
            serv_pic_blank.value = "";
            holder = value;
            serv_pic_img.style.display = "flex";
            serv_pic_img.src = "../images/open-box.png";
        }
    }
    function picShow(value){
        if(value != ""){
            let serv_pic = document.getElementById("serv-pic");
            let serv_pic_img = document.getElementById("img");
            if(holder == 1){
                dir = "hair";
            } else if(holder == 2){
                dir = "nail";
            } else if(holder == 3){
                dir = "spa";
            } serv_pic_img.src = "../images/"+dir+"/"+value+".png";
        }
    }
</script>