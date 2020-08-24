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
    <title>線上網銀系統-登入</title>
</head>

<body>
<div class="container">
    <h1>網路銀行登入</h1>
    <form>
      <div class="form-group row">
        <label for="act" class="col-4 col-form-label">帳號(Account)</label> 
        <div class="col-8">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-address-card"></i>
              </div>
            </div> 
            <input id="act" name="act" type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="pwd" class="col-4 col-form-label">密碼(Password)</label> 
        <div class="col-8">
          <input id="pwd" name="pwd" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-4"></label> 
        <div class="col-8">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="remember"> 
            <label for="checkbox_0" class="custom-control-label">記住帳號</label>
          </div>
        </div>
      </div> 
      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
</div>

</body>

</html>