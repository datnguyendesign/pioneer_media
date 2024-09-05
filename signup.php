<?php
require_once 'connection.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = $password = $username = $birthday = "";
$emailErr = $passwordErr = $usernameErr = $birthdayErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password length must greater than 6 character";
        }
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input(($_POST["username"]));
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["birthday"])) {
        $birthdayErr = "Birthday field is empty";
    } else {
        $birthday = test_input($_POST["birthday"]);
    }

    $sql = "INSERT INTO account (email, username, password, birthday)
            VALUES ('$email', '$username', '$password', '$birthday')";
    if ($conn->query($sql)) {
        $sub_sql = "SELECT * FROM account WHERE email = '$email'";
        $result = $conn->query($sub_sql);
        $row = $result->fetch_assoc();
        setcookie("user_id", $row["id"], time()+(86400*30), "/");
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Form</title>
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

<!-- section background sign up -->
<section class="background_sign-up">

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

        <div class="box wide">
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

        <div class="box tall">
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
<!-- /section background sign up -->


<!-- section sign up form -->
<form class="form_sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="container">

        <div class="title">
            <h1>Art Palette</h1>
        </div>

        <div class="box box-email">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email address">
        </div>

        <div class="box box-pw">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <div class="box box-name">
            <label for="name">Username</label>
            <input type="text" name="username" id="name" placeholder="Username">
        </div>

        <div class="box box-dob">
            <label for="birthday">Date of birth</label>
            <input type="date" name="birthday" id="birthday">
        </div>

        <div class="box box-check">
            <div class="checkbox">
                <input type="checkbox" id="cbx2" style="display: none;">
                <label for="cbx2" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
            </div>
            <p>By continuing, you agree to Art Palette Company’s
                <a href="#">Terms of Use</a> and
                <a href="#">Privacy Policy</a> .
            </p>
        </div>

        <div class="box-btn">
            <input type="submit" value="Sign up" name="signup" id="signup">
        </div>

        <div class="box-others">

            <div class="para">
                <p>Or continue with</p>
            </div>

            <div class="links">
                <a href="#" class="fa-brands fa-square-facebook"></a>
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
            </div>

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

<!-- /section sign up form -->

</body>
</html>