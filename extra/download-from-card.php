<?php 
    include("db.php");
    $upload_dir = "images/idcards/";  //implement this function yourself
    $img = $_POST['my_hidden'];
    $member_id = $_COOKIE['id'];
    $plan_id = $_POST['plan_id'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file_name=$_POST['file_name'];
    $file = $upload_dir.$file_name;
    $success = file_put_contents($file, $data);
    echo "<script>setTimeout(function(){window.location.href='success.php?plan_id=$plan_id';},1000);</script>";
    echo "<script>window.location.href='download.php?filename=$file_name'</script>";
?>