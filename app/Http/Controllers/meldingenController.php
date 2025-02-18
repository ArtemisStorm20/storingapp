<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if (empty($attractie))
{
    $error[] = "Vul de attractie naam in.";
}
$type = $_POST['type'];
if (empty($type))
{
    $error[] = "Vul het type in.";
}
$capaciteit = $_POST['capaciteit'];
if (!is_numeric($capaciteit))
{
    $error[] = "Capaciteit moet een getal zijn.";
}
if(isset($_POST['prioriteit']))
{
    $prioriteit = 1;
}
else
{
    $prioriteit = 0;
}
$melder = $_POST['melder'];
if (empty($melder))
{
    $error[] = "Vul de naam van de melder in.";
}
$overig = $_POST['overig'];

//Controleer of er geen fouten zijn
if(isset($errors))
{
    var_dump($error);
    die();
}

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, prioriteit, capaciteit, melder, overige_info) VALUES (:attractie, :type, :prioriteit, :capaciteit, :melder, :overige_info)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overig,
]);

//Ga terug naar index
//header("location:../meldingen/index.php?msgMelding opgeslagen");