<?php
require_once "connection.php";

$sql = "SELECT * FROM images LIMIT 20";
$data = $conn->query($sql);

$sql_copy = "SELECT * FROM images LIMIT 20";
$data_copy = $conn->query($sql_copy);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore_Art Palette</title>
  <link rel="stylesheet" href="assets/css/explore.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>

  <!-- Section header -->
  <?php require_once "explore_header.php"; ?>
  <!-- /Section header -->

  <!-- Title -->
  <div class="title__explore">
    <h1>Explore</h1>
    <p>Unleash your creativity with us!</p>
  </div>
  <!-- /Title -->

  <!-- section images -->

  <section class="images">

    <div class="container__image" id="blur">
      <?php while ($row = mysqli_fetch_assoc($data)) { ?>
        <div class="item-img" data-name="i-<?php echo $row["imageID"]; ?>" onclick="clickMe();">
          <div class="link-img">
            <img src="<?php echo $row["imageSource"]; ?>" alt="">
          </div>
        </div>
      <?php
        $id = $row["imageID"];
      }
      ?>
    </div>

    <div class="container__popup">
      <?php while ($row = mysqli_fetch_assoc($data_copy)) { ?>
        <div class="item-popup" data-target="i-<?php echo $row["imageID"]; ?>">
          <img src="<?php echo $row["imageSource"]; ?>" alt="">
          <div class="content">
            <h1 class="title"><?php echo $row["imageName"]; ?></h1>
            <span class="credit">@abc</span>
            <p class="description"><?php echo $row["imageDescription"]; ?></p>
            <div class="interact">
              <div class="like">
                <i class="fa-regular fa-heart"></i>
                <p class="no-of-like">15</p>
              </div>
              <div class="download" onclick="window.location.href='https://www.tooplate.com/zip-templates/2098_health.zip'">
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
      <?php } ?>
    </div>

    <div id="images__more">
      <button id="load_more" data-id="<?php echo $id; ?>">Load more...</button>
    </div>

  </section>

  <!-- /section images -->

  <!-- section footer -->
  <?php require_once "footer.php"; ?>
  <!-- /section footer -->

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