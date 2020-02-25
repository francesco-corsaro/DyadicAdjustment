<?php


require 'ConnectDataBase.php'; //serve a connettersi al database

$sql = "SELECT IdPartner1, IdPartner2 FROM Coppie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['IdPartner1'] == $_SESSION['codice'] or $row['IdPartner2'] == $_SESSION['codice']){
            
            
            require 'ConnectDataBase.php';
            $coppia=1;
            echo $row['IdPartner2'];
            $conn->close();
            
            
                
        }
        elseif ($row['IdPartner1'] != $_SESSION['codice'] or $row['IdPartner2'] != $_SESSION['codice']  ) {
            
            echo 'coppia non inserita';
            
            
            
            /* var_dump($row);*/
            
            
        }
    
}
}
/*
if ($utente==0) {
    header("location:/DyadicAdjustment/pagine/Coppie.php");
}*/
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


