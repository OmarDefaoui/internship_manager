<?php
include('connexion.php');
session_start();


function mysqli_field_name($result, $field_offset)
 {
     $properties = mysqli_fetch_field_direct($result, $field_offset);
     return is_object($properties) ? $properties->name : null;
 };
$sql1 = "SELECT et.id_etudiant as appo,et.nom as nom,et.prenom as prenom,s.note as note 
        FROM etudiant as et,stage as s 
        where (et.id_etudiant=s.id_etudiant) ;"; //MySQL Table Name   
$filename = "note_etudiant";

$result1 = @mysqli_query($link,$sql1);    
$file_ending = "xls";

header("Content-Type: application/vnd.ms-excel");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysqli_num_fields($result1); $i++) {
echo mysqli_field_name($result1,$i) . "\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysqli_fetch_row($result1))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result1);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   

?>
