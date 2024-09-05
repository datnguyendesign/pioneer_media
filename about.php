<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AP_About-Us</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

</head>
<body>

<!-- header -->
<?php require_once "header.php"; ?>
<!-- /header -->

<!-- title -->

<div class="title-about">
    <h1>About Us</h1>
</div>

<!-- /title -->

<!-- section about -->

<section class="about">

    <div class="container">

        <div class="box b1">
            <img src="images/img7.jpg" alt="">
        </div>

        <div class="box b2">
            <h2>Pio Media</h2>
            <p>Is a product of Pioneer Team, providing a creative space for artist, education,...</p>
        </div>

        <div class="box b3">
            <h2>Sharing</h2>
            <p>Upload your art work, photos and more Share your ideas by making your own feed.</p>
        </div>

        <div class="box b4">
            <img src="images/Llucia _ Photos (1).png" alt="">
        </div>

        <div class="box b5">
            <img src="images/img14.jpg" alt="">
        </div>

        <div class="box b6">
            <h2>Inspiration</h2>
            <p>Find your inspiration by discovering artwork on the platform.</p>
        </div>

        <div class="box b7">
            <h2>Free download Image</h2>
            <p>High resolution image downloading, try our pro subscription to get the original resolution</p>
        </div>

        <div class="box b8">
            <img src="images/How to Grow and Care for Snowdrop Flower.jpg" alt="">
            <img src="images/How to Grow and Care for Snowdrop Flower.jpg" alt="">
        </div>

    </div>

</section>

<!-- /section about -->

<!-- section problems -->

<section class="problems">

    <div class="container">

        <div class="contents">

            <div class="title">
                <h2>Common problems</h2>
            </div>

            <div class="content">
                <h3>How to buy subscription?</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Quibusdam obcaecati expedita voluptates dolore natus maiores?
                Voluptas quibusdam expedita, voluptatibus excepturi mollitia,
                provident nulla vero natus explicabo atque, minus molestiae.
                Officiis?</p>
            </div>

            <div class="content">
                <h3>Sign up/Log in problem.</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Amet officia laboriosam, ex doloremque rem delectus necessitatibus
                aspernatur labore iure dolores molestiae fugit qui? Est ducimus
                cupiditate quam. Sint incidunt voluptatem tempora dolore nisi
                minima facere vero quidem doloribus maiores deleniti ratione
                in delectus mollitia vel labore nesciunt, cumque saepe natus!</p>
            </div>

            <div class="content">
                <h3>Service</h3>
                <p>Contact us by the phone number: <a href="#">032xxxxx</a> , or send us email via: <a href="#">acvvsddf@artpalette.com</a></p>
            </div>

        </div>

        <div class="image">
            <img src="images/woman-with-headphones-and-microphone-with-computer-contact-us-customer-service-assistant-support-call-center-concept-cartoon-illustration-in-flat-style-vector.jpg" alt="">
        </div>

    </div>

</section>

<!-- /section problems -->

<!-- section footer -->

<section class="footer">

    <div class="share">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
      <a href="#" class="fab fa-linkedin"></a>
      <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit">
      <p>Designed by <span>Phan Ngoc Thach</span></p>
      <p>Developed by <span>Nguyen Tien Dat</span></p>
    </div>

    <div class="links">
      <p>Phone:&nbsp;<a href="#">032xxxxxxx</a></p>
      <a href="#">thachpn.22git@vku.udn.vn</a>
      <a href="#">datnt.22git@vku.udn.vn</a>
    </div>

    <div class="language">
      <a href="#">eng/English</a>
    </div>

  </section>

<!-- /section footer -->


<script>
  let dropdown1 = document.getElementById('dropdown-1');
  dropdown1.onclick = function() {
      dropdown1.classList.toggle('active');
  }

  let dropdown2 = document.getElementById('dropdown-2');
  dropdown2.onclick = function() {
      dropdown2.classList.toggle('active');
  }
</script>
</body>
</html>