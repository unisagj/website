<?php session_start(); ?>

                <?php
                    if(isset($_SESSION["activation"])){
                        if($_SESSION["activation"] == "attivato"){
                ?>
                            <div class="block">
                                <h3 class="block-title">Account Attivato</h3>
                                <div class="block-content">                                     
                                     Account atttivato correttamente
                                </div>                        
                            </div>
                    <?php
                        }
                        if($_SESSION["activation"] == "gia_attivato"){
                    ?>
                            <div class="block">
                                <h3 class="block-title">Errore</h3>
                                <div class="block-content">                                     
                                     Account Gi&agrave; Attivato
                                </div>                        
                            </div>
                    <?php
                        }
                        if($_SESSION["activation"] == "codice_sbagliato"){
                    ?>
                            <div class="block">
                                <h3 class="block-title">Errore</h3>
                                <div class="block-content">                                     
                                     Codice non valido
                                </div>                        
                            </div>
                    <?php 
                        }
                    }
                    else{
                        header('Location: http://www.unisagj.it/');
                    }
                ?>