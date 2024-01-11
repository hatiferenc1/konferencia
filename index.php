<?php
    session_start();
    date_default_timezone_set("Europe/Budapest");

    include("adatkapcsolat.php");

    
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SEO Konferencia</title>
</head>
<body>
<?php
    print "
    <div container='container'>
    <ul>
        <li><a href='./'>Kezdőoldal</a></li>
        <li><a href='./'>Rólunk</a></li>
        <li><a href='./?p=urlap'>Űrlap</a></li>
        
        <li style='float:right'><a class='active' href='#about'>Profil</a></li>
    </ul>
    </div>
    ";
?>
<?php
    if(isset($_GET['p'])) $p=$_GET['p']; else $p="";

    if($p==""          ) print"<h1></h1>"               ;else
    if($p=="rolunk"    ) print"<h1>Rólunk</h1>"         ;else
    if($p=="urlap"     ) include("urlap_form.php")      ;else
    if($p=="profil"    ) include("profil.php")          ;else
    if($p=="adatmod"   ) include("adatmod_form.php")    ;else
    if($p=="jelszomod" ) include("jelszomod_form.php")  ;else
    
?>
    
</body>
</html>