<?php
/* Questo script verifica se l'utente è stato inserito nella tabella coppie
 * 
 */
$utente=$_SESSION['nome'];
$cod_utente=$_SESSION['codice'];

require 'DataBase/ConnectDataBase.php'; //serve a connettersi al database

$sql = "SELECT IdPartner1, IdPartner2 FROM Coppie WHERE IdPartner2='$cod_utente' OR IdPartner1='$cod_utente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['IdPartner1'] == $_SESSION['codice'] or $row['IdPartner2'] == $_SESSION['codice']){
            
            
            
            
            $conn->close();
            header("location:/DyadicAdjustment/pagine/Dyadic1_15.php");
            
                
        }
        elseif ($row['IdPartner1'] != $_SESSION['codice'] or $row['IdPartner2'] != $_SESSION['codice']  ) {
            
           echo  "Riscontrato errore";
         //   require 'VerificaPartner.php';
            
            /* var_dump($row);*/
            
            
        }
    
}
}else {
    
    require 'VerificaPartner.php';
}
/*
if ($utente==0) {
    header("location:/DyadicAdjustment/pagine/Coppie.php");
}
if ($coppia==1) {
    

require 'ConnectDataBase.php';

$sql = "SELECT IdPartner FROM RispostePre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['IdPartner']==$_SESSION['codice']  ){
            header("location: /DyadicAdjustment/pagine/Attesa.php");
            
        }else {
            header("location:/DyadicAdjustment/pagine/Questionario.php");
        }
    }
    
}
}
  /*  }
} elseif ($result==FALSE){
    $_SESSION['denied']=1;
    
}
else {
    $_SESSION['denied']=1;
    
}*/
$conn->close();
/*$_SESSION['denied']=" 1 " ;
header("location: /Login/Frontend/LogForm.php");*/
?>


