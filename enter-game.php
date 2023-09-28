<?php
    include("db.php");
    $date=date("Y-m-d");
    $date_and_time=date("Y-m-d H:i:s");
    $query=mysqli_query($con,"select * from games");
    while($res=mysqli_fetch_array($query))
        {
            echo "Mohit";
            $game_id=$res['id'];
            mysqli_query($con,"insert into game_play(game_id,date,date_and_time) values('$game_id','$date','$date_and_time')");
        }
?>