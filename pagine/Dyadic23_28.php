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
if (isset($_POST[ffmq])) {
    $_SESSION['das23_28']=array();
    array_push( $_SESSION['das23_28'], $_POST['qst']);
    array_push( $_SESSION['das23_28'],$_POST['ffmq']);
    var_dump($_SESSION['das23_28']);
    header("location: Dyadic29_32.php") ;
}

$ffmq=array(
1=> '25. A vere uno stimolante scambio di idee',
2=> '26. Ridere insieme',
3=> '27. Discutere con calma di qualcosa',
4=> '28. Lavorare insieme ad un progetto'

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
		<div class="col-12 tenda">
            <p class="color"><b>23. Indichi con quale frequenza bacia il suo/a compagno/a.</b></p>
            <label class="contenitore" ">
                Ogni giorno
                <input  name="qst['1']" type="radio" value="4" <?php  echo$controllo?> />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Quasi ogni giorno
                <input  name="qst['1']" type="radio" value="3" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Occasionalmente
                <input name="qst['1']" type="radio" value="2" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Raramente
                <input  name="qst['1']" type="radio" value="1" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore col-12" >
                Mai
                <input  name="qst['1']" type="radio" value="0" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            
            
          </div>
          <div class="col-12 tenda">
           <p class="color"><b>24. Indichi in che misura lei ed il suo/a compagno/a condividete degli interessi fuori dalle mura domestiche.</b></p>
            <label class="contenitore col-12" ">
                Tutti
                <input  name="qst['2']" type="radio" value="4" <?php  echo$controllo?> />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                La maggior parte
                <input  name="qst['2']" type="radio" value="3" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore col-12 " >
               Alcuni
                <input name="qst['2']" type="radio" value="2" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
             Molto pochi
                <input  name="qst['2']" type="radio" value="1" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore col-12" >
               Nessuno
                <input  name="qst['2']" type="radio" value="0" <?php  echo$controllo?>/>
                <span class="buttondo"></span>
            </label>
            
            
          </div>
          <div class="col-12">
          <div class="adesivo attak">
	Quanto spesso secondo lei si verifica la seguente situazione tra lei e il suo/a compagno /a?
		</div>
		<?php 

$chiave='1';
 foreach ($ffmq as $chiave=>$testo){
   
     echo  
        '<div class="col-12 tenda">
            <p class="color"><b>'.$testo.'</b></p>
            <label class="contenitore" ">
                Mai
                <input  name="ffmq['.$chiave.']" type="radio" value="0" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Meno di una volta al mese
                <input  name="ffmq['.$chiave.']" type="radio" value="1" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Una o due volte al mese
                <input name="ffmq['.$chiave.']" type="radio" value="2" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Una o due volte a settimana
                <input  name="ffmq['.$chiave.']" type="radio" value="3" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Una volta al giorno
                <input  name="ffmq['.$chiave.']" type="radio" value="4" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                 Più di una volta al giorno
                <input  name="ffmq['.$chiave.']" type="radio" value="5" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            
          </div>';
    
 }
?>

		</div>
    	 <br>
     	<p><input type="submit" value="Invia"/></p>
     </form>
     	<a href="indice.html">Indice</a>
	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	