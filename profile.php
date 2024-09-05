<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/profile.css">
</head>

<body>

    <!-- Header -->
    <?php require_once "header.php"; ?>

    <section class="profile">

        <div class="container__left">

            <div class="info">
                <div class="info__avatar">
                    <img src="images/img22.jpg" alt="">
                </div>

                <div class="info__name">
                    <h1>Lorem, ipsum</h1>
                </div>

                <div class="info__details">
                    <div class="credit">@forever_young10</div>
                    <div class="watched">
                        <i class="fa-regular fa-user"></i>
                        <p>600</p>
                    </div>
                </div>

                <div class="info__title">
                    <p>Been fell in love with you for 1000 years. </p>
                </div>

                <div class="info__btn-edit">
                    <a href="#">Edit</a>
                </div>
            </div>

            <div class="option">
                <div class="option__post option_item">
                    <a href="#"><i class="fa fa-circle-plus"></i></a>
                    <p>New post</p>
                </div>

                <div class="option__share option_item">
                    <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
                    <p>Share profile</p>
                </div>

                <div class="option__palette option_item">
                    <a href="#"><i class="fa-solid fa-images"></i></a>
                    <p>New palette</p>
                </div>
            </div>

        </div>

        <div class="container__right">

            <div class="post-item">
                <div class="images">
                    <img src="images/download (2).jpg" alt="">
                    <img src="images/img34.jpg" alt="">
                    <img src="images/Sinead OConnor.jpg" alt="">
                    <img src="images/img35.jpg" alt="">
                </div>

                <div class="content">
                    <div class="content__title">
                        <h2>Portrait</h2>
                    </div>
                    <div class="content__react">
                        <i class="fa-regular fa-heart"></i>
                        <p>15</p>
                    </div>
                    <div class="content__des">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Vel repellendus debitis est eaque. Non, deleniti?</p>
                    </div>
                </div>
            </div>

            <div class="post-item">
                <div class="images">
                    <img src="images/Photos of world's most beautiful landscapes look they're from dreams.png" alt="">
                    <img src="images/The 20 best things to do in Japan.jpg" alt="">
                    <img src="images/Mass.jpg" alt="">
                    <img src="images/pexels-marlon-martinez-1450082.jpg" alt="">
                </div>

                <div class="content">
                    <div class="content__title">
                        <h2 class="color-1">Lakes through the lens</h2>
                    </div>
                    <div class="content__react">
                        <i class="fa-regular fa-heart"></i>
                        <p>15</p>
                    </div>
                    <div class="content__des">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Vel repellendus debitis est eaque. Non, deleniti?</p>
                    </div>
                </div>
            </div>

            <div class="post-item">
                <div class="images">
                    <img src="images/Thierry Gauthier on Twitter _ Flower background iphone, Pink flowers wallpaper, Cherry blossom wallpaper.jpg" alt="">
                    <img src="images/img11.jpg" alt="">
                    <img src="images/Cosy Refugium.jpg" alt="">
                    <img src="images/img12.jpg" alt="">
                </div>

                <div class="content">
                    <div class="content__title">
                        <h2 class="color-2">Spring blooming</h2>
                    </div>
                    <div class="content__react">
                        <i class="fa-regular fa-heart"></i>
                        <p>15</p>
                    </div>
                    <div class="content__des">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Vel repellendus debitis est eaque. Non, deleniti?</p>
                    </div>
                </div>
            </div>

            <div class="post-item">
                <div class="images">
                    <img src="images/Premium Photo _ Exotic tropical monstera palm leaves at home.jpg" alt="">
                    <img src="images/Free Image on Pixabay - Monstera, Plant, Leaves, Tropical (1).jpg" alt="">
                </div>

                <div class="content">
                    <div class="content__title">
                        <h2 class="color-3">Pothos</h2>
                    </div>
                    <div class="content__react">
                        <i class="fa-regular fa-heart"></i>
                        <p>15</p>
                    </div>
                    <div class="content__des">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Vel repellendus debitis est eaque. Non, deleniti?</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

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