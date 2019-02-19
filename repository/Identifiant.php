<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=porfolio oc', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
