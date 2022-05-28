<div class='container p-5 my-5 border bg-white'>
    <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
    <h2>Good Morning, <?php echo $fname; ?>!</h2>
    <h5>Welcome to JentleKare.</h5>
</div>
<!--BUTTONS-->
<div class='container-fluid mt-3'>
    <h1>View As Administrator</h1>
    <p>Administrator has all the access regarding on creating, retrieving, updating, and deleting of services and users.</p>
    <div class='row'>
        <div class='col-sm-3 p-3'><button type='button'class='btn btn-Admin'><a href='#listOfServ'>List of Services</a></button></div>
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin'><a href='#listOfUsers'>List of Users</a></button></div>
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin'><a href='#createServ'>Create Service</a></button></div>
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin'><a href='#createUser'>Create User</a></button></div>
    </div>
</div>
<!-- TABLE - LIST OF SERVICES -->      
<div class='container mt-3 bg2'>
    <h2>List of Services Offered</h2>           
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
                $category    = $listOfServices["category"];

                echo"
                    <tbody>
                        <tr>
                            <td>".str_replace('`', '', $servName)."</td>
                            <td>$category</td>
                            <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal1'>Edit</button></td>
                            <td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#myModal2' onclick='javascript: deleteService(".$service_id2.", ".$servName.")'>Delete</button></td>
                        </tr>        
                    </tbody>
                ";
            }
        ?>     
    </table>
</div>
<!-- The Modal - Edit Service -->
<div class="modal fade" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit - <?php echo $service_name; ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="handle_service_edit.php" method="POST">
            <input type="text" name="serviceName" placeholder="Enter service name">
            <select name="inputCategory">
                <option value="" disabled selected hidden>Choose a Category</option>
                <?php echo $categories; ?>
            </select>
            <input type="submit" value="Edit Service">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class='btn btn-success'><a href='handle_user_delete.php?id=$user_id'>Yes</a></button>
        <button class='btn btn-danger'><a href='index.php'>No</a></button>
      </div>

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
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
<!--CREATE NEW CATEGORY & SERVICE-->
<div class="row" id="createServ">
  <div class="col-sm-4 bg1">
    <h1>Create New Category</h1>
    <form action="handle_add_category.php" method="POST">
        <input type="text" id="fname" name="category" placeholder="Enter a Category">
        <input type="submit" value="Add Service">
    </form>
  </div>
  <div class="col-sm-8 bg2">
    <h1>Create New Service</h1>
    <form action="handle_add_service.php" method="POST">
        <input type="text" name="serviceName" placeholder="Enter service name">
        <select name="inputCategory">
            <option value="" disabled selected hidden>Choose a Category</option>
            <?php echo $categories; ?>
        </select>
        <input type="submit" value="Add Service">
    </form>
  </div>
</div>
<!-- TABLE - LIST OF USERS -->
<div class='container mt-3 bg2'>
    <h2>List of Users</h2>           
    <table class='table' id='listOfUsers'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Role</th>
                <th>Verified</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
            //FETCHING ALL THE DATA INSIDE THE TABLE USERS
            $execGetUsers = mysqli_query($con, "SELECT * FROM tbl_users ORDER BY last_name");

            while($listOfUsers = mysqli_fetch_assoc($execGetUsers)){
                $user_id  = $listOfUsers["id"];
                $fname    = $listOfUsers["first_name"];
                $lname    = $listOfUsers["last_name"];
                $email    = $listOfUsers["email"];
                $mobile_no= $listOfUsers["mobile_no"];
                $role_id  = $listOfUsers["role_id"];
                $verified = $listOfUsers["verified"];

                if($role_id == 1){
                    $role_id = "Kraftsman";
                } else if($role_id == 2){
                    $role_id = "Klient";
                } else if($role_id == 3){
                    $role_id = "Admin";
                } else if($role_id == 4){
                    $role_id = "Moderator";
                }


                if($verified == 0){
                    $verified = "No";
                } else{
                    $verified = "Yes";
                }

                echo"
                    <tbody>
                        <tr>
                            <td>$lname, $fname</td>
                            <td>$email</td>
                            <td>$mobile_no</td>
                            <td>$role_id</td>
                            <td>$verified</td>
                            <td><button type='button' class='btn btn-primary'><a  href='profile_page.php?id=$user_id'>Edit</a></button></td>
                            <td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#myModal3'>Delete</button></td>
                        </tr>        
                    </tbody>
                ";
            }
        ?>
    </table>
</div>
<!-- The Modal - Delete User -->
<div class="modal fade" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete - <?php echo $lname, $fname; ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h4>Are you sure you want to delete this user?</h4>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class='btn btn-success'><a href='handle_user_delete.php?id=$user_id'>Yes</a></button>
        <button class='btn btn-danger'><a href='index.php'>No</a></button>
      </div>

    </div>
  </div>
</div>
<!-- FORM FOR CREATING A USER -->
<div id="createUser" class="bg2">
    <h1>Create a User</h1>
    <?php 
        include_once("registration.php");
    ?>
</div>
                
<script>
    function deleteService(id, name)
    {
        var p = document.getElementsByClassName("delete-service-modal-header");
        p[0].innerHTML = "Delete - "+name;
        var c = document.getElementsByClassName("delete-service-modal-link");
        c[0].setAttribute('href', 'handle_service_delete.php?id='+id);
    }
</script>