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
     $photo=$requette3['photo'];

     //trouver tous les stages non-encadrés
     $stage_requette = "SELECT *FROM `stage`,etudiant,entreprise WHERE etudiant.id_etudiant=stage.id_etudiant and stage.id_entreprise=entreprise.id_entreprise and id_enseignant is not null  ";
     $stage_resultat = mysqli_query($link,$stage_requette);
     if(isset($_POST['search']) && !empty($_POST['filtre'])){
        $stage_requette = "SELECT *FROM `stage`,etudiant,entreprise WHERE etudiant.id_etudiant=stage.id_etudiant and stage.id_entreprise=entreprise.id_entreprise and id_enseignant is not null  "; 
        if(in_array("G.info",$_POST['filtre']) && !in_array("G.indus",$_POST['filtre'])){
            $stage_requette .="AND filiere='Informatique'";
        }
    
        if(in_array("G.indus",$_POST['filtre']) && !in_array("G.info",$_POST['filtre'])){
            $stage_requette .="AND filiere='Industrielle'";
        }
        if(in_array("PFA",$_POST['filtre'])){
            $stage_requette .="AND type='PFA'";
        }
        if(in_array("PFE",$_POST['filtre'])){
            $stage_requette .="AND type='PFE'";
        }
        if(in_array("yours",$_POST['filtre'])){
            $stage_requette .="AND id_enseignant='$id_enseignant'";
        }
        $stage_resultat = mysqli_query($link,$stage_requette);
    }
   

    //search input query
    if(isset($_POST['sent'])){
        $search = $_POST['search1'];
        $stage_requette ="SELECT *FROM `stage`,etudiant,entreprise
        WHERE etudiant.id_etudiant=stage.id_etudiant and stage.id_entreprise=entreprise.id_entreprise and id_enseignant is not null
        and (type like '%$search%'
        or intitule_sujet like '%$search%'
        or duree like '%$search%'
        or nom like '%$search%'
        or prenom like '%$search%'
        or nom_entreprise like '%$search%'
        or filiere like '%$search%'
        or technologies like '%$search%'
        or nom_encadrant like '%$search%'
        or prenom_encardrant like '%$search%'
        
              )";
        $stage_resultat = mysqli_query($link,$stage_requette);

    }
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
             
}
     
     
else{
    header("location:login.php");
}









$page = 'page2';
if(isset($_POST['page'])){
    $page = $_POST['page'];

}
switch($page){
    
   
    case 'page1': header('location:accueil_enseignant.php'); 
    $page="page";break;
    
}


    




?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="student_home.js"></script>
    <script>
                $(".checkbox-dropdown").click(function () {
            $(this).toggleClass("is-active");
        });

        $(".checkbox-dropdown ul").click(function(e) {
            e.stopPropagation();
        });
    </script>   
    <link rel="stylesheet" href="style_accueil_nav.css">
    <link rel="stylesheet" href="style_accueil_centre.css">
    <link rel="stylesheet" href="right_section.css">
    <link rel="stylesheet" href="../main_style1.css">

    <title>Accueil</title>
</head>
<body>
    <!--navigation bar-->
    <nav>
        <div id="logo_container">
            <img src="../assets/local_assets/images/logo.png" alt="Logo" id="logo"onClick="window.open('accueil_enseignant.php', '_self')">
        </div>

        <div id="nav_center">
            <h2>Stages</h2>
            <div id="search_bar">
                <form action="" method="POST" id="test">
                <input type="text" name="search1" placeholder="Rechercher">
                <button type="submit" name="sent" id="test1"><img src="../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light"></button>
                </form>
            </div>
        </div>
            
            <div id="nav_right">
                <img src="../assets/local_assets/images/chat.png" alt="chat" class="rounded_icon_dark" onClick="window.open('chat/chat.php', '_self')">
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
                        <div></div><img src="../assets/local_assets/svg/more.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/local_assets/svg/share.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/local_assets/svg/about.svg" alt="">
                    </a></li>
                <li><a href="#">
                        <div></div><img src="../assets/local_assets/svg/settings.svg" alt=""  onClick="window.open('../profile/profile.php', '_self')">
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
        

       <!--Contenu centrale--> 
       <main>
       <div class="large">
       <div class="menu">
       <form name="myform" action="" method="post">
           
    <select name="page" onchange="this.form.submit()" class="options">
        <option value="page1"<?php if($page == "page1"){ echo " selected"; }?>><h2>Stages non encadrés </h2></option>
        <option value="page2"<?php if($page == "page2"){ echo " selected"; }?>>stages encadrés</option>

    </select>

    
        </form>

    
       </div>
       
                    <form action="" method="post">
        <div class="multi-selector">

     <div class="select-field">
<input type="text" name="" placeholder="Filtrer par :" id="" class="input-selector" disabled>
     <span class="down-arrow">&blacktriangledown;</span>
     </div>
