<?php
    session_start();
    require("connectDB.php");
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>線上網銀系統-Chungyo</title>
</head>

<body>
    <div class="container">
        <h1>註冊</h1>
        <form method="post" action="">
            <div class="form-group row">
                <label for="act" class="col-4 col-form-label">帳號(Account)2~20碼，開頭需為英文</label>
                <div class="col-8">
                    <input id="act" name="act" type="text" class="form-control" pattern="\D{1}\w{1,19}">
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd" class="col-4 col-form-label">密碼(Password)6~20碼</label>
                <div class="col-8">
                    <input id="pwd" name="pwd" type="text" class="form-control" pattern="\w{6,20}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Phone" class="col-4 col-form-label">手機(Telephone)</label>
                <div class="col-8">
                    <input id="Phone" name="Phone" type="text" class="form-control" pattern="\d{10}|0[2-8][2-9]*[6]*-\d{7}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">信箱(Email)</label>
                <div class="col-8">
                    <input id="email" name="email" type="text" class="form-control" pattern="\w+[-]*\w+@+\w+[.]*\w+[.]*\w+[.]*\w+">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-4 col-form-label">居住地(Address)</label>
                <div class="col-8">
                    <input id="address" name="address" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <input name="reg" id="register" value="送出" type="submit" class="btn btn-primary"></input>
                    <button name="submit" id="backIndex" type="button" class="btn btn-success">返回首頁</button>
                </div>
            </div>
        </form>
        <?php
                if(isset($_POST['reg']))
                {
                    $uName=$_POST['act'];
                    $uPass=$_POST['pwd'];
                    $uAddress=$_POST['address'];
                    $uPhone=$_POST['Phone'];
                    $uMail=$_POST['email'];
                    $regText=<<<end
                    insert into memberList
                    (memberName,memberPass,address,phone,email)
                    VALUES
                    ("$uName","$uPass","$uAddress","$uPhone","$uMail");
                    end;
                    // echo $regText;
                    // 存到資料庫中
                    $result=mysqli_query($link,$regText);
                    $getId=<<<end
                    select memberID from memberList where memberName="$uName";
                    end;
                    //取得系統建立的id
                    // echo $getId."123<br>";
                    $result2=mysqli_query($link,$getId);
                    $row=mysqli_fetch_assoc($result2);
                    $newmId=$row['memberID'];
                    // echo $newmId;
                    //創立戶頭
                    $newAccount=<<<end
                    insert into memberAccount (memberId,money) VALUES ($newmId,0);
                    end;
                    $result3=mysqli_query($link,$newAccount);
                    ?>
                    <script>
                        alert("註冊成功！");
                        location.href="index.php";
                    </script>
                <?php   
                    }
                ?>
    </div>
    <script>
        $("#register").click(function() {
            // alert("OHOH");

        });
        $("#backIndex").click(function() {
            // alert("HOHO");
            location.href = "index.php";
        })
    </script>
</body>

</html>