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
    <link href="../dist/output.css" rel="stylesheet">
    <title>Formatechfutur - <?= $curPageName ?></title>

</head>
<body>
    <header class=" flex flex-row items-center  flex-no-wrap fixed top-0 z-10 flex w-full items-center justify-between bg-[#FBFBFB] py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">
        <img class=" w-14 h-14 " src="/Assets/Favicon.png" alt="FormaTech Futur" >
        <?php require_once(__DIR__ . "\\nav.php"); ?>
    </header>