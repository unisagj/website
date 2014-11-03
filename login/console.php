<?php 
    session_start();

    include '../conf/db_data.inc.php';
    include '../conf/theme.php';

    if(isset($_SESSION["jammer"]))
        if ($_SESSION["jammer"] == "false") 
            header('Location: index.php');
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
                    <h3 class="block-title">User Console</h3>
                    <div class="block-content">
                        <?php
                            $sql = 'SELECT * FROM jammers WHERE ID_J = "'.$_SESSION['jammer'].'"';
                            $result = mysql_query($sql) or die("error");
                            $row=mysql_fetch_array($result);
                        ?>
                        <ul>
                            <li>Username: <?php echo $row['USERNAME']; ?></li>
                            <li>Mail: <?php echo $row['MAIL']; ?></li>
                            
                            <?php 
                                if($row['ID_T'] == 0){
                            ?>
                            <li><a href="maketeam.php">Crea Team</a></li>
                            <li><a href="selectteam.php">Partecipa in un Team</a></li>
                            <?php 
                                }else{
                                        $sql2 = 'SELECT * FROM teams WHERE ID_T='.$row['ID_T'].'';
                                        $row2 = mysql_fetch_array(mysql_query($sql2));
                                        ?>
                            <li>Team: <?php echo $row2['NAME']; ?></li>
                            <?php } ?>
                            <li>Tema: <?php echo $theme; ?></li>
                            <li>Oggetto: <?php $obj = mysql_fetch_array(mysql_query('SELECT * FROM objects WHERE ID_O='.$row2['ID_O'].'')); echo $obj[1]; ?></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>   
                    </div>
                </div>                         
            </section>
        </div>
        <!--INCLUDE FOOTER -->
        <footer ng-include='"/partials/footer.html"'></footer>
        
    </body>
</html>
