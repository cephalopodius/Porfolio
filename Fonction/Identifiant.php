<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=oc projet 5', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
