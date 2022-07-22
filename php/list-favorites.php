<table class="table">
    <thead>
        <tr>
            <th>Kraftsman Name</th> 
            <th>Service</th>
            <th>Price</th>
            <th style='text-align:center;'><i class='fa fa-heart'></i></th>
        </tr>
</thead>
<tbody>
    <?php
        $selectFavorites = mysqli_query($con, "SELECT * FROM tbl_favorites WHERE klient_id = '$sessId'");
        while($rowFavorites = mysqli_fetch_assoc($selectFavorites)){
            $service_favorite = $rowFavorites["kraftsman_id"];

            //SELECT QUERY SERVICE FAVORITE
            $selectFavoriteDeets = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE id ='$service_favorite'");
            $rowFavorited = mysqli_fetch_assoc($selectFavoriteDeets);
            $favorite_kraftsman_id = $rowFavorited["user_id"];
            $favorite_service_id = $rowFavorited["service_id"];
            $favorie_price = $rowFavorited["price"];
            $favorite_spicture = $rowFavorited["service_picture"];

            //SELECT QUERY FOR KRAFTSMAN INFORMATION
            $ki_info_query = mysqli_query($con, "SELECT * FROM tbl_users WHERE id ='$favorite_kraftsman_id'");
            $row_ki_info = mysqli_fetch_assoc($ki_info_query);
            $row_k_fname = $row_ki_info["first_name"];
            $row_k_lname = $row_ki_info["last_name"];

            //SELECT QUERY FOR SERVICE NAME
            $ki_info_query2 = mysqli_query($con, "SELECT * FROM tbl_services WHERE id ='$favorite_service_id'");
            $row_ki_info2 = mysqli_fetch_assoc($ki_info_query2);
            $row_service_name = $row_ki_info2["service_name"];

            //FOR BUTTON FAVORITE
            $selectQuery1 = mysqli_query($con, "SELECT * FROM tbl_favorites WHERE kraftsman_id = '$favorite_service_id' AND klient_id = '$sessId'");
            $numOfRows = mysqli_num_rows($selectQuery1);
            if($numOfRows > 0){
                $addedFave = "<i class='fa fa-heart'></i> Added";
            } else {
                $addedFave = "<i class='fa fa-heart-o'></i> Add to Favorites";
            }

            echo'
                <tr>
                    <td><a href="profile-page.php?id='.$favorite_kraftsman_id.'">'; echo $row_k_fname . " " . $row_k_lname; echo'</a></td>
                    <td><a href="services.php?serveid='.$favorite_service_id.'">'; echo $row_service_name;  echo'</a></td>
                    <td>'; echo $favorie_price; echo'</td>
                    <td style="text-align:center;">
                        <form method="POST" action="favorites.php?serveid='; echo $service_favorite; echo'">
                            <button type="submit" name="fave" id="fave">'; echo $addedFave; echo'</button>
                        </form>
                    </td>
                </tr>
            ';
        }
    ?>
    </tbody>
</table>