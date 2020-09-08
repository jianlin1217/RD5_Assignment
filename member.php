<?php
session_start();
require("connectDB.php");
$memberId=$_SESSION['nowMemberId'];

//現在時間
date_default_timezone_set("Asia/Taipei");
$nowDate;

//表單是否重複送出
// $formflag=0;
// echo $formflag."<br>";
//快速存提款
for($i=1;$i<=6;$i++)
{
    if(isset($_POST['smoney'.$i]))
    {
        $temp = $_SESSION['canUseMoney'] + ($i*1000);
        $savemoney = $i*1000;
        $mid = $_SESSION['nowMemberId'];
        $commendTextsave = <<<end
        UPDATE memberAccount SET money = $temp where memberId=$mid;
        end;
        mysqli_query($link, $commendTextsave);
        $nowDate = date("Y-m-d H:i:s");
        // echo $nowDate;
        $commendTextdetail = <<<end
        insert into historyList (transactionMoney,memberId,addOrsub,transactionDate,remain) 
        values ($savemoney,$mid,"存入","$nowDate",$temp);
        end;
        mysqli_query($link, $commendTextdetail);
    }
    if(isset($_POST['gmoney'.$i]))
    {
        $temp = $_SESSION['canUseMoney'] - ($i*1000);
        $savemoney = $i*1000;
        $mid = $_SESSION['nowMemberId'];
        $commendTextsave = <<<end
        UPDATE memberAccount SET money = $temp where memberId=$mid;
        end;
        mysqli_query($link, $commendTextsave);
        $nowDate = date("Y-m-d H:i:s");
        // echo $nowDate;
        $commendTextdetail = <<<end
        insert into historyList (transactionMoney,memberId,addOrsub,transactionDate,remain) 
        values ($savemoney,$mid,"提出","$nowDate",$temp);
        end;
        // echo $commendTextdetail;
        mysqli_query($link, $commendTextdetail);
    }
}

//存款
    if (isset($_POST['btnsave'])) {
        // echo "存錢囉";
        // echo $formflag.":save";
        // echo $_POST['smoney'];
        if($_POST['smoney']<=0)
        {
            ?>
            <script>
                alert("存款金額不得小於零或等於零！");
            </script>
            <?php
        }
        {
            $temp = $_SESSION['canUseMoney'] + $_POST['smoney'];
            $savemoney = $_POST['smoney'];
            $mid = $_SESSION['nowMemberId'];
            $commendTextsave = <<<end
            UPDATE memberAccount SET money = $temp where memberId=$mid;
            end;
            mysqli_query($link, $commendTextsave);
            $nowDate = date("Y-m-d H:i:s");
            // echo $nowDate;
            $commendTextdetail = <<<end
            insert into historyList (transactionMoney,memberId,addOrsub,transactionDate,remain) 
            values ($savemoney,$mid,"存入","$nowDate",$temp);
            end;
            mysqli_query($link, $commendTextdetail);
            unset($_POST['btnsave']);
            $formflag=0;
        }
    }
