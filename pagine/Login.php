<?php
session_start();
require 'backend/DataBase/SelezionaId.php';

if (!empty(htmlspecialchars($_POST[email]))) {
    
   //programma per accedere
    require 'backend/Accesso.php';
}
if ($_POST['out']==1) {
    $_SESSION['bypass']=0;
}
?>

<html>
    <head>
    	<title>Login</title>
    	
    	<?php require 'FrontEnd/Css/login/Style.php'; ?>
        <script> <!-- con questo script si mostra la password -->
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
         </script>
    </head>

	<body>
		<h1>Corso Mbsr</h1>
		
		<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<p class="errore"><?php 
		echo  $_SESSION['errorePres'];$_SESSION['errorePres']='';
		if ($_SESSION['denied']== 1) {
		    echo "Utente non trovato";
		    $_SESSION['denied']= 0;
		}?></p>
		<div class="col-9 tenda">
    				<div class="titolo">Login</div>
    					<div class="col-11">
    						<div class="roi"><?php echo $meccanico;?> <?php if ($_SESSION['cambiopwd']==1) {echo '<div>Password modificata</div>';} ?>
    							Inserisci Username e password
    						</div>
        				</div>
        				
                    		<div class="col-6">	
                    			<?php echo $emailErr;$emailErr='';?>
                    			<input name="email" type="TEXT" placeholder="Username" oninput=validateForm() required>
                    		</div>
                    		<div class="col-12">
                        		<div class="col-6">
                        			<div class="occhio">
                				      <img  id="myImage" onclick="myFunction()" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1NTEuMTIyIDU1MS4xMjIiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDU1MS4xMjIgNTUxLjEyMiIgd2lkdGg9IjI0cHgiPjxwYXRoIGQ9Im0yNzUuNTYxIDY4Ljg4N2MtMzguNjkgMC03NS43NiA4Ljc2OS0xMTAuMTc0IDIzLjQzN2wyNi4yMzYgMjYuMjM2YzI2LjU4NS05LjYzMSA1NC43NjgtMTUuMjI4IDgzLjkzOC0xNS4yMjggMTA2LjUzMiAwIDIwMi4yODQgNjguOTc1IDI0MC4wNzcgMTcyLjIyOC0xNC40MDEgMzkuMzQ4LTM3LjMwNSA3My42MTEtNjUuOTMxIDEwMS4wODNsMjQuMjIyIDI0LjIyMmMzMy42MTUtMzIuNDEgNjAuMjg2LTcyLjk1NyA3Ni4yNzMtMTE5LjczOCAxLjIyOC0zLjYxNiAxLjIyOC03LjUxOCAwLTExLjEzNC00MS4xMDctMTIwLjI5LTE1MS40NzUtMjAxLjEwNi0yNzQuNjQxLTIwMS4xMDZ6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTM0My45ODMgMjcwLjkyMSAzMS4wNjMgMzEuMDYzYzIuMjYtOC40ODUgMy44NTItMTcuMjMzIDMuODUyLTI2LjQyMyAwLTU2Ljk4My00Ni4zNTMtMTAzLjMzNy0xMDMuMzM3LTEwMy4zMzctOS4xOSAwLTE3LjkzOCAxLjU5Mi0yNi40MjMgMy44NTJsMzEuMDYzIDMxLjA2M2MzNC4yMzUgMi4zMjkgNjEuNDUzIDI5LjU0NyA2My43ODIgNjMuNzgyeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0zNC40NDEgNTguNzk2IDY5LjgzNyA2OS44MzdjLTQ2LjI1MyAzNC45OC04My4zODUgODIuOTE0LTEwMy4zNTggMTQxLjM2MS0xLjIyOCAzLjYxNi0xLjIyOCA3LjUxOCAwIDExLjEzNCA0MS4xMDYgMTIwLjI5MSAxNTEuNDczIDIwMS4xMDcgMjc0LjY0IDIwMS4xMDcgNTEuMiAwIDk5LjU1Ny0xNS4wNDUgMTQyLjIxNi00MC4xMDNsNzQuNTQ5IDc0LjU0OSAyNC4zNTQtMjQuMzU0LTQ1Ny44ODUtNDU3Ljg4Ni0yNC4zNTQgMjQuMzU0em0yNDEuMTIgMzg4Ljk5NGMtMTA2LjUzMiAwLTIwMi4yODQtNjguOTc1LTI0MC4wNzctMTcyLjIyOCAxOC42NC01MC45MzEgNTIuMTM3LTkyLjM1OCA5My4zNzgtMTIyLjM0NWw2Mi42NDkgNjIuNjQ5Yy0xMi4wNCAxNi44OTctMTkuMjg3IDM3LjQxNC0xOS4yODcgNTkuNjk1IDAgNTYuOTgzIDQ2LjM1MyAxMDMuMzM3IDEwMy4zMzcgMTAzLjMzNyAyMi4yODEgMCA0Mi43OTgtNy4yNDcgNTkuNjk1LTE5LjI4N2w1Ny4zMTUgNTcuMzE1Yy0zNS41NzIgMTkuMjc2LTc1LjE5MyAzMC44NjQtMTE3LjAxIDMwLjg2NHptLTU5LjEzMi0yMDcuMDA1IDkzLjkxIDkzLjkxYy0xMC4yNDcgNi4wNTEtMjIuMDM5IDkuNzU5LTM0Ljc3OCA5Ljc1OS0zNy45OTUgMC02OC44OTEtMzAuODk3LTY4Ljg5MS02OC44OTEgMC0xMi43MzkgMy43MDgtMjQuNTMxIDkuNzU5LTM0Ljc3OHoiIGZpbGw9IiMwMDAwMDAiLz48L3N2Zz4K"/>
                					</div>
                        			<input name="pwd" type="password"  maxlength="8" id="myInput" placeholder="Password" required  >
                        		</div>
                        		
                			</div>
                			
						<div class="col-12">
                    		<input type="submit" id="myBtn" value="Accedi" disabled/>
                    		<script >
                    		function validateForm() {
                    			  var x = document.forms["myForm"]["email"].value; //da notare come vengono chiamati i valori del form
                    		      var y = document.forms["myForm"]["pwd"].value; //da notare come vengono chiamati i valori del form
                    		  if (x == "" && y == "" ) {
                    		    document.getElementById("myBtn").disabled=true; //il bottone deve essere impostato su disabilita

                    		  }else{
                    		  document.getElementById("myBtn").disabled=false;
                    		  }
                    		}
                    		</script>
                    	</div>
                    	<div class="col-12 collegamento">
                		  <a href="/DyadicAdjustment/pagine/NewPwd.php" >Hai dimenticato la password? Clicca qui</a>
                		</div>
                    	<div class="col-12 consegna">
                    		Oppure <b><a href="/DyadicAdjustment/pagine/Registrazione.php">Registrati</a></b>
                    	</div>
		</div>
		</form>
	
    <footer style="font-size: 2vw">
    	Icons made by <a href="https://www.flaticon.com/authors/those-icons" title="Quelle icone">Quelle icone</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
    </footer>
	</body>
</html>