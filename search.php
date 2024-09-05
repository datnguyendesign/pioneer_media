<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Palette - Search</title>
    <link rel="stylesheet" href="assets/css/explore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
    <!-- Header -->
    <?php require_once "explore_header.php"; ?>

    <!-- Title -->
    <div class="title__explore">
        <h1>Explore</h1>
        <p>Unleash your creativity with us!</p>
    </div>

    <!-- section images -->
    <section class="images">
        <?php
        if (mysqli_num_rows($search_result) > 0) {
            echo '<div class="container__image" id="blur">';
            while ($row = mysqli_fetch_assoc($search_result)) {
                echo '<div class="item-img '.$row["imageSize"].'" data-name="i-'.$row["imageID"].'" onclick="clickMe();">
                        <div class="link-img">
                            <img src="'.$row["imageSource"].'" alt="">
                        </div>
                      </div>';
            }
            echo '</div>';

            echo '<div class="container__popup">';
            while ($row = mysqli_fetch_assoc($search_result_blur)) {
               echo '<div class="item-popup" data-target="i-'.$row["imageID"].'">
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
                </div>';
            }
            echo '</div>';
        } else {
            echo "Data not found";
        }
        ?>
    </section>

    <!--  footer -->
    <?php require_once "footer.php"; ?>

    <script>
        function show(a) {
            document.querySelector('.menu').value = a;
        }

        let dropdown = document.querySelector('.dropdown');
        dropdown.onclick = function() {
            dropdown.classList.toggle('active');
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#load_more', function(event) {
                event.preventDefault();

                var id = $('#load_more').data('id');

                $.ajax({
                    url: "load.php",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {

                        $('#images__more').remove();

                        $('.container__image').append(response);

                    }
                });

                $.ajax({
                    url: "load_hide.php",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {

                        $('.container__popup').append(response);

                    }
                });
            });
        });
    </script>

    <script>
        // let popup = document.querySelectorAll('.item-popup');
        // let clicker = document.querySelectorAll('.item-img');
        // let blurElm = document.getElementById('blur');
        // let noScroll = document.querySelector('html');
        // let flagClose = document.querySelectorAll('.close');

        // clicker.forEach(elm => {
        //   elm.onclick = () => {
        //     blurElm.classList.toggle('active');
        //     noScroll.classList.toggle('active');
        //     let name = elm.getAttribute('data-name');
        //     popup.forEach(pop => {
        //       let target = pop.getAttribute('data-target');
        //       if (name == target) {
        //         pop.classList.toggle('active');
        //       }
        //     });
        //   }
        // })

        function clickMe() {
            let popup = document.querySelectorAll('.item-popup');
            let clicker = document.querySelectorAll('.item-img');
            console.log(popup.length);
            console.log(clicker.length);
            let blurElm = document.getElementById('blur');
            let noScroll = document.querySelector('html');
            let flagClose = document.querySelectorAll('.close');
            clicker.forEach(elm => {
                elm.onclick = () => {
                    blurElm.classList.toggle('active');
                    noScroll.classList.toggle('active');
                    let name = elm.getAttribute('data-name');
                    popup.forEach(pop => {
                        let target = pop.getAttribute('data-target');
                        if (name == target) {
                            pop.classList.toggle('active');
                        }
                    });
                }
            });
            flagClose.forEach(close => {
                close.onclick = () => {
                    blurElm.classList.toggle('active');
                    noScroll.classList.toggle('active');
                    popup.forEach(pop => {
                        pop.classList.remove('active');
                    });
                }
            });
        }

        flagClose.forEach(close => {
            close.onclick = () => {
                blurElm.classList.toggle('active');
                noScroll.classList.toggle('active');
                popup.forEach(pop => {
                    pop.classList.remove('active');
                });
            }
        })
    </script>
</body>

</html>