<?php


require 'ConnectDataBase.php'; //serve a connettersi al database

$sql = "SELECT Email FROM Anagrafica";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['Email'] == $email ) {
            
            $_SESSION['errorePres']='Utente già registrato';
            
            $conn->close();
            
            /* var_dump($row);*/
            
            header("location:/DyadicAdjustment/pagine/Login.php");
        }else{
            require 'backend/DataBase/InsertRegistrazione.php';
            Inserisci_id(Anagrafica, $email, $nome, $cognome, $_POST[genere],$_POST[gg],$_POST[mese],$_POST[anno], $hash);
            echo $stato.'<br> Stato query: '.$stato1.$_SESSION['errorePres'];
            header("location: /DyadicAdjustment/pagine/Login.php");
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


