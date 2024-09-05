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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- header -->
    <header class="header">
        <a href="index.php" class="logo">
            <div class="image">
                <img style="width: 60px;" src="images/logo-removebg-preview.png" alt="">
            </div>
            <div class="title">
                Pioneer Media
            </div>
        </a>

        <div class="logos">
            <?php
            if ($row < 0) {
                echo '<a href="login.php" class="btn--login">Login</a>';
                echo '<a href="signup.php" class="btn--signup">Sign up</a>';
                echo '<div class="fas fa-bars" id="menu-btn"></div>';
            } else {
                echo '<div class="user">
                    <div class="dropdown" id="dropdown-1">
                      <div class="menu" id="popup-1">
                        <img src="images/img22.jpg" alt="">
                        <span>' . $username . '</span>
                      </div>

                      <div class="option">
                        <div><a href="index.php">Home</a></div>
                        <div><a href="profile.php">Profile</a></div>
                        <div><a href="logout.php">Sign out</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="fas fa-bars" id="menu-btn"></div>';
            }

            ?>
        </div>

        <div class="links">
            <a href="about.php">PioQuizzy</a>
            <a href="about.php">PioEdu</a>
            <a href="about.php">PioCourses</a>
            <a href="about.php">About</a>
            <a href="explore.php">Explore</a>
            <a href="feed.php">Feed</a>
            <a href="gallery.html">Gallery</a>
            <?php
            if ($row < 0) {
                echo '<a href="login.php" class="btn--login">Login</a>';
                echo '<a href="signup.php" class="btn--signup">Sign up</a>';
            } else {
                echo '<div class="user">
                            <div class="dropdown" id="dropdown-2">
                                <div class="menu" id="popup-2">
                                    <img src="images/img22.jpg" alt="">
                                    <span>' . $username . '</span>
                                </div>

                                <div class="option">
                                    <div><a href="index.php">Home</a></div>
                                    <div><a href="profile.php">Profile</a></div>
                                    <div><a href="logout.php">Sign out</a></div>
                                </div>
                            </div>
                         </div>';
            }

            ?>
        </div>
    </header>
    <!-- /header -->
</body>

</html>