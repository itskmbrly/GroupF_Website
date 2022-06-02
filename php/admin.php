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
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin' data-bs-toggle='modal' data-bs-target='#myModal4'><a href="#">Create Service</a></button></div>
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin' data-bs-toggle='modal' data-bs-target='#myModal5'><a href="#">Create User</a></button></div>
    </div>
</div>
<!-- TABLE - LIST OF SERVICES -->      
<div class='container mt-3'>
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
                            <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal1' onclick='javascript: editService(".$service_id2.", ".$servName.")'>Edit</button></td>
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
        <h4 class="modal-title edit-service-modal-header"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="handle_service_edit.php" method="POST" class="service-edit-modal">
            <input type="text" name="serviceName" placeholder="Enter service name">
            <select name="inputCategory">
                <option value="" disabled selected hidden>Choose a Category</option>
                <?php echo $categories; ?>
            </select>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" value="Update" class="edit-service-modal-link">
        </form>
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
<!-- The Modal - Create Category and Service -->
<div class="modal fade" id="myModal4">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New Category & Service</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="handle_add_category.php" method="POST">
          <div class="row">
            <div class="col">
              <input type="text" id="fname" name="category" placeholder="Create A New Category">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Add Category">
            </div>
          </div>
        </form>
        <br>
        <form action="handle_add_service.php" method="POST">
          <div class="row">
            <div class="col">
              <input type="text" name="serviceName" placeholder="Create A New Service">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <select name="inputCategory">
                <option value="" disabled selected hidden>Choose a Category</option>
                <?php echo $categories; ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Add Service">
            </div>
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- TABLE - LIST OF USERS -->
<div class='container mt-3'>
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
                $fname    = "`".$listOfUsers["first_name"]."`";
                $lname    = "`".$listOfUsers["last_name"]."`";
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
                            <td>".str_replace('`', '', $lname).", ".str_replace('`', '', $fname)."</td>
                            <td>$email</td>
                            <td>$mobile_no</td>
                            <td>$role_id</td>
                            <td>$verified</td>
                            <td><button type='button' class='btn btn-primary'><a  href='profile_page.php?id=$user_id'>Edit</a></button></td>
                            <td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#myModal3' onclick='javascript: deleteUser(".$user_id.", ".$lname.", ".$fname.")'>Delete</button></td>
                        </tr>        
                    </tbody>
                ";
            }
        ?>
    </table>
</div>
<!-- The Modal - Delete User -->
<div class="modal fade" id="myModal3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title delete-user-modal-header"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h4>Are you sure you want to delete this user?</h4>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class='btn btn-success'><a class="delete-user-modal-link" href=''>Yes</a></button>
        <button class='btn btn-danger'><a href='index.php'>No</a></button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal - Create A User -->
<div class="modal" id="myModal5">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create a User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php include_once("registration.php");?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>                
<script>
    function deleteService(id, name)
    {
        var p = document.getElementsByClassName("delete-service-modal-header");
        p[0].innerHTML = "Delete - "+name;
        var c = document.getElementsByClassName("delete-service-modal-link");
        c[0].setAttribute('href', 'handle_service_delete.php?id='+id);
    }
    function editService(id, name)
    {
        var p = document.getElementsByClassName("edit-service-modal-header");
        p[0].innerHTML = "Edit - "+name;
        var c = document.getElementsByClassName("service-edit-modal");
        c[0].setAttribute('action', 'handle_service_edit.php?id='+id);
    }
    function deleteUser(id, lname, fname)
    {
        var p = document.getElementsByClassName("delete-user-modal-header");
        p[0].innerHTML = "Edit - "+ lname + ", " + fname;
        var c = document.getElementsByClassName("delete-user-modal-link");
        c[0].setAttribute('href', 'handle_user_delete.php?id='+id);
    }
</script>