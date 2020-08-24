<?php
    $dbname="WebBank";
    $dbuser="root";
    $dbpass="root";
    $dbport=8889;
    $dbhost="localhost";

    $link=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport) or die (mysqli_connect_error());
    $result=mysqli_query($link,"set names UTF8");
    // var_dump($link);

?>