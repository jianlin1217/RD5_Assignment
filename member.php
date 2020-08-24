<?php
session_start();
require_once("connectDB.php");
if(isset($_POST['smoney']))
{
    echo "存錢囉";
}
// echo isset($_POST['gmoney']);
// if(isset($_POST['gmoney']))
// {
//     echo "提款羅";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>網銀管理系統</title>
</head>

<body>
    <?php require("header.php");?>
    <form method="post">
        <div id="d1" name="s">
            <label for="moneysave">請輸入欲儲存的金額</label>
            <input id="moneysave" name="smoney" type="number">
            <button class="btn btn-primary">確定送出</button>
        </div>
        <div id="d2" name="g">
            <label for="moneyget">請輸入欲提出的金額</label>
            <input id="moneyget" name="gmoney" type="number">
            <button class="btn btn-danger">確定送出</button>
        </div>
        <div id="d3" name="askm">
            <label for="moneyask">餘額還剩下<?=$_SESSION['canUseMoney']?></label>
        </div>
        <div id="d4" name="askd">
            <label for="detailask">明細</label>
        </div>
   </form>
    <script>


        $("#save").click(function(){
            // alert("存錢");
            $("#d1").show();
            $("#d2").hide();
            $("#d3").hide();
            $("#d4").hide();
        })
        $("#get").click(function(){
            // alert("提款");
            $("#d2").show();
            $("#d1").hide();
            $("#d3").hide();
            $("#d4").hide();
        })
        $("#askMoney").click(function(){
            // alert("查詢餘額");
            $("#d3").show();
            $("#d2").hide();
            $("#d1").hide();
            $("#d4").hide();
        })
        $("#askDetails").click(function(){
            // alert("查詢明細");
            $("#d4").show();
            $("#d2").hide();
            $("#d3").hide();
            $("#d1").hide();
        })


    </script>
</body>

</html>