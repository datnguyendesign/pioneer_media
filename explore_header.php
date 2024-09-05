<?php
require 'connection.php';

if (!empty($_COOKIE['user_id'])) {
    $sql = "SELECT * FROM account WHERE id = " . $_COOKIE['user_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $email = $row['email'];
    $username = $row['username'];
    $id = $row['id'];
} else {
    $row = -1;
}

if (isset($_POST["submit"])) {
    $search = $_POST["search"];

    $sql_search = "SELECT * FROM images WHERE imageName LIKE '%$search%' OR imageDescription LIKE '%$search%'";
    $search_result = $conn->query($sql_search);
    $search_result_blur = $conn->query($sql_search);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/explore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Section header -->
    <header class="header_explore">
        <div class="logo">
            <div class="image">
                <img style="width: 60px;" src="images/logo-removebg-preview.png" alt="">
            </div>

            <div class="title">
                <a href="index.php">Pioneer Media</a>
            </div>
        </div>

        <form class="search-space" method="post" action="search.php">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="search" placeholder="Search here...">
            <button name="submit">Search</button>
        </form>

        <div class="links">
            <a href="feed.php">Feed</a>
            <a href="about.php">About us</a>
            <a href="gallery.html">Gallery</a>
        </div>

        <div class="container">
            <div class="notice">
                <a href="#" class="bell"><i class="fas fa-bell"></i></a>
                <div class="notification">

                    <header class="noti__header">
                        <h1>Notification</h1>
                    </header>

                    <ul class="noti__list">
                        <li class="noti__list-item">
                            <a href="#" class="noti__link message">
                                <img src="images/user.png" alt="" class="noti__link-img">
                                <div class="noti__link-content">
                                    <h2>Message</h2>
                                    <p>User has nickname <span>ngtiendat</span> just replied your comment.</p>
                                </div>
                                <div class="noti__link-type">
                                    <i class="fa-solid fa-message"></i>
                                </div>
                            </a>
                        </li>

                        <li class="noti__list-item">
                            <a href="#" class="noti__link reaction">
                                <img src="images/user.png" alt="" class="noti__link-img">
                                <div class="noti__link-content">
                                    <h2>Reaction</h2>
                                    <p>User has nickname <span>ngtiendat</span> just liked your post.</p>
                                </div>
                                <div class="noti__link-type">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </a>
                        </li>

                        <li class="noti__list-item">
                            <a href="#" class="noti__link download">
                                <img src="images/user.png" alt="" class="noti__link-img">
                                <div class="noti__link-content">
                                    <h2>Download</h2>
                                    <p>You have just downloaded the image from <span>abc</span>.</p>
                                </div>
                                <div class="noti__link-type">
                                    <i class="fa-solid fa-download"></i>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <?php
            if ($row > 0) {
                echo '<div class="user">
                        <div class="dropdown">
                            <div class="menu">
                                <img src="images/img22.jpg" alt="">
                                <span>'.$username.'</span>
                            </div>

                            <div class="option">
                                <div><a href="index.php">Home</a></div>
                                <div><a href="profile.php">Profile</a></div>
                                <div><a href="logout.php">Sign out</a></div>
                            </div>
                        </div>
                      </div>';
            } else {
                echo '<a href="login.php" class="btn--login">Login</a>
                      <a href="signup.php" class="btn--signup">Sign up</a>';
            }
            ?>
        </div>

    </header>

    <!-- /Section header -->
</body>

</html>