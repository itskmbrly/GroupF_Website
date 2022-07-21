<table class="table">
    <thead>
        <tr>
            <th>Kraftman Name</th> 
            <th>Service</th>
            <th>Price</th>
        </tr>
</thead>
<tbody>
    <?php
        $selectFavorites = mysqli_query($con, "SELECT * FROM tbl_favorites WHERE id = '$sessId'");
        while($rowFavorites = mysqli_fetch_assoc($selectFavorites)){
            $service_favorite = $rowFavorites["kraftsman_id"];

            //SELECT QUERY SERVICE FAVORITE
            $selectFavoriteDeets = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE id ='$service_favorite'");
            $rowFavorited = mysqli_fetch_assoc($selectFavoriteDeets);
            $favorite_kraftsman_id = $rowFavorited["user_id"];
            $favorite_service_id = $rowFavorited["service_id"];
            $favorie_price = $rowFavorited["price"];
            $favorite_spicture = $rowFavorited["service_picture"];

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
                    <td>Fraulyn Jyl</td>
                    <td>Hair Cut</td>
                    <td>Price</td>
                    <td><form method="POST" action="favorites.php?serveid='; echo $service_favorite; echo'"><button type="submit" name="fave" id="fave">'; echo $addedFave; echo'</button></form></td>
                </tr>
            ';
        }
    ?>
    </tbody>
</table>