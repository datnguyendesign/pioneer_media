<?php
require_once "connection.php";

$sql_posts = "SELECT * FROM posts ORDER BY postID DESC";
$result_post = $conn->query($sql_posts);

if (isset($_POST["upload"])) {
  $uploadDirectory = "images/";
  $validExtension = array('jpg', 'jpeg', 'png', 'bmp', 'webp');

  $message = $errorType = $errorSize = $errorImage = "";
  $img_ref = rand();
  $sqlValues = "";

  foreach ($_FILES['image']['tmp_name'] as $imageKey => $imageValue) {
    $image = $_FILES['image']['name'][$imageKey];
    $imageSize = $_FILES['image']['size'][$imageKey];
    $imageTmp = $_FILES['image']['tmp_name'][$imageKey];
    $imageType = pathinfo($uploadDirectory . $image, PATHINFO_EXTENSION);

    // get image new name
    if ($image != '') {
      $imageNewName = uniqid() . "." . $imageType;
      echo $imageNewName;
    } else {
      $imageNewName = "";
      $errorImage .= "<span style='color:red;'>Image required...!</span>";
    }

    if ($imageSize > 1024000 * 5) {
      $errorSize .= "<span style='color:red;'>Large Image Size must be under 1 Mb</span>";
    } else if (!empty($image) && !in_array($imageType, $validExtension)) {
      $errorType .= "<span style='color:red;'>File must be an Image...!</span>";
    } else if (empty($message)) {
      $title = $_POST["title"];
      $description = $_POST["description"];
      $sql_getPostID = "SELECT * FROM posts";
      $result_getPostID = $conn->query($sql_getPostID);
      $flag_post = 1;
      while ($row = mysqli_fetch_assoc($result_getPostID)) {
        $flag_post += 1;
      }
      $sqlValues .= "(" . $flag_post . ", '" . $title . "', '" . $description . "', 'images/" . $imageNewName . "'),";

      $store = move_uploaded_file($imageTmp, $uploadDirectory . $imageNewName);
    }
  }

  if (!empty($errorType) || !empty($errorSize) || !empty($errorImage)) {
    $message .= $errorType . $errorSize . $errorImage;
  } else {
    if (!empty($_COOKIE["user_id"])) {
      $userID = $_COOKIE["user_id"];
      $sqlIns = "INSERT INTO posts (userID, title, description, categoryID) VALUES ($userID, '$title', '$description', 1);";
      $sqlIns .= "INSERT INTO images (postID, imageName, imageDescription, imageSource) VALUES $sqlValues";

      $sqlIns = rtrim($sqlIns, ",");

      $result_s = mysqli_multi_query($conn, $sqlIns);

      echo $sqlIns;
      if ($result_s) {
        header("Location:feed.php?postID=$flag_post");
      }
    }
    echo $sqlIns;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feed - Art palette</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/css/feed.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <!-- Section header -->
  <?php require_once "explore_header.php"; ?>
  <!-- /Section header -->

  <!-- Section body -->
  <form class="upload-news" action="" method="POST" enctype="multipart/form-data">
    <h1>New post</h1>
    <input type="text" name="title" id="title" placeholder="Title...">
    <div class="select-title-color">
      <span id="red-color--bg"></span>
      <span id="blue-color--bg"></span>
      <span id="green-color--bg"></span>
      <span id="yellow-color--bg"></span>
      <span><i class="fa-solid fa-ellipsis"></i></span>
    </div>
    <textarea name="description" id="description" cols="50" rows="3" placeholder="What's on your mind ?"></textarea>
    <div class="up-picture">
      <div class="images-display" id="selectedBanner">
      </div>

      <div class="upload-image">
        <input type="file" name="image[]" id="img" multiple>
        <label for="img">
          <i class="fa-solid fa-circle-plus"></i>
          <p>Upload photos</p>
          <span>or videos</span>
        </label>
      </div>
    </div>
    <input type="submit" name="upload" value="Create Post" class="btn-post">
    <div class="close" onclick="toggle()">
      <i class="fa-solid fa-xmark"></i>
    </div>
  </form>

  <div class="middle" id="blur">
    <!-- Frame left -->
    <section id="left">
      <div class="upload">
        <a href="#" id="upload" onclick="toggle()"><i class="fa fa-circle-plus"></i></a>
        <p>Click here to upload your picture</p>
      </div>

      <iframe src="feed_left.html" frameborder="0" title="Feed Element left"></iframe>
    </section>

    <!-- /Frame left -->


    <!-- Main frame -->
    <section class="feed">

      <div class="container">

        <?php while ($row = mysqli_fetch_assoc($result_post)) { ?>
          <div class="box">
            <div class="box__image wrap">

              <?php
              $postID = $row["postID"];
              $sql_image = "SELECT * FROM images WHERE postID = $postID";
              $result_image = $conn->query($sql_image);

              while ($row_image = mysqli_fetch_assoc($result_image)) {
              ?>
                <img src="<?php echo $row_image["imageSource"]; ?>" alt="">
              <?php } ?>
            </div>

            <div class="box__interact">
              <div class="like">
                <i class="fa-regular fa-heart"></i>
                <p><?php echo $row["likeCount"]; ?></p>
              </div>

              <div class="download">
                <i class="fa-solid fa-download"></i>
                <p><?php echo $row["downloadCount"]; ?></p>
              </div>

              <?php
              $userID = $row["userID"];
              $sql_user = "SELECT * FROM account WHERE id = $userID";
              $result_user = $conn->query($sql_user);
              $row_user = $result_user->fetch_assoc();
              ?>

              <div class="credit">@<?php echo $row_user["username"]; ?></div>
            </div>

            <div class="box__title">
              <h1><?php echo $row["title"]; ?></h1>
            </div>
            <div class="box__content">
              <p><?php echo $row["description"]; ?></p>
            </div>
          </div>
        <?php } ?>

        <div class="box">
          <div class="box__image">
            <img src="images/Aesthetics_ A Guide - Art Aesthetic - Phone Wallpaper.jpg" alt="">
          </div>
          <div class="box__interact">
            <div class="like">
              <i class="fa-regular fa-heart"></i>
              <p>15</p>
            </div>

            <div class="download">
              <i class="fa-solid fa-download"></i>
              <p>50</p>
            </div>

            <div class="credit">@Rosie</div>
          </div>
          <div class="box__title">
            <h1 class="main-color">Roses are dead, love is fake</h1>
          </div>
          <div class="box__content">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing
              elit. Enim, a quidem? Eveniet, iure. Esse, eius.</p>
          </div>
        </div>

      </div>

    </section>
    <!-- /Main frame -->


    <!-- Frame right -->
    <iframe src="feed_right.php" frameborder="0" title="Feed Element right" id="right"></iframe>
    <!-- /Frame right -->

  </div>

  <!-- /Section body -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    function toggle() {
      var blur = document.getElementById('blur');
      blur.classList.toggle('active');
      var popup = document.querySelector('.upload-news');
      popup.classList.toggle('active');
    }
  </script>

  <script>
    function show(a) {
      document.querySelector('.menu').value = a;
    }

    let dropdown = document.querySelector('.dropdown');
    dropdown.onclick = function() {
      dropdown.classList.toggle('active');
    }
  </script>

  <script>
    var selDiv = "";
    var storedFiles = [];
    $(document).ready(function() {
      $("#img").on("change", handleFileSelect);
      selDiv = $("#selectedBanner");
    });

    function handleFileSelect(e) {
      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      filesArr.forEach(function(f) {
        if (!f.type.match("image.*")) {
          return;
        }
        storedFiles.push(f);


        var reader = new FileReader();
        reader.onload = function(e) {
          var html =
            '<img src="' +
            e.target.result +
            "\" data-file='" +
            f.name +
            "alt=''>";
          selDiv.append(html);
        };
        reader.readAsDataURL(f);



      });
    }
  </script>


</body>

</html>