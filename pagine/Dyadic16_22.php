<?php
session_start(); /*
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

if (isset($_POST[cod_utente])) {
    $_SESSION['das16_22']= $_POST['cod_utente'];
    //array_push($_SESSION['das16_22'],$_POST[cod_utente]);
    header("location: Dyadic23_28.php") ;
}
var_dump( $_SESSION['das16_22']);
echo '<br>';
var_dump( $_SESSION['das']);
$das16_22=array(
1=> '16. Quanto spesso lei parla o ha preso in considerazione il divorzio, la separazione o il porre fine alla sua relazione?',
2=> '17. Quanto spesso lei o il suo compagno/ a ve ne andate di casa dopo un litigio?',
3=> '18. Ingenerale, quanto spesso pensa che le cose tra lei ed il suo/a partner vadano bene?',
4=> '19. Ha fiducia nel suo compagno/a?',
5=> '20. Si è mai pentito/a di essersi sposato/a (o della scelta di vivere insieme)?',
6=> '21. Quanto spesso lei e il suo/a partner litigate?',
7=> '22. Quanto spesso lei ed il suo/a compagno/a "vi date sui nervi a vicenda"?'
);
?>
<html><head>

<title>Dyadic Adjustment Scale</title>
<?php require 'FrontEnd/Css/Dyadic16_22/Style.php'; ?>
</head>
<body>
	<h1>Corso Mbsr</h1>
	<div class="row">
	<div class="titolo">Dyadic Adjustment Scale</div>
	<div class="roi">
		Per le domande che seguono la preghiamo di rispondere utilizzando la seguente scala di risposta,
		scrivendo il numero che corrisponde alla sua scelta nello spazio in basso alla domanda:
	
	</div>
	
	
	<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
	<div class="col-12">
		<div class="adesivo attak">
	Sempre=0 <br>La maggior parte delle volte=1 <br>Spesso=2 <br>Occasionalmente=3 <br>Raramente=4 <br>Mai=5
		</div>
		<?php 

$chiave='1';
 foreach ($das16_22 as $chiave=>$testo){
   
     echo  
        '<div class="col-12 tenda">
            <p class="color"><b>'.$testo.'</b></p>
            <input name="cod_utente['.$chiave.']" type="number"  placeholder="N°" max="5"  '.$controllo.' >
            
          </div>';
    
 }
?>
</div>

    	 <br>
     	<p><input type="submit" value="Invia"/></p>
     </form>
     </div>
     	<a href="indice.html">Indice</a>
	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	