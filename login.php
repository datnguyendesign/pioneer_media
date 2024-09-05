<?php
    require_once 'connection.php';

    $pwErr = $emailErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST['email']);
            $emailErr = "";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid Email!";
            }
        }

        if (empty($_POST['password'])) {
            $pwErr = "Password is required";
        } else {
            $password = test_input($_POST['password']);
        }

        @$sql = "SELECT * FROM account WHERE email='$email' AND password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $message = "Logged in";
            setcookie("user_id", $row["id"], time()+(86400*30), "/");
            header("Location:index.php?message=".$message);
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

<!-- section background -->
<section class="background">

    <div class="container">

        <div class="box tall">
            <img src="images/Koki Ikegami on Twitter.jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/Thierry Gauthier on Twitter _ Flower background iphone, Pink flowers wallpaper, Cherry blossom wallpaper.jpg" alt="">
        </div>

        <div class="box big">
            <img src="images/flower.jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/Photos of world's most beautiful landscapes look they're from dreams.png" alt="">
        </div>

        <div class="box tall">
            <img src="images/img1-1.png" alt="">
        </div>

        <div class="box tall">
            <img src="images/Cherry Blossom Riverside Retreat.png" alt="">
        </div>

        <div class="box tall">
            <img src="images/Pin de Alisson Pinheiro em Wallpapers _ Wallpaper pisicodelico, Imagem de fundo para iphone, Wallpapers bonitos.jpg" alt="">
        </div>

        <div class="box wide">
            <img src="images/pinterest-babygirls.jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/Warm, Loving, Elegant Skincare Brand & Logo Design The Lasting Creative.jpg" alt="">
        </div>

        <div class="box big">
            <img src="images/Stuff.jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/18-Year-Old Creates Surreal Artworks to Express Emotions (1).jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/14 Destinations to Visit and See Gorgeous Spring Flowers.jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/AstroBank commercial illustrations_ (1).png" alt="">
        </div>

        <div class="box tall">
            <img src="images/download.jpg" alt="">
        </div>

        <div class="box tall">
            <img src="images/Landscape [7] - Moonlight Mountain by ncoll36 on DeviantArt.jpg" alt="">
        </div>

        <div class="box big">
            <img src="images/pexels-ezra-comeau-2387418.jpg" alt="">
        </div>

        <div class="box wide">
            <img src="images/Surreal Feminist Paintings Ponder the Meaning of Life.jpg" alt="">
        </div>

    </div>

</section>
<!-- /section background -->

<!-- section login form -->
<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="container">

        <div class="title">
            <h1>Art Palette</h1>
        </div>

        <div class="box-email">
            <label for="email">Email</label>
            <input type="text" placeholder="Enter your Email address" name="email" id="email">
            <span><?php echo $emailErr; ?></span>
        </div>

        <div class="box-pw">
            <label for="password">Password</label>
            <input type="password" placeholder="Enter your Password" name="password" id="password">
            <span><?php echo $pwErr; ?></span>
        </div>

        <div class="btn">
            <input type="submit" value="Login" name="login" id="login">
        </div>

        <div class="link_fb">
            <a href="#" class="fab fa-facebook-f"></a>
            <p>Login with Facebook</p>
        </div>

        <div class="link_gg">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="705.6" height="720" viewBox="0 0 186.69 190.5" xmlns:v="https://vecta.io/nano">
                <g transform="translate(1184.583 765.171)">
                    <path clip-path="none" mask="none" d="M-1089.333-687.239v36.888h51.262c-2.251 11.863-9.006 21.908-19.137 28.662l30.913 23.986c18.011-16.625 28.402-41.044 28.402-70.052 0-6.754-.606-13.249-1.732-19.483z" fill="#4285f4"/>
                    <path clip-path="none" mask="none" d="M-1142.714-651.791l-6.972 5.337-24.679 19.223h0c15.673 31.086 47.796 52.561 85.03 52.561 25.717 0 47.278-8.486 63.038-23.033l-30.913-23.986c-8.486 5.715-19.31 9.179-32.125 9.179-24.765 0-45.806-16.712-53.34-39.226z" fill="#34a853"/>
                    <path clip-path="none" mask="none" d="M-1174.365-712.61c-6.494 12.815-10.217 27.276-10.217 42.689s3.723 29.874 10.217 42.689c0 .086 31.693-24.592 31.693-24.592-1.905-5.715-3.031-11.776-3.031-18.098s1.126-12.383 3.031-18.098z" fill="#fbbc05"/>
                    <path d="M-1089.333-727.244c14.028 0 26.497 4.849 36.455 14.201l27.276-27.276c-16.539-15.413-38.013-24.852-63.731-24.852-37.234 0-69.359 21.388-85.032 52.561l31.692 24.592c7.533-22.514 28.575-39.226 53.34-39.226z" fill="#ea4335" clip-path="none" mask="none"/>
                </g>
            </svg>
            </a>
            <p>Login with Google</p>
        </div>

        <div class="sign-up">
            <p>No account yet?</p>
            <a href="signup.php">Sign up</a>
        </div>

        <div class="footer">
            <div class="share">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-facebook-f"></a>
            </div>
            <div class="language">
                <a href="#">eng/English</a>
            </div>
        </div>

    </div>

</form>
<!-- /section login form -->

</body>
</html>

