<?php
session_start();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
    header("location: login.php");
    exit;
} else {
    $uname = $_SESSION['username'];
}
?>
<!DOCTYPE html>

<head>
    <title>Sell Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="website/css/sellform.css">
    <style>
        #descr {
            color: white;
            width: 100%;
            font-size: x-large;
        }

        #title,
        #price,
        #img,
        #category {
            color: white;
            width: 100%;
            font-size: x-large;
        }

        option,
        #category1,
        #file {
            height: 50px;
            font-size: large;
        }

        footer {
            background-color: rgb(0, 0, 36);
            color: white;
            opacity: 0.9;
            height: 60px;
            margin-top: 40px;
            box-shadow: 2px 0px 10px 0px black;
            box-sizing: border-box;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        @media (min-width:464px) and (max-width:809px) {

            #title,
            #img,
            #price,
            #category,
            #descr {
                color: white;
                width: 100%;
                font-size: 17px;
            }

            .txt1,
            .txt2 {
                height: 90px;
                width: 90px;
                margin-bottom: 2px;
            }



            option,
            #category1,
            #file {
                height: 42px;
                font-size: large;
                margin-bottom: 2px;
            }

        }

        @media (min-width:314px) and (max-width:464px) {

            #title,
            #img,
            #price,
            #category,
            #descr {
                color: white;
                width: 100%;
                font-size: 12px;
            }

            .txt1,
            .txt2 {
                height: 63px;
                width: 90px;
                margin-bottom: 2px;
            }

            option,
            #category1,
            #file {
                height: 34px !important;
                font-size: 12px !important;
                margin-bottom: 2px;
            }
        }

        @media (min-width:200px) and (max-width:314px) {

            #title,
            #img,
            #price,
            #category,
            #descr {
                color: white;
                width: 100%;
                font-size: 12px;
            }

            .txt1,
            .txt2 {
                height: 63px;
                width: 90px;
                margin-bottom: 2px;
            }

            option,
            #category1,
            #file {
                height: 34px !important;
                font-size: 12px !important;
                margin-bottom: 2px;
            }

            .submit {
                background-color: rgb(0, 0, 36);
                color: white;
                border-radius: 4px;
                text-align: center;
                padding: 2px;
                width: 36%;
                margin-left: auto;
                margin-right: auto;
                font-size: 15px;
                align-items: center;
            }

            .posttext {

                font-size: 9px;
                background-color: rgb(0, 0, 36);
                color: white;
                border: none;
                width: 55px;
            }

            .posttitle {
                font-size: 8px;
            }
        }

        @media only screen and (max-width:200px) {

            #title,
            #img,
            #price,
            #category,
            #descr {
                color: white;
                width: 100%;
                font-size: 5px;
            }

            .txt1,
            .txt2 {
                height: 63px;
                width: 90px;
                margin-bottom: 2px;
            }

            option,
            #category1 {
                height: 25px !important;
                font-size: 8px !important;
                margin-bottom: 2px;
            }

            #file {
                height: 22px !important;
                font-size: 4px !important;
                margin-bottom: 2px;
            }

            .submit {
                background-color: rgb(0, 0, 36);
                color: white;
                border-radius: 4px;
                text-align: center;
                padding: 2px;
                width: 63%;
                margin-left: auto;
                margin-right: auto;
                font-size: 15px;
                align-items: center;
            }

            .posttext {

                font-size: 7px;
                background-color: rgb(0, 0, 36);
                color: white;
                border: none;
                width: 44px;
            }

            .posttitle {
                font-size: 5px;
            }

            footer {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <header class="nav" style="background-color: rgb(0, 0, 36);">
        <div class="bar">
            <a href="index.php" class="previous">&#8249;-</a>
            <span class="tname" style="color: white">Deal It</span>
        </div>
    </header>
    <div class="formfill" style="background-image: linear-gradient(180deg, rgb(0,0,36),  rgb(118, 201, 248)); opacity: 90%;">
        <form action="sellform.php" method="post" enctype="multipart/form-data">
            <div class="posttitle" style="background-color: white; opacity:100%; color: rgb(0, 0, 36);"><b>POST YOUR AD</b></div><br><br>
            <table cellspacing="40" class="row" style="margin-right: auto; margin-left: auto; padding: 10px">
                <tr>
                    <td>
                        <label for="category" id="category">Select Category</label>
                    </td>
                    <td>
                        <select id="category1" name="category" required>
                            <option value="select">Select</option>
                            <option value="engg drawing">Engineering Drawing Material</option>
                            <option value="boiler suit">Boiler Suit</option>
                            <option value="reference books">Reference Books</option>
                            <option value="Others">Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label id="title" for="adtitle">Ad Title</label>
                    </td>
                    <td>
                        <textarea id="title" class="txt1" name="title" placeholder="Mention the features of your product" required rows="8" cols="70" style="color: rgb(0, 0, 36);"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label id="descr" for="description">Description</label>
                    </td>
                    <td>
                        <textarea id="descr" class="txt2" name="descr" placeholder="Include condition, features and reason for selling" required rows="8" cols="70" style="color: rgb(0, 0, 36);"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label id="price" for="setprice">Set Price</label>
                    </td>
                    <td>
                        <textarea id="price" class="txt3" name="price" placeholder="&#8377;" required style="color: rgb(0, 0, 36);" rows="1"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label id="img" for="file">Add image of your product</label>
                    </td>
                    <td>
                        <input type="file" name="file" id="file" class="form-control" required style="overflow: hidden;">
                    </td>
                </tr>
            </table>
            <div class="submit" style="background-color: rgb(0, 0, 36);">
                <input class="posttext" type="submit" name="submit" id="submit" value="POST NOW" class="btn btn-success">
            </div><br>
        </form>
    </div>
    <footer>
        <div>
            DEAL IT &#169; 2020
        </div>
    </footer>
</body>

</html>

<?php
// session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/db_conn.php';

    $category = $_POST["category"];
    $title = $_POST["title"];
    $descr = $_POST["descr"];
    $price = $_POST["price"];
    // $image = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
    $image = $_FILES['file']['name'];
    $dst = "./img/" . $image;
    $dst1 = "img/" . $image;
    move_uploaded_file($_FILES["file"]["tmp_name"], $dst);
    $sql = "INSERT INTO sellform (email, category, title, description, price, image, date) VALUES ('$uname', '$category', '$title', '$descr', '$price', '$dst1', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script> alert('Successfully Uploaded'); </script>";
        $_SESSION['email'] = $uname;
        header("location: index.php");
    } else {
        echo "<script> alert('Error! Could not upload'); </script>";
    }
}
?>