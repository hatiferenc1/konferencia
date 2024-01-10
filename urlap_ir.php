<?php
    session_start();

    print_r($_POST);

    $ukep = $_FILES['arckep'];

    include("adbkapcsolat.php");

    if($_POST['fname']=="")  die("<script> alert('Nem adtad meg a nevedet!')</script>");
    if($_POST['email']=="")  die("<script> alert('Nem adtad meg az e-mail címed!')</script>");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE umail = '$_POST[email]'")))
    die("<script> alert('Ezzel az e-mail címmel már regisztráltak!')</script>");
    
    $kepnev = date("YmdHis_") . $_POST['ustrid'] . "_" . randomstring(10) . substr($ukep['name'], strrpos($ukep['name'], "."));
    move_uploaded_file($ukep['tmp_name'] , "./PROFILKEP/" . $kepnev);

    $t = strtolower(substr( $kepnev , -4 )) ;

    $str10  = randomstring();

	if( $t==".jpg" || $t=="jpeg" )
	{
        mysqli_query($adb, "
        INSERT INTO user    (uid ,  uvezeteknev,        ukeresztnev,        umail,              uszulnap,           utelszam,           ucegnev,            ucegvaros,      ucegcim,            umunkakor,          ubeosztas,       ubelepo,       uip,                        udatum, ustatusz,  ujog, ustrid        )
        VALUES              (NULL,  '$_POST[lname]',    '$_POST[fname]',    '$_POST[email]',    '$_POST[birthday]', '$_POST[phonenr]',  '$_POST[cname]',    '$_POST[city]', '$_POST[address]',  '$_POST[jname]',    '$_POST[rname]', '$kepnev',     '$_SERVER[REMOTE_ADDR]',    NOW(),  'A',       '',   '$str10'      );
        ");

        mysqli_close($adb);

        print "<script> 
                alert('Köszönjük regisztrációdat')
            </script>
        ";
	}
    else print "<script> alert('Halj meg!')</script>";

    if($_SESSION['cc'] != $_POST['captcha']){
        die("<script>alert('Nem jól számoltál!($_SESSION[cc] * $_POST[captcha])')</script>");
    }
    
?>