//提款
if (isset($_POST['btnget'])){
    // echo "提款羅";
    // echo $formflag.":get";
    if($_POST['gmoney']<0)
    {
        ?>
        <script>
            alert("提款金額不可為負數!");
        </script>
        <?php
    }
    else if($_POST['gmoney']>$_SESSION['canUseMoney'])
    {
        ?>
        <script>
            alert("提款金額不可大於餘額");
        </script>
        <?php
    }
    else if($_POST['gmoney']>20000)
    {       
        ?>
        <script>
            alert("提款金額不可大於20000");
        </script>
         <?php
    }
    else if(($_POST['gmoney']%100)!=0)
    {
        ?>
        <script>
            alert("提款請以一百為單位!");
        </script>
         <?php
    }
    else
    {
        $temp = $_SESSION['canUseMoney'] - $_POST['gmoney'];
        $getmoney = $_POST['gmoney'];
        $mid = $_SESSION['nowMemberId'];
        $commendTextget = <<<end
        UPDATE memberAccount SET money = $temp where memberId=$mid;
        end;
        mysqli_query($link, $commendTextget);
        $nowDate = date("Y-m-d H:i:s");
        $commendTextdetail = <<<end
        insert into historyList (transactionMoney,memberId,addOrsub,transactionDate,remain) 
        values ($getmoney,$mid,"提出","$nowDate",$temp);
        end;
        // echo $commendTextdetail;
        mysqli_query($link, $commendTextdetail);
        unset($_POST['btnget']);
        $formflag=0;
    }
}
//抓出明細
// echo $memberId."123";
$commendTextDetail=<<<end
SELECT * FROM `historyList` WHERE memberId = $memberId;
end;
// echo $commendTextDetail;
$dResult=mysqli_query($link,$commendTextDetail);


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
    <?php require("header.php"); ?>
    <script>
 //清除歷史避免重複送出表單
    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }
        <?php
        //設立flag 讓沒登入的無法直接透過網址進入
        $logflag = false;
        $accessM = $_SESSION['mId'];
        for ($i = 0; $i < count($_SESSION['mId']); $i++) {
            // echo  $_SESSION['nowMemberId']."<br>";
            // echo   $accessM[$i]."<br>";
            if ($accessM[$i] == $_SESSION['nowMemberId']) {
                $logflag = true;
                // echo "有相符";
            }
        }
        if ($logflag != true) {
        ?>
            alert("請先登入");
            location.href="index.php";
        <?php
        }
        ?>
    </script>

    <!--表單送出-->

    <form method="post" id="form">
        <div id="d1" name="s">
            <label for="moneysave">請輸入欲儲存的金額</label>
            <br>
            <p>快速存款</p>
            <button class="btn btn-success"  name="smoney1" >1000</button>
            <button class="btn btn-success"  name="smoney2" >2000</button>
            <button class="btn btn-success"  name="smoney3" >3000</button>
            <button class="btn btn-success"  name="smoney4" >4000</button>
            <button class="btn btn-success"  name="smoney5" >5000</button>
            <button class="btn btn-success"  name="smoney6" >6000</button>
            <br>
            <br>
            <input id="moneysave" name="smoney" type="number">
            <button id="btnsave" class="btn btn-primary" name="btnsave">確定送出</button>
        </div>
        <div id="d2" name="g">
            <label for="moneyget">請輸入欲提出的金額</label>
            <br>
            <p>快速提款</p>
            <button class="btn btn-danger"  name="gmoney1" >1000</button>
            <button class="btn btn-danger"  name="gmoney2" >2000</button>
            <button class="btn btn-danger"  name="gmoney3" >3000</button>
            <button class="btn btn-danger"  name="gmoney4" >4000</button>
            <button class="btn btn-danger"  name="gmoney5" >5000</button>
            <button class="btn btn-danger"  name="gmoney6" >6000</button>
            <br>
            <br>
            <input id="moneyget" name="gmoney" type="number">
            <button id="btnget" class="btn btn-primary" name="btnget">確定送出</button>
        </div>
        <!-- <div id="d3" name="askm">
            <label id="moneyask" for="moneyask">餘額還剩下<?= $_SESSION['canUseMoney'] ?></label>
        </div> -->
        <div id="d4" name="askd">
            <label for="detailask">明細</label>
            <table>
                <tr>
                    <th>金額</th>
                    <th>收／支</th>
                    <th>交易日期</th>
                    <th>交易後餘額</th>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($dResult))
                    {
                ?>
                <tr>
                    <td><?=$row['transactionMoney']?></td>
                    <td><?=$row['addOrsub']?></td>
                    <td><?=$row['transactionDate']?></td>
                    <td><?=$row['remain']?></td>
                </tr>               
                <?php
                    }
                ?>
            </table>
        </div>
    </form>
    <script>
        //畫面隱藏跟顯示
        $("#save").click(function() {
            // alert("存錢");
            $("#d1").show();
            $("#d2").hide();
            $("#d3").hide();
            $("#d4").hide();
        })
        $("#get").click(function() {
            // alert("提款");
            $("#d2").show();
            $("#d1").hide();
            $("#d3").hide();
            $("#d4").hide();
        })
        let flag =0;
        $("#askMoney").click(function() {
            // alert("查詢餘額");
            
            if(flag==0)
            {
                $("#askMoney").text("隱藏餘額");
                $("#remain").text("餘額："+"<?=$_SESSION['canUseMoney']?>");
                flag=1;
            }
            else
            {
                $("#askMoney").text("顯示餘額");
                let money="<?php if($_SESSION['canUseMoney']>1000) {for($i=0;$i<strlen(floor($_SESSION['canUseMoney']))-2;$i++)echo "*";if(($_SESSION['canUseMoney']%100)<10)echo "0".$_SESSION['canUseMoney']%100;else echo $_SESSION['canUseMoney']%100;}else {echo $_SESSION['canUseMoney'];} ?>";
                $("#remain").text("餘額："+money);
                flag=0;
            }
        })
        $("#askDetails").click(function() {
            // alert("查詢明細");
            $("#d4").show();
            $("#d2").hide();
            $("#d3").hide();
            $("#d1").hide();
        })
    </script>
</body>

</html>