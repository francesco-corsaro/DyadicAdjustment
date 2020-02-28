<?php
require 'backend/SicurezzaForm/SicurezzaForm.php';
$_POST[nome]=$partner;
$_POST[cod_utente]=$cod_utente;
$_SESSION['nome']=$nome;
test_input_email($partner);

//bISOGNA INSEWRIRE LA PULIZIA PER IL CODICE DEL PARTNER

require 'DataBase/ConnectDataBase.php';
//Verifico se il partner è presente nella scheda anagrafica
$sql = "SELECT Nome, Id FROM Anagrafica WHERE Nome='$partner' AND Id='$cod_utente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        var_dump($row);
       /* if ($row['Nome'] == $partner && $row['Id']==$cod_utente ) {
            
            $conn->close();
            //se è presente inserisco i dati nella tabella coppie
            require 'DataBase/ConnectDataBase.php';
            $sql = "INSERT INTO Coppie (IdPartner1, IdPartner2)
            VALUES ('$nome', '$partner')";
            //PROGRAMMA PER IL DEBUG
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
            /* var_dump($row);*/
            
            //header("location:/DyadicAdjustment/pagine/Login.php");
     /*   } else {
            var_dump($row);
        }
    */}
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $err_partner='Il nome o codice errato';
}
echo $err_partner;
?>