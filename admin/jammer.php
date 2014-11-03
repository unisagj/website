<?php 
    session_start();

    if(!isset($_GET['id']) || $_GET['id'] == "")
        header('Location: admin.php');

    $code = $_GET['id'];

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
                    <?php
                            $sql = "SELECT * FROM `jammers` WHERE `ID_J` = ".$code."";
                            $result = mysql_query($sql) or die("error");
                            $row=mysql_fetch_array($result);
                    ?>
                    <h3 class="block-title"><?php echo $row['USERNAME']; ?></h3>
                    <div class="block-content">
                        Mail: <?php echo $row['MAIL']; ?><BR />
                        Attivo: <?php if($row['STATUS']) echo "Si"; else echo "No"; ?><BR />
                        Presenza: <?php if($row['PRESENCE']) echo "Si"; else echo "No"; ?><BR />
                        Team: <?php if($row['ID_T'] == null) echo "No"; 
                                    else{
                                        //query
                                    }
                                    ?><BR /><BR />
                        <?php echo '<a href="delete.php?id='.$code.'">Cancella</a>'; ?> - <?php echo '<a href="presence.php?id='.$code.'">Presenza</a>'; ?>
                    </div>
                </div>                  
            </section>
        </div>
        <!--INCLUDE FOOTER -->
        <footer ng-include='"/partials/footer.html"'></footer>
        
    </body>
</html>