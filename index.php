<?php
    session_start();
    date_default_timezone_set("Europe/Budapest");

    include("adatkapcsolat.php");
    include("urlap_form.php");

    
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <limk rel="stylesheet" href="style.css">
    <title>SEO Konferencia</title>
</head>
<body>

<h1 style='text-align:center'>Konferencia Űrlap</h1>

<?php
    $szj      = array("","egy","kettő","három","négy","öt","hat","hét","nyolc","kilenc");
    $ca       = rand(1,9);
    $cb       = rand(1,9);
    $_SESSION['cc'] =10+$ca+$cb;
?>

<form style='text-align:center;' action='urlap_ir.php' method='post' enctype='multipart/form-data' target='kisablak'>
    <div id='onadatai'>
        <h3>Ön adatai</h3>
        <label for="lname">Vezetéknév:</label>
        <input type="text" name="lname" value="Vicc"><br><br>
        <label for="fname">Keresztnév:</label>
        <input type="text" name="fname" value="Elek"><br><br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" value="beta.juliet@garfieldmail.com"><br><br>
        <label for="birthday">Születésnap:</label>
        <input type="date" id="birthday" name="birthday"><br><br>
        <label for="phonenr">Telefonszám:</label>
        <input type="tel" name="phonenr" value="0630"><br><br>

    </div>
    <div id='cegeadatai'>
        <h3>Munkahelye adatai</h3>
        <label for="cname">Cégneve:</label>
        <input type="text" name="cname" value="Fidesz–KDNP Pártszövetség"><br><br>
        <label for="city">Város:</label> 
        <input type="text" name="city" value="Felcsút"><br><br>
        <label for="address">Cím:</label> 
        <input type="text" name="address" value="Szabad Hongkong út"><br><br>
        <label for="jname">Munkaköre:</label> 
        <input type="text" name="jname" value="Politikus"><br><br>
        <label for="rname">Beosztása:</label> 
        <input type="text" name="rname" value="Oktatásért felelős miniszter"><br><br><br>
    </div>
    <label for="fname">Arcképe:</label> 
    <input type='file' name='arckep'><br><br><br>
    <label for="captcha" style="font-weight:bold";>Captcha</label><br> 
    Mennyi tizen<?=$szj[$ca];?> + <?=$szj[$cb];?>? <input name='captcha' maxlength=2><br><br><br>
    <input type='submit' value='Űrlap beküldése'>
</form>


    
</body>
</html>