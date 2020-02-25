<?php


require 'ConnectDataBase.php'; //serve a connettersi al database

$sql = "SELECT * FROM Coppie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['IdPartner1'] == $_SESSION['codice'] or $row['IdPartner2'] == $_SESSION['codice']){
            $conn->close();
            
            require 'ConnectDataBase.php';
            
            $sql = "SELECT IdPartner FROM RispostePre";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                
                while(   $row = $result->fetch_assoc()) {
                    if ($row['IdPartner']==$_SESSION['codice']  ){
                        header("location: /DyadicAdjustment/pagine/Attesa.php");
                        
                    }else {
                        $risposte=0;
                    }
                }
                
            }
            if ($risposte==0) {
                header("location:/DyadicAdjustment/pagine/Questionario.php");
                
            }
        }
        elseif ($row['IdPartner1'] !== $_SESSION['codice'] or $row['IdPartner2'] !== $_SESSION['codice']  ) {
            
            $utente=0;
            
            
            
            /* var_dump($row);*/
            
            
        }
    
}
}
if ($utente==0) {
    header("location:/DyadicAdjustment/pagine/Coppie.php");
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


