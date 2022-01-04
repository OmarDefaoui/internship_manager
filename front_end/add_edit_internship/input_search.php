<?php
if (isset($_GET['term'])) {
    include('../../back_end/connexion.php');
    $search_for = $_GET['term'];

    $requette = "SELECT nom FROM entreprise WHERE nom LIKE '%$search_for%'";
    $resultat = mysqli_query($link, $requette);

    $items = array();
    while($an_item = mysqli_fetch_assoc($resultat)) {
        $items[] = $an_item['nom'];
    }
    echo json_encode($items);
}
?>