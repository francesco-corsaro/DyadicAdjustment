<?php

//Questo programma  carica 
require 'backend/SicurezzaForm/SicurezzaForm.php';
$partner=$_POST[nome];

$cod_partner=$_POST[cod_utente];

test_input_nome($partner); //NB: La variabile partner pulita diventa $nome

//bISOGNA INSEWRIRE LA PULIZIA PER IL CODICE DEL PARTNER

require 'DataBase/ConnectDataBase.php';
//Verifico se il partner è presente nella scheda anagrafica
$sql = "SELECT Nome, Id FROM Anagrafica WHERE Nome='$nome' AND Id='$cod_partner' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
    
        if ($row['Nome'] == $nome && $row['Id']==$cod_partner ) {
            
            $conn->close();
            //se è presente inserisco i dati nella tabella coppie
            require 'DataBase/ConnectDataBase.php';
            $sql = "INSERT INTO Coppie (IdPartner1, IdPartner2)
            VALUES ('$cod_utente', '$cod_partner')";
            //PROGRAMMA PER IL DEBUG
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("location:/DyadicAdjustment/pagine/Dyadic1_15.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
            /* var_dump($row);*/
            
            //header("location:/DyadicAdjustment/pagine/Login.php");
        } else {
            echo 'Sono stati riscontrati problemi nel caricare i dati';
        }
    }
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; var_dump($row);
    $err_partner='Il nome o codice errato';
}

?>