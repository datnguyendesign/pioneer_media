<?php

require_once "connection.php";

$sql = $sql_copy = "SELECT * FROM images WHERE imageID > '". $_POST['id']."' LIMIT 20";
$data_copy = $conn->query($sql_copy);

$output = "";

while ($row = mysqli_fetch_assoc($data_copy)) {

    $output .= '
    <div class="item-popup" data-target="i-'.$row["imageID"].'">
        <img src="'.$row["imageSource"].'" alt="">
        <div class="content">
            <h1 class="title">'.$row["imageName"].'</h1>
            <span class="credit">@abc</span>
            <p class="description">'.$row["imageDescription"].'</p>
            <div class="interact">
                <div class="like">
                    <i class="fa-regular fa-heart"></i>
                    <p class="no-of-like">15</p>
                </div>
                <div class="download">
                    <i class="fa fa-download"></i>
                    <p class="no-of-download">15</p>
                </div>
            </div>
            <div class="fields">
              <a href="#" class="field__item">Photos</a>
              <a href="#" class="field__item">Portrait</a>
              <a href="#" class="field__item">Nature</a>
              <a href="#" class="field__item">Artwork</a>
            </div>
        </div>
        <div class="close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    ';
}

echo $output;

?>