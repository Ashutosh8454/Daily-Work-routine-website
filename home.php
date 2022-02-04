<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily-To-Do_list</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/f78ee686fc.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        <h2>TODAY READER TOMORROW LEADER</h2>
    </div>

    <div id="form">
        <h2>Enter Today Works for Better output</h2>
        <form action="insert.php" method="post" name="works">

            <input type="date" name="date" class="input-data" placeholder=" Enter Date.......">

            <div id="sub-work">
                <div id="sub-work-f1">
                    <input type="text" name="sub" class="input-data" placeholder=" Enter sub.....">
                    <input type="text" name="time" class="input-data" placeholder=" Enter time.......">
                    <input type="text" name="hour" class="input-data" placeholder=" Enter hour.......">
                </div>
                <input id="text-area" type="text" name="work" placeholder="Enter Today work">
            </div>
            <button type="submit" name="submit" value="submit" class="btn">Add</button>
        </form>
    </div>

    <div id="check">
        <form id="check-form" action="home.php" method="post">
            <h3>Check Your Today Task : </h3>
            <input id="check-date-input" type="date" name="checkdate" value="date">
            <button class="btn" id="search-btn" type="submit" name="search" value="submit">Search <span id="search-i"> <i class="fas fa-search"></i></span></button>
        </form>
    </div>

    <?php

    if(isset($_POST['date']))
    {
         $server="localhost";
         $username="root";
         $password="";

         $con=mysqli_connect($server,$username,$password);

         if(!$con)
         {
            die("Connection to database faild");
         }

        }
        $mysqli = new mysqli("localhost", "root", "", "dailywork");
        $checkdate=$_POST['checkdate'];
        $result = mysqli_query($mysqli, "SELECT * FROM daily where date='$checkdate'");
            
        // $row = mysqli_fetch_array($result);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //  echo count($rows);
         
        foreach ($rows as $key) {
      ?>
        <div id="result-list">

            <div id="ot-date">
                Date:
                <?php
                  echo $key['date'];
                ?>
            </div>
            <div id="ot-sub">
                <?php
                echo '<p>'.'Subject : '.$key['sub'].'</p>';
                echo '<p>'.'Time-line: '.$key['time'].'</p>';
                echo '<p>'.'Study Hour'.$key['hour'].'</p>';
                ?>
            </div>
            <div id="ot-work">
                Work : 
                <?php
                echo $key['work'];
                ?>
            </div>


        </div>
        <?php
        }
   ?>

</body>

</html>