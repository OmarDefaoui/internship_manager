<?php
if (isset($_GET['term'])) {
    include('../../back_end/connexion.php');
    $search_for = $_GET['term'];

    $requette = "SELECT * FROM entreprise WHERE nom LIKE '%$search_for%'";
    $resultat = mysqli_query($link, $requette);

    $items = array();
    $i = 0;
    while ($an_item = mysqli_fetch_assoc($resultat)) {
        $items[$i]['label'] = $an_item['nom'];
        $items[$i]['adresse'] = $an_item['adresse'];
        $items[$i]['ville'] = $an_item['ville'];
        $items[$i]['tel'] = $an_item['tel'];
        $items[$i]['id_entreprise'] = $an_item['id_entreprise'];
        $i++;
    }
    echo json_encode($items);
}
