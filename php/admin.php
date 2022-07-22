<div class="container p-3 my-3 banner text-white">
    <h2>Good Day, <?php echo $fname; ?>!</h2>
    <h3>Welcome to JentleKare.</h3>
    <i>A platform for all your beauty needs.</i>
</div>
<div class="container" style="margin-top: 40px;">
    <h2 style="text-align:center;">List of Services Offered</h2>           
    <table class='table' id='listOfServ'>
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
            //FETCHING ALL THE DATA INSIDE THE TABLE SERVICES
            $execGetServices = mysqli_query($con, "SELECT * FROM tbl_services ORDER BY service_name");

            while($listOfServices = mysqli_fetch_assoc($execGetServices)){
                $service_id2 = $listOfServices["id"];
                $servName    = "`".$listOfServices["service_name"]."`";
                $category    = $listOfServices["category_id"];
                
                if($category == 1){
                  $category = "Hair Services";
                } else if($category == 2){
                  $category = "Nail Services";
                } else if($category == 3){
                  $category = "Spa Services";
                }

                echo"
                    <tbody>
                        <tr>
                            <td>".str_replace('`', '', $servName)."</td>
                            <td>$category</td>
                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal1' onclick='javascript: editService(".$service_id2.", ".$servName.")'>Edit</button></td>
                            <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal2' onclick='javascript: deleteService(".$service_id2.", ".$servName.")'>Delete</button></td>
                        </tr>        
                    </tbody>
                ";
            }
        ?>     
    </table>
  <!-- The Modal - Edit Service -->
    <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="handle-service-edit.php" method="POST" class="service-edit-modal needs-validation" novalidate>
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title edit-service-modal-header"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group fg">
                            <input type="text" name="serviceName" placeholder="Enter service name"  class="form-control" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group fg">
                            <select name="inputCategory"  class="custom-select" required>
                            <option value="" disabled selected hidden>Choose a Category</option>
                                <?php echo $categories; ?>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" value="Update" class="edit-service-modal-link">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The Modal - Delete Service -->
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title delete-service-modal-header"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Are you sure you want to delete this service?</h4>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class='btn btn-success'><a class="delete-service-modal-link" href="">Yes</a></button>
                    <button class='btn btn-danger'><a href='index.php'>No</a></button>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function deleteService(id, name){
        var p = document.getElementsByClassName("delete-service-modal-header");
        p[0].innerHTML = "Delete - "+name;
        var c = document.getElementsByClassName("delete-service-modal-link");
        c[0].setAttribute('href', 'handle-service-delete.php?id='+id);
    }
    function editService(id, name){
        var p = document.getElementsByClassName("edit-service-modal-header");
        p[0].innerHTML = "Edit - "+name;
        var c = document.getElementsByClassName("service-edit-modal");
        c[0].setAttribute('action', 'handle-service-edit.php?id='+id);
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