<?php  
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
require_once(__DIR__ . "\..\\Autoloader.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Assets/Favicon.png" />
    <link href="/dist/output.css" rel="stylesheet">
    <title>Formatechfutur - <?= $curPageName ?></title>

</head>
<body>
    head