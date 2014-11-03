<?php 
    session_start();

    include '../conf/db_data.inc.php';

    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == false)
        header('Location: http://www.unisagj.it/');
?>

<!DOCTYPE html>
<html>
    <head>
        
        <!-- BLOAT -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="description" content="Sito web dell'unisa game jam">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>UNISA Game Jam</title>           

        <!-- CSS -->
            <!-- NORMALIZER -->
            <link rel="stylesheet" type="text/css" href="/css/normalize.css">

            <!-- AWESOME FONT AWESOME -->
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

            <!-- STYLE -->
            <link rel="stylesheet" type="text/css" href="/css/style.css">
        
        <!-- JAVASCRIPT -->            
            
            <!--ANGULAR -->
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    </head>
    
    <body ng-app="">
        
        
        <div class="frame">
            <section class="content" style="background-color: #f00; padding-top: 10%;">
                <div class="block">
                    <h3 class="block-title">Lista Jammers</h3>
                    <div class="block-content">
                        <ul>
                        <?php
                            $sql = "SELECT `ID_J`, `USERNAME` FROM `jammers`";
                            $result = mysql_query($sql) or die("error");

                            while($row=mysql_fetch_array($result)){
                                echo '<li><a href="jammer.php?id='.$row['ID_J'].'">'.$row['USERNAME'].'</a></li>';
                            }
                        ?>
                        </ul>
                    </div>               
                </div>     
            </section>
        </div>
        <!--INCLUDE FOOTER -->
        <footer ng-include='"/partials/footer.html"'></footer>
        
    </body>
</html>