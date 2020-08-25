<?php
    session_start();
    require("connectDB.php");
    //餘額
    $_SESSION['canUseMoney']=0;
    $nowId=$_SESSION['nowMemberId'];
    // echo $_SESSION['nowMemberId'];

    $commandText=<<<End
    select money from memberAccount where memberId = $nowId;
    End;
    // echo $commandText;
    $result=mysqli_query($link,$commandText);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['canUseMoney']=$row['money'];
    // echo $canUseMoney;
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">歡迎！ <?=$_SESSION['NowLogin']?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <form method="post" action="member.php">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" id="save" name="s" href="#">存款</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="get" name="g" href="#">提款</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" id="askMoney" name="askm" href="#">查詢餘額</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" id="askDetails" name="askd" href="#">查詢明細</a>
            </li>
            <li class="nav-item">
              <p class="navbar-brand">餘額：
                <?php 
                  if($_SESSION['canUseMoney']>1000)
                  {
                    for($i=0;$i<strlen(floor($_SESSION['canUseMoney']))-2;$i++)
                    echo "*";
                    if(($_SESSION['canUseMoney']%100)<10)
                    echo "0".$_SESSION['canUseMoney']%100;
                    else
                    echo $_SESSION['canUseMoney']%100;
                  }
                  else
                  {
                    echo $_SESSION['canUseMoney'];
                  } 
                ?>
              </p>
            </li>
            <li class="nav-item">
              <a id="logout" class="nav-link" href="index.php">登出</a>
            </li>
          </ul>
        </div>
   </form>
</nav>
