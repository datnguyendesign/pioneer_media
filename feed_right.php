<?php
require_once "connection.php";

$sql = "SELECT * FROM account LIMIT 4";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        :root {
            --black: #333;
            --white: #fff;
            --main-color: #d3ad7f;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: .2s linear;
            color: var(--black);
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-padding-top: 9rem;
            scroll-behavior: smooth;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            row-gap: 1rem;
        }

        .container__right {
            padding: 5rem;
            background-color: #D9D9D933;
            border-radius: 2rem;
        }

        .container__right .title {
            font-size: 2rem;
            font-weight: 700;
            padding-bottom: 2rem;
        }

        .container__right .people .item {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 2rem;
            column-gap: 1rem;
        }

        .container__right .people .item .avatar {
            width: 5.6rem;
            height: 5.6rem;
        }

        .container__right .people .item .avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .container__right .people .item a {
            font-size: 1.8rem;
        }

        .container__right .people .item a:hover {
            color: var(--main-color);
        }
    </style>

</head>

<body>
    <div class="container__right">
        <div class="title">
            Following
        </div>

        <div class="people">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="item">
                    <div class="avatar">
                        <img src="<?php echo $row["avatar"]; ?>" alt="">
                    </div>
                    <a href="">@<?php echo $row["username"]; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container__right">
        <div class="title">
            Recommend
        </div>

        <div class="people">
            <?php
            $sql_rcm = "SELECT * FROM account LIMIT 5 OFFSET 4";
            $result_cmd = $conn->query($sql_rcm);
            while ($row = mysqli_fetch_assoc($result_cmd)) {
            ?>
                <div class="item">
                    <div class="avatar">
                        <img src="<?php echo $row["avatar"]; ?>" alt="">
                    </div>
                    <a href="">@<?php echo $row["username"]; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>