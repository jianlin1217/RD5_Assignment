<?php
    session_start();
    require_once("connectDB.php");
    //各項儲存
    $_SESSION['NowLogin']=null;     //現在登入的是誰
    $_SESSION['nowMemberId']=null;  //現在登入的id
    $_SESSION['mName']=Array();     //資料庫中有的使用者名稱
    $_SESSION['mPass']=Array();     //資料庫中有的使用者密碼
    $_SESSION['mId']=Array();       //資料庫存的使用者編號



    $commandText=<<<End
    select * from memberList;
    End;
    $result = mysqli_query($link,$commandText);
    // var_dump($result);
    while($row=mysqli_fetch_assoc($result))
    {
            Array_push($_SESSION['mName'],$row["memberName"]);
            Array_push($_SESSION['mPass'],$row["memberPass"]);
            Array_push($_SESSION['mId'],$row["memberID"]);
    }
    // var_dump($_SESSION['mId']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>線上網銀系統-Chungyo</title>
</head>

<body>
    <div>
        <h1>線上網銀系統</h1>
    </div>
    <div>
        <button type="button" class="btn btn-success" id="btnLogin">登入</button>
        <button type="button" class="btn btn-primary" id="btnReg">註冊</button>
    </div>
</body>
<script>
    $("#btnLogin").on("click",function(){
        // alert("登入");
        location.href="login.php";
    })
    $("#btnReg").on("click",function(){
        // alert("註冊");
        location.href="regAccount.php";
    })
</script>
</html>