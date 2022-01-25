<?php
session_start();

if(isset($_SESSION["id"])){
    include("connexion.php");
    $id_enseignant = $_SESSION["id"];
     //passer données dans la session

     $requette1="SELECT *from enseignant where id_enseignant='$id_enseignant'";
     $requette2 = mysqli_query($link,$requette1);
     $requette3 = mysqli_fetch_assoc($requette2);
     $prenom = $requette3['prenom_enseignant'];
     $nom=$requette3['nom_enseignant'];
     $email =$requette3['email'];
     $code = $requette3['code'];
     $photo=$requette3['photo'];

    if(isset($_GET['id_stage'])){
     $id_stage = $_GET['id_stage'];

     // trouver les information sur le stage 
     $requetteStage = "SELECT * FROM stage WHERE id_stage = $id_stage";
     $resultatStage = mysqli_query($link, $requetteStage);
     $dataStage = mysqli_fetch_assoc($resultatStage);

     $id_stage = $dataStage['id_stage'];
     $intitule_sujet = $dataStage['intitule_sujet'];
     $description_sujet = $dataStage['description_sujet'];
     
     $technologies = $dataStage['technologies'];
     $techs = explode(",",$technologies);
     $premiere_version = $dataStage['premiere_version'];
     $version_corrige = $dataStage['version_corrige'];
     $presentation = $dataStage['presentation'];
     $attestation_stage = $dataStage['attestation_stage'];
     $fiche_evalution = $dataStage['fiche_evalution'];
     $nom_encadrant = $dataStage['nom_encadrant'];
     $prenom_encardrant = $dataStage['prenom_encardrant'];
     $note = $dataStage['note'];
     
     $est_valide = $dataStage['est_valide'];
     $type = $dataStage['type'];
     $id_enseignant1 = $dataStage['id_enseignant'];
     $id_entreprise = $dataStage['id_entreprise'];
     $id_etudiant = $dataStage['id_etudiant'];
    //info de l'etudiant
    $requettestudent= "SELECT *from etudiant where id_etudiant in(select id_etudiant from stage where id_stage=$id_stage) ";
    $resultatstudent = mysqli_query($link,$requettestudent);
    $datastudent = mysqli_fetch_assoc($resultatstudent);
    $filiere =$datastudent['filiere'];
    $nom_etudiant = $datastudent['nom'];
    $prenom_etudiant = $datastudent['prenom'];
    $id_student = $datastudent['id_etudiant'];
     
         $requetteEntreprise = "SELECT * FROM entreprise WHERE id_entreprise = $id_entreprise";
         $resultatEntreprise = mysqli_query($link, $requetteEntreprise);
         $dataEntreprise = mysqli_fetch_assoc($resultatEntreprise);
         
             $nom_entreprise = $dataEntreprise['nom_entreprise'];
             $adresse_entreprise = $dataEntreprise['adresse'];
             $ville_entreprise = $dataEntreprise['ville'];
             $tel_entreprise = $dataEntreprise['tel'];
             //compteur
             $compteur = "select * from stage";
             $compt1 = mysqli_query($link,$compteur);
             $n1=mysqli_num_rows($compt1);
             //
             $compteur2 = "select * from stage where id_enseignant is null";
             $compt2 = mysqli_query($link,$compteur2);
             $n2=mysqli_num_rows($compt2);
             //
             $compteur3 = "select * from stage where id_enseignant =$id_enseignant";
             $compt3 = mysqli_query($link,$compteur3);
             $n3=mysqli_num_rows($compt3);
         
      
    }}
 
     else{
         header("location:login.php");

     }
     ?>

     <?php
        $file="select premiere_version from stage where id_stage=2";
        $resulte=mysqli_query($link,$file);

     
     
     
     ?>





















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_accueil_nav.css">
    <link rel="stylesheet" href="style_visualiser_stage.css">
    <link rel="stylesheet" href="right_section.css">
    <link rel="stylesheet" href="../main_style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div id="logo_container">
            <img src="../assets/local_assets/images/logo.png" alt="Logo" id="logo"  onClick="window.open('accueil_enseignant.php', '_self')">
        </div>
        <div id="nav_center">
            <div id="titre">
            <h3>Rechercher un stage</h3>
        </div>
            <div id="search_bar">
                
                <input type="text" name="search" placeholder="Rechercher">
                <img src="../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light">
            </div>
        </div>

            <div id="nav_right">
            <img src="../assets/local_assets/images/conv.png" alt="chat" class="rounded_icon_dark"  onClick="window.open('conv/conv.php', '_self')">
            <img src="../assets/local_assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
        </div>
   
    </nav>
    <div id="content">
        <aside id="left_side">
            <div id="left_navition">
                <li><a href="accueil_enseignant.php" class="nav_active">
                        <div></div><img src="../assets/local_assets/svg/home.svg" alt="">
                    </a></li>
                
                <li><a href="#">
                        <div></div><img src="../assets/local_assets/svg/share.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/local_assets/svg/about.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/local_assets/svg/settings.svg" alt="" onClick="window.open('../profile/profile.php', '_self')">
                    </a></li>
                    <li><a href="../deconnexion.php">
                        <div></div><img src="../assets/local_assets/svg/signout.svg" alt="">
                    </a></li>
            </div>
            <div id="modes">
                <p>Modes</p>
                <div id="mode_toggle">
                    <label>
                        <input class='toggle-checkbox' type='checkbox'></input>
                        <div class='toggle-slot'>
                            <div class='sun-icon-wrapper'>
                                <div class="iconify sun-icon" data-icon="feather-sun" data-inline="false"></div>
                            </div>
                            <div class='toggle-button'></div>
                            <div class='moon-icon-wrapper'>
                                <div class="iconify moon-icon" data-icon="feather-moon" data-inline="false"></div>
                            </div>
                        </div>
                    </label>
                </div>
                


            </div>
        </aside>
        <!--CONTENU CENTRALE-->
        <main>
            
                <div class="etudiant">
                    
                    <div class="seven1">
                    <img src="../assets/local_assets/images/user_icon.png" alt="user_icon" class="user_icon">
                    <h2 style="font-family: 'Raleway';"><?php echo $prenom_etudiant.' '. $nom_etudiant ?> </h2>
                    </div>
                   
                 
                 <div class=center>
                 <hr class='n'>
                 
                 <div class='infor'>
                     <p> <strong> Numero d'apogée</strong> : <?php echo $id_student ?></p>
                     <p> <strong>filiere </strong>: <?php echo $filiere?></p>
                     <p> <strong> Stage</strong> : <?php echo $type ?></p>
                     <?php 
                                 if($id_enseignant1== NULL){

                                    echo " <hr class='m'>
                                    <form action='' method='POST'>
                                    <button type='submit' name='encadrer' class='button'>Encadrer</button>

                                    </form>";
                                    if(isset($_POST['encadrer'])){
                                        $inserer = "UPDATE stage set id_enseignant=$id_enseignant WHERE id_stage=$id_stage ";
                                        $inserer1 = mysqli_query($link,$inserer);
                                        
                                        $notifDate = date("Y-m-d h:m:s");
                                        $notifMessage = "<b>Prof. $nom</b> a accepté de vous encadrer lors de votre stage";
                                
                                        // sender => 0: the sender is teacher; 1: the sender is student
                                        $requette = "INSERT INTO notification (content,date,id_enseignant,id_etudiant,sender)
                                                VALUES ('$notifMessage','$notifDate',$id_enseignant,$id_etudiant,0)";
                                        $resultat = mysqli_query($link, $requette);

                                        $requette = "INSERT INTO conversation (conversation_etudiant_id,conversation_enseignant_id)
                                        VALUES ($id_etudiant,$id_enseignant)";
                                        $resultat = mysqli_query($link, $requette);
                                
                                    }
                                  
                                }
                                ?>
                    <?php if($id_enseignant1!=NULL && $id_enseignant1==$id_enseignant){
                        echo "<hr class='m'>";

                       
                    if(isset($_POST['confirmer'])){
                        $note = $_POST['note'];
                        $validation = $_POST['valider'];
                        $sql1 = "update stage set note=$note,est_valide=$validation where id_stage=$id_stage ";
                        $sql2 = mysqli_query($link,$sql1);
                        if($note !=  NULL){
                            $notifDate = date("Y-m-d h:m:s");
                            $notifMessage = "<b>Prof. $nom</b> vous a attribuer la note $note/20 à votre stage";
                    
                            // sender => 0: the sender is teacher; 1: the sender is student
                            $requette = "INSERT INTO notification (content,date,id_enseignant,id_etudiant,sender)
                                    VALUES ('$notifMessage','$notifDate',$id_enseignant,$id_etudiant,0)";
                            $resultat = mysqli_query($link, $requette);
                        }
                        if($validation == 1){
                            $notifDate = date("Y-m-d h:m:s");
                            $notifMessage = "<b>Prof. $nom</b> vous a validé le stage pour la soutenance ";
                    
                            // sender => 0: the sender is teacher; 1: the sender is student
                            $requette = "INSERT INTO notification (content,date,id_enseignant,id_etudiant,sender)
                                    VALUES ('$notifMessage','$notifDate',$id_enseignant,$id_etudiant,0)";
                            $resultat = mysqli_query($link, $requette);
                        }



                        echo"<form action='' method='POST'>
                    <label><strong>Note attribué :</strong></label>
                    <input type='text' name='note' id='note' value='$note'><br>
                    <label><strong>Validation du stage pour la soutenance:</strong></label>
                    <select name='valider' id='note'>
                        <option value='1'>Validé</option>
                        
                        <option value='0'>Non validé</option>
                    </select>
                    
                    <button type='submit' class='button' name='confirmer'>Confirmer</button>
                    
                </form>";

                    }
                    else {echo"<form action='' method='POST'>
                    <label><strong>Note du stage :</strong></label><br>
                    <input type='text' name='note' id='note' placeholder='/20'><br>
                    <label><strong>Validation du stage pour la soutenance :</strong></label><br>
                    <select name='valider' id='valider'>
                        <option value='1'>Validé</option>
                        
                        <option value='0'>Non validé</option>
                    </select>
                    
                    <button type='submit' class='button' name='confirmer'>Confirmer</button>
                    
                </form>";
                    }}

                    
                     ?> 



                    </div>
                    
                 </div>
                </div>
                <div class="lefty">

                <div class="entreprise">
                <div class="seven">
                    <h2>Infos de l'entreprise</h2>
                    </div>
                    
                    <table>
                    
                        <tr>
                        
                            <th class="cont">Nom de l'entreprise </th>
                            <th>:</th>
                            <th class="conte"><?php echo $nom_entreprise ?> </th>
                        
                        </tr>
                        
                        <tr>
                            <th class="cont">Adresse de l'entreprise </th>
                            <th>:</th>
                            <th class="conte"><?php echo $adresse_entreprise ?></th>
                        </tr>
                        <tr>
                            <th class="cont">ville </th>
                            <th>:</th>
                            <th class="conte"><?php echo $ville_entreprise ?></th>
                        </tr>
                        <tr>
                            <th class="cont">Telephone</th>
                            <th>:</th>
                            <th class="conte"><?php echo $tel_entreprise ?></th>
                        </tr>
                        <tr>
                            <th class="cont">Nom et prénom de l'encadrant</th>
                            <th>:</th>
                            <th class="conte"><?php echo $nom_encadrant.' '. $prenom_encardrant ?></th>
                        </tr>
                    </table>
                        
                
                </div>
                <div class="stage">
                    <div class="seven">
                    <h2>Infos relatives au stage</h2>
                    </div>
                    <Div class="description"> 
                    <h3 class='titles'>Description du Sujet : </h3>
                    <p style=" text-align:justify;"><?php echo $description_sujet ?></p>
                    </Div>
                    <div class="description1">
                        <h3 class="titles">Technologies utilisées :</h3>
                        
                        
                           <?php
                           foreach($techs as $tech){ echo " <div class='techs'> ".$tech." </div>";
                       
                           
                               
                           }
                            ?> 

                    </div>
                    <div class="description1">
                    <table>
                        <form action="" method="POST">
                        
                            
                        
                        
                        <tr>
                            <th class="cont">Première version du rapport</th>
                            <th>:</th>
                            <?php
                                $check ="select premiere_version from stage where id_stage='$id_stage'";
                                $check_result = mysqli_query($link,$check);
                                $check_values=mysqli_fetch_assoc($check_result);
                                    if($check_values && $check_values["premiere_version"]!=null) {
                                        echo "<th class='conte'><button type='submit' name='first' class='button1'><a href='../assets/assets/versions_initials/$premiere_version' download>Télécharger</button></th>";}
                                    else echo"<th>En attente de dépot...</th>";
                                
                                ?>
                                
                                
                        </tr>
                        <tr>
                            <th class="cont">Version corrigée du rapport</th>
                            <th>:</th>
                            <?php
                                $check ="select version_corrige from stage where id_stage='$id_stage'";
                                $check_result = mysqli_query($link,$check);
                                $check_values=mysqli_fetch_assoc($check_result);
                                    if($check_values && $check_values["version_corrige"]!=null) {
                                        echo "<th class='conte'> <button type='submit' name='second' class='button1'><a href='../assets/assets/versions_corriges/$version_corrige' download>Télécharger </button></th>";}
                                    else echo"<th>En attente de dépot...</th>";
                                
                                ?>
                        </tr>
                        
                        <tr>
                            <th class="cont">Présentation</th>
                            <th>:</th>
                            <?php
                                $check ="select presentation from stage where id_stage='$id_stage'";
                                $check_result = mysqli_query($link,$check);
                                $check_values=mysqli_fetch_assoc($check_result);
                                    if($check_values && $check_values["presentation"]!=null) {
                                        echo "<th class='conte'> <button type='submit' name='third' class='button1'><a href='../assets/assets/presentations/$presentation' download>Télécharger </button></th>";}
                                    else echo"<th>En attente de dépot...</th>";
                                
                                ?>
                        </tr>
                        <tr>
                            <th class="cont">Attestation</th>
                            <th>:</th>
                            <?php
                                $check ="select attestation_stage from stage where id_stage='$id_stage'";
                                $check_result = mysqli_query($link,$check);
                                $check_values=mysqli_fetch_assoc($check_result);
                                    if($check_values && $check_values["attestation_stage"]!=null) {
                                        echo "<th class='conte'> <button type='submit' name='fourth' class='button1'><a href='../assets/assets/attestations_stages/$attestation_stage' download>Télécharger </button></th>";}
                                    else echo"<th>En attente de dépot...</th>";
                                
                                ?>
                        </tr>
                        <tr>
                            <th class="cont">Fiche d'évaluation</th>
                            <th>:</th>
                            <?php
                                $check ="select fiche_evalution from stage where id_stage='$id_stage'";
                                $check_result = mysqli_query($link,$check);
                                $check_values=mysqli_fetch_assoc($check_result);
                                    if($check_values && $check_values["fiche_evalution"]!=null) {
                                        echo "<th class='conte'> <button type='submit' name='fourth' class='button1'><a href='../assets/assets/fiches_evaluations/$fiche_evalution' download>Télécharger </button></th>";}
                                    else echo"<th>En attente de dépot...</th>";


                                
                                ?>
                        </tr>
                        
                        </form>
                    </table>
                    </div>

                </div>
                





            </div>

        </main>
        <aside id="right_side">
            <div id="hello_container"  onClick="window.open('../profile/profile.php', '_self')">
                <p>Bienvenue,Pr <br><b><?php echo  $nom ?></b></p>
                <img src="../assets/assets/images/<?php echo $photo?>" alt="user_icon">
            </div>
    
            <div id="overview_container">
                <div class="overview">
                    <p class="overview_name">Nombre des stages :</p>
                    <b class="overview_data"><?php echo $n1?></b>
                </div>
    
                <div class="overview">
                    <p class="overview_name">Total des encadrés :</p>
                    <b class="overview_data"><?php echo ($n1-$n2)?></b>
                </div>
    
                <div class="overview">
                    <p class="overview_name">Total des non encadrés :</p>
                    <b class="overview_data"><?php echo $n2?></b>
                </div>
    
                <div class="overview">
                    <p class="overview_name">Que vous encadrés</p>
                    <b class="overview_data"><?php echo $n3?></b>
                </div>
            </div>
    
            <div id="activity_container">
                <p id="activity_title">Flux  <b>d'activité</b></p>
                <div id="feeds_container">
                <div class="feed">
                        <img src="../assets/local_assets/images/face1.png" alt="user_icon">
                        <div class="text_container">
                            <p class="content"><b>Omar defaoui</b> a deposer la version corrigé du rapport</p>
                            <p class="time"> 4 jours </p>
                        </div>
                    </div>
                    <div class="feed">
                        <img src="../assets/local_assets/images/face2.png" alt="user_icon">
                        <div class="text_container">
                            <p class="content"><b>Hassan ayoub benasser </b> a Déposer la présentation</p>
                            <p class="time">16 jours</p>
                        </div>

                </div>
                <a href="#" id="see_more">See more</a>
            </div>
        </aside>



    </div>
</body>
</html>