<?php
require 'backend/SicurezzaForm/SicurezzaForm.php';

test_input_email($_POST[email]);

pwd_match($_POST[pwd]);


require 'DataBase/ConnectDataBase.php'; //serve a connettersi al database

$sql = "SELECT Email, Password, Id, Nome, Cognome, Genere FROM Anagrafica";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['Email'] == $email && password_verify($pasword, $row['Password'])) {
            $_SESSION['bypass']='b1p4ss';
            $_SESSION['nickName']=$email;
            $_SESSION['codice']= $row["Id"]  ;
            $_SESSION['gen']= $row["Genere"];
            $_SESSION['cogn']=$row["Cognome"];
            $_SESSION['nome']=$row["Nome"];
            $conn->close();
            
           // var_dump($row);
            $meccanico="<br>Login effettuato<br>";
            require 'backend/DataBase/VerificaId.php';
        }else{
            $_SESSION['denied']=1;
            
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


