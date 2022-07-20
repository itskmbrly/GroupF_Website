<?php
    $sessId = $_SESSION["sess-id"]; 
    if($_SESSION["sess-role"] == 1 && (isset($_SESSION["sess-id"]))){
        $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE user_id = '$sessId' ORDER BY category_id ASC");
    } else{
        $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_kraftsman ORDER BY category_id ASC");
    }

    echo '<div id="hair"><h2>Hair Services</h2>';
    $nail_start = false;
    $spa_start = false;
    while($fetchServices = mysqli_fetch_assoc($execQuery1)){
        $s_id = $fetchServices["id"];
        $user_id = $fetchServices["user_id"];
        $service_id = $fetchServices["service_id"];
        $category_id = $fetchServices["category_id"];
        $price = $fetchServices["price"];
        $service_picture = $fetchServices["service_picture"];

        $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_services WHERE id = '$service_id'");
        $fetchServiceName = mysqli_fetch_assoc($execQuery2);
        $service_name = $fetchServiceName["service_name"];
        if (strlen($service_name) > 15){
            $service_name = substr_replace($service_name, "...", 15);
        }


        if($category_id == 1){
            $cat = "../images/hair/";
        } else if($category_id == 2){
            if($nail_start == false){
                echo '</div><div id="nail"><h2>Nail Services</h2>';
                $nail_start = true;
            }
            $cat = "../images/nail/";
        } else if($category_id == 3){
            if($spa_start == false){
                echo '</div><div id="spa"><h2>Spa Services</h2>';
                $spa_start = true;
            }
            $cat = "../images/spa/";
        }

        echo'
            <a href="services.php?serveid='; echo $s_id; echo'">
                <div class="card services-container cat-'; echo $category_id; echo'">
                    <center><img class="card-img-top" src="'; echo $cat . $service_picture; echo'" alt="Card image"></center>
                    <div class="card-body">
                    <h4 class="card-title">'; echo $service_name; echo'</h4>
                    <p class="card-text">Php '; echo $price; echo'</p>
                    </div>
                </div>
            </a>
        ';
    }
    echo '</div>';
?>
