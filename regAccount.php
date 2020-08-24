<?php
session_start();

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
        <form>
            <div class="form-group row">
                <label for="act" class="col-4 col-form-label">帳號(Account)</label>
                <div class="col-8">
                    <input id="act" name="act" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd" class="col-4 col-form-label">密碼(Password)</label>
                <div class="col-8">
                    <input id="pwd" name="pwd" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="Phone" class="col-4 col-form-label">手機</label>
                <div class="col-8">
                    <input id="Phone" name="Phone" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">信箱</label>
                <div class="col-8">
                    <input id="email" name="email" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-4 col-form-label">居住地</label>
                <div class="col-8">
                    <input id="address" name="address" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" id="register" type="button" class="btn btn-primary">Submit</button>
                    <button name="submit" id="backIndex" type="button" class="btn btn-primary">返回首頁</button>
                </div>
            </div>
        </form>

    </div>
    <script>
        $("#register").click(function(){
            // alert("OHOH");
        });
        $("#backIndex").click(function(){
            // alert("HOHO");
            location.href="index.php";
        })
    </script>
</body>

</html>