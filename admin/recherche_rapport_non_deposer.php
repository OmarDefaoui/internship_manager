<?php
session_start();
$_SESSION["id"]=1;
if(isset($_SESSION["id"])){
    include("connexion.php");
    $id_administrateur = $_SESSION["id"];
     //passer données dans la session

     $reqadmin="SELECT *from administrateur where id_administrateur='$id_administrateur'";
     $resultadmin = mysqli_query($link,$reqadmin);
     $admin = mysqli_fetch_assoc($resultadmin);
     $nom=$admin['nom'];
     $prenom = $admin['prenom'];
     $email =$admin['email'];
     $photo=$admin['photo'];

     $stage_requette = "SELECT *FROM `stage`,etudiant,entreprise WHERE etudiant.id_etudiant=stage.id_etudiant and stage.id_entreprise=entreprise.id_entreprise and id_enseignant is  null  ";
     $stage_resultat = mysqli_query($link,$stage_requette);


    
                 //compteur
                 $compteur = "select * from stage";
                 $compt1 = mysqli_query($link,$compteur);
                 $n1=mysqli_num_rows($compt1);
                 //
                 $compteur2 = "select * from stage where id_enseignant is null";
                 $compt2 = mysqli_query($link,$compteur2);
                 $n2=mysqli_num_rows($compt2);
                 
}
     
     
else{
    header("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
                $(".checkbox-dropdown").click(function () {
            $(this).toggleClass("is-active");
        });

        $(".checkbox-dropdown ul").click(function(e) {
            e.stopPropagation();
        });
    </script>
    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="student_home.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style_accueil_nav.css">
    <link rel="stylesheet" href="css/style_accueil_centre.css">
    <link rel="stylesheet" href="css/right_section.css">
    <link rel="stylesheet" href="../main_style1.css">
    <link rel="stylesheet" href="css/style_right_side_admin.css">
    <link rel="stylesheet" href="css/style_recherche_admin.css">

    <title>  Accueil</title>
</head>
<body>
    <!--navigation bar-->
    <nav>
        <div id="logo_container">
            <img src="../assets/local_assets/images/logo.png" alt="Logo" id="logo" onClick="window.open('accueil_enseignant.php', '_self')">
        </div>

        <div id="nav_center">
            <h2>Stages</h2>
            <div id="search_bar">
            <form action="" method="POST" id="test">
                <input type="text" name="search1" placeholder="Rechercher" id="inputes">
                <button type="submit" name="sent" id="test1"><img src="../assets/local_assets/images/search.png" alt="search" class="rounded_icon_light"></button>
            </form>
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
                <li><a href="accueil_admin.php" class="nav_active">
                        <div></div><img src="../assets/local_assets/svg/home.svg" alt="" onClick="window.open('accueil_enseignant.php', '_self')">
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
        

       <!--Contenu centrale--> 
       <main>

       <div id="recherche_etudiant">
            <form action="#">
                
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="nom de l'étudiant...">
            </form>
        
            <table id="styled-table" >
            <thead>
                <tr>
                    <th>N Appogee</th>
                    <th>NOM</th>
                    <th>Prenom</th>
                    <th>stage</th>
                    
                </tr>
            </thead>
            <tbody>
<?php 
	$sql="SELECT *
    FROM etudiant,stage 
    where (etudiant.id_etudiant=stage.id_etudiant) and (premiere_version is null) and (version_corrige is null);";
    
    $result = mysqli_query($link,$sql);
    while($data=mysqli_fetch_assoc($result)){
    ?>      
    <tr>
        <td><?php echo $data['id_etudiant']?></td>
        <td><?php echo $data['nom'] ?></td>
        <td><?php echo $data['prenom'] ?></td>
        <td><a title="Voir le detail" style="color: #565A97; text-align: center;" onclick="window.location.href='visualiser_stage.php?id_stage=<?php echo $data['id_stage'] ?>'">
          <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
          </svg></a>
        </td>
        
    </tr>
<?php  } ?>               
            </tbody>
        </table>
        </div>   
       </main>
       
       <aside id="right_side">
        <div id="hello_container" onClick="window.open('../profile/profile.php', '_self')">
            <p>Bienvenue </b></p>
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
                    <a href="rechrche_rapport_non_deposer"><button class="bn632-hover bn23" class='b_rechercher'>rapport non deposer</button></a>
                </div>


                <div class="exel">
                    <p class="titre">Importer les notes :</p>
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

    <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("styled-table");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
     </script>










</body>
</html>