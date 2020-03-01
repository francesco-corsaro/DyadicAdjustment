<?php
session_start();

/*
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location: /MBSR/Login.php") ;
}
//prendo la variabile Nome
if (!preg_match("/^[a-zA-Z0-9 ]*$/",$_SESSION['Name'])) {
    $_SESSION['nameErr'] = '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
    header("location: /MBSR/Login.php");
}

//Creo dei permessi per bypassare il reuired
if ($_SESSION['name']!= 'kalimero') {
   $controllo='required' ;
}
if ($_SESSION['name']== 'kalimero' && isset( $_POST['ffmq'])){
    echo 'isset vero';
    //Assegno una variabile SESSION al form FFMQ
    $_SESSION['ffmq']=array();
    array_push($_SESSION['ffmq'],$_POST['ffmq']);
    //Mando alla pagina successiva
    header("location: /MBSR/PGWBI.php") ;
}

//funzioni per caricare le risposte nell array
if (array_key_exists("38",$_POST['ffmq'])) {
    //Assegno una variabile SESSION al form FFMQ
    $_SESSION['ffmq']=array();
    array_push($_SESSION['ffmq'],$_POST['ffmq']);
    //Mando alla pagina successiva
    header("location: /MBSR/PGWBI.php") ;
}*/
if (isset($_POST[ffmq])) {
    
    $_SESSION['das']=$_POST[ffmq];
   

    
    header("location: Dyadic16_22.php") ;
}

$ffmq=array(
1=> '1. Gestione delle finanze familiari',
2=> '2. Divertimenti',
3=> '3. Religione',
4=> '4. Dimostrazioni di affetto',
5=> '5. Amici',
6=> '6. Rapporti sessuali',
7=> '7. Convenzionalità ( comportamento corretto ed appropriato)',
8=> '8. Filosofia di vita',
9=> '9. Modi di agire con i genitori e suoceri',
10=> '10. Mete, traguardi e cose considerate importanti',
11=> '11. Quantità di tempo passato insieme',
12=> '12. Decisioni più importanti',
13=> '13. Compiti domestici',
14=> '14. Interessi e attività di tempo libero',
15=> '15. Decisioni rispetto alla carriera'
);
?>
<html><head>

<title>Dyadic Adjustment Scale</title>
<?php require 'FrontEnd/Css/Dyadic1_15/Style.php'; ?>
</head>
<body>
	<h1>Corso Mbsr</h1>
	<div class="titolo">Dyadic Adjustment Scale</div>
	<div class="col-9 roi">
		 La maggior parte delle persone ha dei disaccordi nelle proprie relazioni. La preghiamo di indicare qui di
		seguito il grado di accordo o disaccordo tra lei ed il suo partner per ogni quesito della lista, cliccando sulla risposta 
		che corrisponde alla Sua opinione.
	
	</div>
	
	<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		
		<?php 

$chiave='1';
 foreach ($ffmq as $chiave=>$testo){
   
     echo  
        '<div class="col-12 tenda">
            <p class="color"><b>'.$testo.'</b></p>
            <label class="contenitore" ">
                Sempre in disaccordo
                <input  name="ffmq['.$chiave.']" type="radio" value="0" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Quasi sempre in disaccordo
                <input  name="ffmq['.$chiave.']" type="radio" value="1" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Frequentemente in disaccordo
                <input name="ffmq['.$chiave.']" type="radio" value="2" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Occasionalmente in disaccordo
                <input  name="ffmq['.$chiave.']" type="radio" value="3" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Quasi sempre in accordo
                <input  name="ffmq['.$chiave.']" type="radio" value="4" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Sempre d\'accordo
                <input  name="ffmq['.$chiave.']" type="radio" value="5" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            
          </div>';
    
 }
?>


    	 <br>
     	<p><input type="submit" value="Invia"/></p>
     </form>
     	<a href="indice.html">Indice</a>
	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	