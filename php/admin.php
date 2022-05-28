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
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin'><a href='#listOfUsers'>List of Users</a></div>
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin'><a href='#createServ'>Create Service</a></div>
        <div class='col-sm-3 p-3'><button type='button' class='btn btn-Admin'><a href='#createUser'>Create User</a></div>
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
                $id       = $listOfServices["id"];
                $servName = $listOfServices["service_name"];
                $category = $listOfServices["category"];

                echo"
                    <tbody>
                        <tr>
                            <td>$servName</td>
                            <td>$category</td>
                            <td><button type='button' class='btn btn-primary'><a  href='service_edit.php?id=$id'>Edit</a></button></td>
                            <td><button type='button' class='btn btn-danger'><a href='service_delete.php?id=$id'>Delete</a></button></td>
                        </tr>        
                    </tbody>
                ";
            }
        ?>     
    </table>
</div>
<!--CREATE NEW CATEGORY & SERVICE-->
<div class="row" id="createServ">
  <div class="col-sm-4 bg1">
    <h1>Create New Category</h1>
    <form action="handle_add_category.php" method="POST">
        <input type="text" id="fname" name="fname" placeholder="Enter a Category">
        <input type="submit" value="Add Category">
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
            //FETCHING ALL THE DATA INSIDE THE TABLE SERVICES
            $execGetUsers = mysqli_query($con, "SELECT * FROM tbl_users ORDER BY last_name");

            while($listOfUsers = mysqli_fetch_assoc($execGetUsers)){
                $id       = $listOfUsers["id"];
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
                            <td><button type='button' class='btn btn-primary'><a  href='profile_page.php?id=$id'>Edit</a></button></td>
                            <td><button type='button' class='btn btn-danger'><a href='user_delete.php?id=$id'>Delete</a></button></td>
                        </tr>        
                    </tbody>
                ";
            }
        ?>
    </table>
</div>
<!-- FORM FOR CREATING A USER -->
<div id="createUser" class="bg1">
    <h1>Create a User</h1>
    <?php 
        include_once("registration.php");
    ?>
</div>
                
