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
                 
//charts                 
$moisreq=array();
$resultmois=array();
$datamois=array();
$mois=array();
for($i=1;$i<=12;$i++) {
  $moisreq[$i]="SELECT count(*) as nb
  FROM stage as s 
  where MONTH(s.creation_date)='$i' ;";
  $resultmois[$i] = mysqli_query($link,$moisreq[$i]);
  $datamois[$i]=mysqli_fetch_assoc($resultmois[$i]);
  $mois[$i]=$datamois[$i]['nb'];
};


$valider="SELECT count(*) as nb
    FROM stage as s 
    where s.est_valide='1'  ;";
    
    $resultvalider = mysqli_query($link,$valider);
    $datavalider=mysqli_fetch_assoc($resultvalider);
    $nbvalider=$datavalider['nb'];

$deposer="SELECT count(*) as nb
    FROM stage as s 
    where version_corrige is not NULL and s.est_valide!='1' ;";
    
    $resultdeposer = mysqli_query($link,$deposer);
    $datadeposer=mysqli_fetch_assoc($resultdeposer);
    $nbdeposer=$datadeposer['nb'];

$nondeposer="SELECT count(*) as nb
    FROM stage as s 
    where version_corrige is NULL  ;";
    
    $resultnondeposer = mysqli_query($link,$nondeposer);
    $datanondeposer=mysqli_fetch_assoc($resultnondeposer);
    $nbnondeposer=$datanondeposer['nb'];

$notereq=array();
$resultnote=array();
$datanote=array();
$nbnote=array();

$notereq[11]="SELECT count(*) as nb
  FROM stage as s 
  where note<='11' ;";
$resultnote[11] = mysqli_query($link,$notereq[11]);
$datanote[11]=mysqli_fetch_assoc($resultnote[11]);
$nbnote[11]=$datanote[11]['nb'];

for($i=12;$i<=20;$i++) {
  $notereq[$i]="SELECT count(*) as nb
  FROM stage as s 
  where note='$i' ;";
  $resultnote[$i] = mysqli_query($link,$notereq[$i]);
  $datanote[$i]=mysqli_fetch_assoc($resultnote[$i]);
  $nbnote[$i]=$datanote[$i]['nb'];
};             


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
    <link rel='stylesheet' href='css/style_accueil_centre_home_admin.css'>
    <link rel='stylesheet' href='css/style_right_side_admin.css'>

    <title>  Accueil</title>
</head>
<body>
    <!--navigation bar-->
    <nav>
        <div id="logo_container">
            <img src="../assets/local_assets/images/logo.png" alt="Logo" id="logo" onClick="window.open('accueil_admin.php', '_self')">
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
                        <div></div><img src="../assets/local_assets/svg/home.svg" alt="" onClick="window.open('accueil_admin.php', '_self')">
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
       
            <div class="container_charts">
                <div class="chart" id="ch1">
                <canvas id="myChart"></canvas>
                </div>

                <div class="chart" id="ch2">
                <canvas id="circul"></canvas>

                </div> 

                <div class="chart" id="ch3">
                    <canvas id="bare" height="270px"></canvas>
                </div>
            </div>

       </main>
       
       <aside id="right_side">
        <div id="hello_container" onClick="window.open('../profile/profile.php', '_self')">
            <p>Bienvenue<br></p>
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
                    <p class="titre">Rechercher des etudiants  :</p>
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


<script >
      
  //charte rapport par mois
  const labels = ['Jan',
                  'Feb',
                  'Mar',
                  'Apr',
                  'May',
                  'Jun',
                  'Jul',
                  'Aug',
                  'Sep',
                  'Oct',
                  'Nov',
                  'Dec',
                 ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data:[<?php echo $mois[1] ?>,
            <?php echo $mois[2] ?>,
            <?php echo $mois[3] ?>,
            <?php echo $mois[4] ?>,
            <?php echo $mois[5] ?>,
            <?php echo $mois[6] ?>,
            <?php echo $mois[7] ?>,
            <?php echo $mois[8] ?>,
            <?php echo $mois[9] ?>,
            <?php echo $mois[10] ?>,
            <?php echo $mois[11] ?>,
            <?php echo $mois[12] ?>,
           ]
    }]
  };

  const config = {
                    type: 'line',
                    data: data,
                    options:{   
                        plugins: {
                            title: {
                                display: true,
                                text: 'Nombre de depos de rapport par mois',
                                font: {size: 20,},
                                    },
                                },
                                tension:0.2,
                            },
            
                 };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );


  //deposition de rapport
  const data2 = {
  labels: [
    'Valider',
    'Rapport deposer',
    'Rapport non deposer',
    
  ],
  datasets: [{
    label: 'My First Dataset',
    data: 
         [<?php echo $nbvalider ?>,
          <?php echo $nbdeposer ?>,
          <?php echo $nbnondeposer ?>
          ],

    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 50
  }]
};

  const config2 = {
                    type: 'doughnut',
                    data: data2,
                    options:{plugins: {
                            title: {
                            display: true,
                            text: 'Repartion des stages',
                            font: {size: 20,},
                                    },
                                },
                            },
                  };

  const myChart2 = new Chart(
    document.getElementById('circul'),
    config2
  );

  //note
 
const labels3 = [
    'moin de 12',
    '12',
    '13',
    '14',
    '15',
    '16',
    '17',
    '18',
    '19',
    '20',
  ];

  const data3 = {
    labels: labels3,
    datasets: [{
      label: 'Pourcentage ',
      data:[<?php echo $nbnote[11] ?>,
            <?php echo $nbnote[12] ?>,
            <?php echo $nbnote[13] ?>,
            <?php echo $nbnote[14] ?>,
            <?php echo $nbnote[15] ?>,
            <?php echo $nbnote[16] ?>,
            <?php echo $nbnote[17] ?>,
            <?php echo $nbnote[18] ?>,
            <?php echo $nbnote[19] ?>,
            <?php echo $nbnote[20] ?>,
           ],
      backgroundColor: [
      '#4379FF',
      
    ],
      borderColor: [
      '#4379FF',
      
    ],
      
      borderWidth: 2,
    }]
  };

  const config3 = {
    type: 'bar',
    data: data3,
    options:{scales: {
                  y: {
                  beginAtZero: true
                      },
                        },
    plugins:{
                subtitle: {
                display: true,
                text: 'Repartion des notes',
                font: {size: 20,
                        weight: 'bold',
                },

                       },
            },
                  
             }
      };


  const myChart3 = new Chart(
    document.getElementById('bare'),
    config3
  );

</script>










</body>
</html>