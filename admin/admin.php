<?php 
    session_start();

    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == false)
        header('Location: http://www.unisagj.it/');
?><!DOCTYPE html>
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

        <!-- INCLUDE HEADER -->        
        <div class="frame">
            <section class="content">
                <div class="block">
                    <h3 class="block-title">Admin Console</h3>
                    <div class="block-content">
                        <ul>
                            <li><a href="jammerslist.php">Lista Jammers</a></li>
                            <li><a href="insertobj.php">Inserisci Oggetti Per L'Estrazione</a></li>
                            <li><a href="start.php">Assegna Oggetti</a></li>
                        </ul>
                    </div>                         
                </div>                        
            </section>
        </div>
        <!--INCLUDE FOOTER -->
        <footer ng-include='"/partials/footer.html"'></footer>
        
    </body>
</html>