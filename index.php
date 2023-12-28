<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card{
            padding: 0;
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <?php
        require_once "config.php";
        $sql = "SELECT * FROM movie ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo"
        <div class='container-box'>
            <div class='row'>
        ";
        while($row = mysqli_fetch_assoc($result)) {
            echo"
                    <div class='card' style='width: 15rem; margin: 20px 12px;'>
                        <img style = 'width: 100%;' src='data:image;base64,".base64_encode($row['image'])."'>
                        <div class='card-body'>
                                <h5 class='card-title'>".$row["movie_name"]."</h5>
                                <p class='card-text'>".$row["release_date"]."</p>
                        </div>
                    </div>
            ";
        }
        echo"
            </div>
        </div>
        ";
        }
        else {
        echo "0 results";
        }
        mysqli_close($conn);
    ?>

</body>
</html>