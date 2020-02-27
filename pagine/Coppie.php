<?php
session_start();
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php require 'FrontEnd/Css/login/Style.php'; ?>
<title>Partner</title>

</head>

    <body>
     <h1>Corso Mbsr</h1>
     
     <div class="row">
      <div class="tenda">
       <div class="titolo">Partner</div>
        <div class="roi">
        Benvenuto,<br>
         il tuo codice utente è:<br> <b class="titolo"><?php echo $_SESSION['codice']; ?></b>.
        <br>Prima di poter accedere al test è necessario inserire qui sotto 
        il  nome e il codice utente del prorprio partner. 
        </div>
        <form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
      
        <input name="nome" type="TEXT" placeholder="Nome Partner" required>
        <input name="cod_utente" type="number" Id="cod_utente" placeholder="Cod. partner" maxlength="6"  oninput="validateForm()" required>
        <div class="nascita">
         
         <input type="submit" id="myBtnUt" value="Conferma" disabled/>
          
 <script >
   function validateForm() {
    var x = document.getElementById("cod_utente").value; //da notare come vengono chiamati i valori del form
    

    if (x == "" ) {

     document.getElementById("myBtnUt").disabled=true; //il bottone deve essere impostato su disabilita
     

    }else{
      document.getElementById("myBtnUt").disabled=false;
      document.getElementById("myBtnUt").style.backgroundColor = "#A195C7";
    
     }

  }
</script>
       
      </div>
      </form>
     </div>
    </div>
    </body>
   
</html>