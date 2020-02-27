<?php


require 'ConnectDataBase.php'; //serve a connettersi al database
/*con questo script  verifico se l'utente è stato inserito
 * nel database, in caso positivo non inserisce i data nella tabella
 * in caso negativo inserisce i dati nella tabella
 */

$sql = "SELECT Email FROM Anagrafica WHERE Email='".$email."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['Email'] == $email ) {
            
            $_SESSION['errorePres']='Utente già registrato';
            
            $conn->close();
            
            /* var_dump($row);*/
            
            header("location:/DyadicAdjustment/pagine/Login.php");
        }
    }
    
}else{
    require 'backend/DataBase/InsertRegistrazione.php'; //chiama la pagina per la funzione Inserisci_id
    
    //Inserisci i dati nella tabella anagrafica
    Inserisci_id(Anagrafica, $email, $nome, $cognome, $_POST[genere],$_POST[gg],$_POST[mese],$_POST[anno], $hash);
    echo $stato.'<br> Stato query: '.$stato1.$_SESSION['errorePres'];
    header("location: /DyadicAdjustment/pagine/Login.php");
    
}
$conn->close();



 


?>


