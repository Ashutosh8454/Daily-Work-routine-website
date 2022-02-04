<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #goto a {
            padding: 12px 20px;
            background-color: rgb(12, 12, 61);
            color: white;
        }
    </style>

</head>

<body>



    <?php


    if (isset($_POST['date'])) {
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if (!$con) {
            die("Connection to database faild");
        }
        //  else{
        //        echo "connected";
        //  }

        $date = $_POST['date'];
        $sub = $_POST['sub'];
        $time = $_POST['time'];
        $hour = $_POST['hour'];
        $work = $_POST['work'];

        $sql = "INSERT INTO `dailywork`.`daily` (`date`, `sub`, `time`, `hour`, `work`) VALUES ('$date', '$sub', '$time', '$hour', '$work');";

        if ($con->query($sql) == true) {

            unset($date);
            unset($sub);
            unset($time);
            unset($hour);
            unset($work);


            echo '<h3>' . "Works add to Work list:" . '</h3>';
        } else {
            echo "Error" . $sql . "<br>" . $con->error;
        }
        $con->close();
    }
    ?>

    <div id="goto">
        <a href="home.php">Go To Home Page</a>
    </div>

</body>

</html>