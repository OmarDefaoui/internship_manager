<?php
session_start();

if(isset($_SESSION["id"])){
    include("../connexion.php");
    $id_administrateur = $_SESSION["id"];
     //passer données dans la session

     $reqadmin="SELECT *from administrateur where id_administrateur='$id_administrateur'";
     $resultadmin = mysqli_query($link,$reqadmin);
     $admin = mysqli_fetch_assoc($resultadmin);
     $nom=$admin['nom'];
     $prenom = $admin['prenom'];
     $email =$admin['email'];
     $photo=$admin['photo'];

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
    $filiere =$datastudent['Filière'];
    $nom_etudiant = $datastudent['nom'];
    $prenom_etudiant = $datastudent['prenom'];
    $id_student = $datastudent['id_etudiant'];
     
         $requetteEntreprise = "SELECT * FROM entreprise WHERE id_entreprise = $id_entreprise and id_entreprise is not null";
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
    <link rel="stylesheet" href="css/style_accueil_nav.css">
    <link rel="stylesheet" href="css/style_visualiser_stage.css">
    <link rel="stylesheet" href="css/right_section.css">
    <link rel="stylesheet" href="../main_style1.css">
    <link rel="stylesheet" href="css/style_right_side_admin.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div id="logo_container">
            <img src="../assets/local_assets/images/logo.png" alt="Logo" id="logo" onClick="window.open('accueil_enseignant.php', '_self')">
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
            <img src="../assets/local_assets/images/conv.png" alt="chat" class="rounded_icon_dark">
            <img src="../assets/local_assets/images/notification.png" alt="notifications" class="rounded_icon_dark">
        </div>
   
    </nav>
    <div id="content">
        <aside id="left_side">
            <div id="left_navition">
                <li><a href=accueil_admin.php" class="nav_active">
                        <div></div><img src="../assets/local_assets/svg/home.svg" alt="" onClick="window.open('accueil_enseignant.php', '_self')">
                    </a></li>
               
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.gestionstage.rf.gd/" target="_blank">
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
                     <p> <strong>Filière </strong>: G.informatique</p>
                     <p> <strong> Stage</strong> : PFA</p>
                    
                    



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
                                        echo "<th class='conte'><button type='submit' name='first' class='button1'><a href='../assets/local_assets/test/$premiere_version' download>Télécharger</button></th>";}
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
                                        echo "<th class='conte'> <button type='submit' name='second' class='button1'><a href='../assets/local_assets/test/$version_corrige' download>Télécharger </button></th>";}
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
                                        echo "<th class='conte'> <button type='submit' name='third' class='button1'><a href='../assets/local_assets/test/$presentation' download>Télécharger </button></th>";}
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
                                        echo "<th class='conte'> <button type='submit' name='fourth' class='button1'><a href='../assets/local_assets/test/$attestation_stage' download>Télécharger </button></th>";}
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
                                        echo "<th class='conte'> <button type='submit' name='fourth' class='button1'><a href='../assets/local_assets/test/$fiche_evalution' download>Télécharger </button></th>";}
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
            <div id="hello_container" onClick="window.open('../profile/profile.php', '_self')">
                <p>Bienvenue</p>
                <img src="../assets/local_assets/images/user_icon.png" alt="user_icon">
            </div>


            <div id="right_container">
    
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
        
                
                </div>
                
                <div id="activity_container">

                    <div class="links">
                        <p class="titre">Rechercher les etudiant  :</p>
                        <a href="recherche par encadrant.php"><button class="bn632-hover bn23" class='b_rechercher'>Par encadrant</button></a>
                        <a href="recherche_etudiant_sans_encadrant.php"><button class="bn632-hover bn23" class='b_rechercher'>sans encadrant</button></a>
                        <a href="recherche_rapport_non_deposer.php"><button class="bn632-hover bn23" class='b_rechercher'>rapport non deposer</button></a>
                    </div>


                    <div class="exel">
                        <p class="titre">Exporter les notes :</p>
                        <a href="csv.php"><button class="bn632-hover bn22">EXCEL</button></a>
                    </div>
                   <div class="exel">
                <form action="#" method="post" enctype="multipart/form-data">
            <p class="titre"> Importer liste d'étudiants :</p>
            <input type="file" name="fileToUpload" id="fileToUpload" class="">
            <input type="submit" value="importer" name="submit" class="bn632-hover bn22">
        </form>
                </div>
                </div>
            </div>

                
        </aside>



    </div>
</body>
</html>