<!---------List of checkboxes and options----------->
     <div class="list">
         <?php
         if($page=="page2"){
             echo "<label for='task0' class=task>
             <input type='checkbox' name='filtre[]' value='yours'>
             Vos stages encadrés";
         } 
         ?>
    
       <label for="task1" class="task">
            <input type="checkbox" name="filtre[]" value="G.info">
            G.info
            
     </label>
       <label for="task2" class="task">
            <input type="checkbox" name="filtre[]" value='G.indus'>
            G.indus
            
     </label>
       <label for="task3" class="task">
            <input type="checkbox" name="filtre[]" value='PFA'>
            PFA
            
     </label>
       <label for="task4" class="task">
            <input type="checkbox" name="filtre[]" value='PFE'>
            PFE 
            
     </label>
     <div class="button"><button type="submit" name="search" id="test1"><img src="../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light"></button></div>

     </div>


    </div>
 <script>
    

     document.querySelector('.select-field').addEventListener('click',()=>{
         document.querySelector('.list').classList.toggle('show');
         document.querySelector('.down-arrow').classList.toggle('rotate180');

     });

    </script>
                    </div>
    

        
          <?php
          

        while($dataStages = mysqli_fetch_assoc($stage_resultat)){
            $id_stage = $dataStages['id_stage'];
            $intitule_sujet = $dataStages['intitule_sujet'];
            $description_sujet = $dataStages['description_sujet'];
            $duree = $dataStages['duree'];
            $technologies = $dataStages['technologies'];
            $premiere_version = $dataStages['premiere_version'];
            $version_corrige = $dataStages['version_corrige'];
            $presentation = $dataStages['presentation'];
            $attestation_stage = $dataStages['attestation_stage'];
            $fiche_evalution = $dataStages['fiche_evalution'];
            $nom_encadrant = $dataStages['nom_encadrant'];
            $prenom_encardrant = $dataStages['prenom_encardrant'];
            $type = $dataStages['type'];
            $filiere =$dataStages['filiere'];
            $id_enseignant1 = $dataStages['id_enseignant'];
            $id_entreprise = $dataStages['id_entreprise'];
            $id_etudiant = $dataStages['id_etudiant'];
            $prenom_etudiant = $dataStages['prenom'];
            $nom_etudiant = $dataStages['nom'];
            $nom_entreprise =$dataStages['nom_entreprise'];
            $requette_enseignant="select nom_enseignant,prenom_enseignant from enseignant where id_enseignant is not null and id_enseignant=$id_enseignant1";
            $resultat = mysqli_query($link,$requette_enseignant);
            $data_enseignant =mysqli_fetch_assoc($resultat);
            $prenom_enseignant = $data_enseignant['prenom_enseignant'];
            $nom_enseignant = $data_enseignant['nom_enseignant'];
            $note_stage = $dataStages['note'];
            $est_valide = $dataStages['est_valide'];

            $stagesCount = 0;
                $stagesValideCount = 0;
                $stagesNotesCount = 0;

            $stagesCount++;
            $stagesNotesCount += $note_stage != NULL ? 1 : 0;
            $stagesValideCount += $est_valide != NULL ? 1 : 0;
            $progressValue = ($id_entreprise != NULL ? 10 : 0) + ($intitule_sujet != NULL ? 5 : 0) +
                ($premiere_version != NULL ? 10 : 0) + ($version_corrige != NULL ? 10 : 0) +
                ($presentation != NULL ? 10 : 0) + ($attestation_stage != NULL ? 5 : 0) +
                ($fiche_evalution != NULL ? 5 : 0) + ($nom_encadrant != NULL ? 10 : 0) +
                ($note_stage != NULL ? 10 : 0) + ($est_valide != NULL ? 10 : 0) +
                ($id_enseignant != NULL ? 10 : 0) +
                (($duree != NULL && $technologies != NULL) ? 5 : 0);




          



           


        



















            ?>
            



        
        
  
        <div class="card" onclick="window.location.href='visualiser_stage.php?id_stage=<?php echo $id_stage ?> '" style="cursor: pointer;">
            <div class="card_header">
                <div>
                    <p class="card_title"><?php echo $intitule_sujet ?></p>
                    <p class="card_subtitle">Encadré par Pr.<?php echo $prenom_enseignant.' '. $nom_enseignant ?></p>
                </div>
            </div>
            <!--Létudiant en attente d'encadrement-->
            <div class="card_main">
                <p class="attente">
                    <strong> Prénom     :</strong>  <?php echo $prenom_etudiant ?> <br>
                    <strong> Nom        :</strong>   <?php echo $nom_etudiant ?> <br>
                    <strong> Entreprise :</strong>  <?php echo $nom_entreprise ?> <br>
                    <strong> filiere : </strong> <?php echo $filiere?>
                </p>
                <div class="progress_container">
                                <p class="progress_header">Progress</p>
                                <div class="progress_bar">
                                    <span class="progress_indicator" style="width: <?php echo $progressValue ?>%; background-color: #ff942e"></span>
                                </div>
                                <p class="progress_percentage"><?php echo $progressValue ?>%</p>
                            </div>
            </div>
            <div class="card_footer">
                <div class="participants">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"
                        alt="participant">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"
                        alt="participant">
                    <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                        alt="participant">
                </div>
                <p class="internship_duration" style="color: #ff942e; background-color: #ff932e1e;"><?php echo $duree ?> mois</p>
            </div>
        </div>


        <?php }?>
        <?php
            if ($n1 == 0) { ?>
                <div class="empty_container">
                    <img src="../assets/local_assets/svg/no_stage.svg" alt="empty" height="70%" style="margin-left: 30%;">
                </div>
            <?php } ?>
       </main>
       
       <aside id="right_side">
        <div id="hello_container" onClick="window.open('../profile/profile.php', '_self')">
            <p>Bienvenue,Pr<br><b><?php echo $nom ?> </b></p>
            <img src="../assets/local_assets/images/user_icon.png" alt="user_icon">
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
                            <p class="time">4 jours </p>
                        </div>
                    </div>
                    <div class="feed">
                        <img src="../assets/local_assets/images/face2.png" alt="user_icon">
                        <div class="text_container">
                            <p class="content"><b>Hassan ayoub benasser </b> a Déposer la présentation</p>
                            <p class="time">16 jours</p>
                        </div>
                    </div>
            </div>
            <a href="#" id="see_more">See more</a>
        </div>
    </aside>
    </div>
</body>
</html>