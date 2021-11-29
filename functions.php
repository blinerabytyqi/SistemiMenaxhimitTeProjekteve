<?php
session_start();
$dbConn="";
dbConnection();
function dbConnection(){
    global $dbConn;
    $dbConn=mysqli_connect('localhost','root','','smp');
    if(!$dbConn){
        die("Deshtoi lidhja me bazen e shenimeve" . mysqli_error($dbConn));
    }
}
function login($email,$fjalekalimi){
    global $dbConn;
    $sql="SELECT antariid,emri, mbiemri, telefoni, email FROM antaret";
    $sql.=" WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $dataAnetari=mysqli_query($dbConn,$sql);
    if(mysqli_num_rows($dataAnetari)==1){
        $dataAnetari=mysqli_fetch_assoc($dataAnetari);
        $anetari=array();
        $anetari['antariid']=$dataAnetari['antariid'];
        $anetari['emrimbiemri']=$dataAnetari['emri'] . " " .  $dataAnetari['mbiemri'];
        $anetari['roli']=$dataAnetari['roli'];
        $_SESSION['anetari']=$anetari;
        header("Location: punet.php");
    }
}
/** Funksionet per Anetaret */
function merrAnetaret(){
    global $dbConn;
    $sql="SELECT antariid,emri, mbiemri, telefoni, email FROM antaret";
    return $anetaret=mysqli_query($dbConn,$sql);
}
function merrAnetarId($aid){
    global $dbConn;
    $sql="SELECT antariid,emri, mbiemri, telefoni, email,fjalekalimi FROM antaret WHERE antariid={$aid}";
    return $anetari=mysqli_query($dbConn,$sql);
}
function shtoAnetar($emri, $mbiemri, $telefoni, $email, $fjalekalimi){
    global $dbConn;
    $sql="INSERT INTO antaret(emri, mbiemri, telefoni, email, fjalekalimi) ";
    $sql.=" VALUES ('$emri','$mbiemri','$telefoni','$email','$fjalekalimi')";
    $anetari=mysqli_query($dbConn,$sql);
    if($anetari){
        echo "Anetari u shtua me sukses";
    }else{
        die("Anetari dheshtoi te regjistrohet" . mysqli_error($dbConn));
    }
}
function modifikoAnetar($antariid,$emri, $mbiemri, $telefoni, $email, $fjalekalimi){
    global $dbConn;
    $sql="UPDATE antaret SET emri='$emri',mbiemri='$mbiemri', telefoni='$telefoni',";
    $sql.="email='$email' WHERE antariid=$antariid";
    $anetari=mysqli_query($dbConn,$sql);
    if($anetari){
        echo "Anetari u modifiku me sukses";
    }else{
        die("Anetari dheshtoi te ndryshohet" . mysqli_error($dbConn));
    }
}
function fshijAnetar($aid){
    global $dbConn;
    $sql="DELETE FROM antaret WHERE antariid=$aid";
    $anetari=mysqli_query($dbConn,$sql);
    if($anetari){
        echo "Anetari u fshi me sukses";
    }else{
        die("Anetari dheshtoi te fshihet" . mysqli_error($dbConn));
    }
}
/** Fundi i Funksioneve per Anetaret */
function merrProjektet(){
    global $dbConn;
    $sql="SELECT projektiid, emri, pershkrimi, datafillimit, datambarimit FROM projektet";
    return mysqli_query($dbConn,$sql);
}
/** Funksionet per Punet */
function merrPunet(){
    global $dbConn;
    $antariid=$_SESSION['anetari']['antariid'];
    $sql="SELECT p.punaid, pr.emri,p.data,p.pershkrimi FROM projektet pr INNER JOIN punet p ON pr.projektiid=p.projektiid";
    if($_SESSION['anetari']['roli']!=1){
        $sql.=" WHERE p.antariid=$antariid";
    }
    return $punet=mysqli_query($dbConn,$sql);
}
function merrPuneId($pid){
    global $dbConn;
    $sql="SELECT p.punaid,p.projektiid, pr.emri,p.data,p.pershkrimi FROM projektet pr INNER JOIN punet p ON pr.projektiid=p.projektiid WHERE p.punaid={$pid}";
    return $pune=mysqli_query($dbConn,$sql);
}
function fshijPune($pid){
    global $dbConn;
    $sql="DELETE FROM punet WHERE punaid=$pid";
    $pune=mysqli_query($dbConn,$sql);
    if($pune){
        echo "Puna u fshi me sukses";
    }else{
        die("Puna dheshtoi te fshihet" . mysqli_error($dbConn));
    }
}
function shtoPune($projektiid, $data, $pershkrimi){
    global $dbConn;
    $antariid=$_SESSION['anetari']['antariid'];
    $sql="INSERT INTO punet(antariid,projektiid, data, pershkrimi) ";
    $sql.=" VALUES ($antariid,$projektiid,'$data','$pershkrimi')";
    $pune=mysqli_query($dbConn,$sql);
    if($pune){
        $_SESSION['mesazhi']="Puna u shtua me sukses";
        header("Location: punet.php");
    }else{
        die("Puna dheshtoi te regjistrohet" . mysqli_error($dbConn));
    }
}
function modifikoPune($punaid,$projektiid, $data, $pershkrimi){
    global $dbConn;
    $sql="UPDATE punet SET projektiid='$projektiid',data='$data', pershkrimi='$pershkrimi' WHERE punaid=$punaid";
    $pune=mysqli_query($dbConn,$sql);
    if($pune){
        echo "Puna u modifiku me sukses";
    }else{
        die("Puna dheshtoi te ndryshohet" . mysqli_error($dbConn));
    }
}
?>