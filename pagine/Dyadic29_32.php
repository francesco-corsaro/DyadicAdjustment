<?php
session_start(); 
$codice=$_SESSION['codice'];
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

if (isset($_POST[qst])) {
    $_SESSION['das29_32']=$_POST['qst'];
    
    var_dump($_SESSION['das']); echo '<br>';
    var_dump($_SESSION['das16_22']);echo '<br>';
    var_dump($_SESSION['das23_28']);echo '<br>';
    var_dump($_SESSION['das29_32']);echo '<br>';
    
    require 'backend/DataBase/InsertRegistrazione.php';
    Insert_cod_date('RispostePre',$codice);
    //header("location: Attesa.php") ;
}
$qst=array(
1=> 'Desidero disperatamente che la mia relazione riesca, e supererei qualsiasi ostacolo perché ciò accada.',
2=> 'Desidero moltissimo che la mia relazione riesca, e farò tutto ciò che è in mio potere perché ciò accada.',
3=> 'Desidero moltissimo che la mia relazione e riesca, e farò la mia giusta parte perché ciò accada',
4=> 'Sarebbe bello se la mia relazione riuscisse, ma non posso fare molto di più di quello che sto già facendo perché riesca.',
5=> 'Sarebbe bello se la mia relazione riuscisse, ma mi rifiuto di fare più di quanto io stia già facendo per continuare il rapporto.',
6=> 'La mia relazione non potrà mai riuscire, e non c\'è più nulla che io possa fare per continuare il rapporto'
);
?>
<html>
<head>

<title>Dyadic Adjustment Scale</title>
<?php require 'FrontEnd/Css/Dyadic29_32/Style.php'; ?>
</head>
<body>
	<h1>Corso Mbsr</h1>
	<div class="titolo">Dyadic Adjustment Scale</div>
	
	
	<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<div class="col-12 tenda">
		  <div class="cappello">
		  Ci sono delle cose sulle quali le coppie a volte sono d'accordo e a volte sono in disaccordo. Indichi se
ciascuna delle situazioni sotto elencate ha causato divergenza di opinioni o ha creato problemi nella sua
relazione nelle ultime settimane. Clicchi sul "SI" o sul "NO" 
		  </div>
            <p class="color"><b>29. Essere troppo stanchi per fare l'amore</b></p>
           <div class="consegna">
             <label class="contenitore" id="gen">
             	<input  name="qst['1']" id="gen" type="radio" value="1" required/>
             	<span class="buttondo" id="gen" ></span>
             	Si 
             </label>
             
             <label class="contenitore" id="gen2">	
             	<input  name="qst['1']"id="gen2" type="radio" value="2" required />
             	<span class="buttondo" id="gen2" ></span>
             	No
              </label>
             </div>
            
            <p class="color"><b>30. Non mostrare amore</b></p>
            <div class="consegna">
             <label class="contenitore" id="gen">
             	<input  name="qst['2']" id="gen" type="radio" value="1" required/>
             	<span class="buttondo" id="gen" ></span>
             	Si 
             </label>
             
             <label class="contenitore" id="gen2">	
             	<input  name="qst['2']"id="gen2" type="radio" value="2" required />
             	<span class="buttondo" id="gen2" ></span>
             	No
              </label>
             </div>
          </div>
          <div class="col-12 tenda">
            <div class="cappello">
            31. I nseguenti numeri rappresentano diversi gradi di felicità nella relazione. La preghiamo di
			inserire il numero che meglio descrive il grado di felicità, tutto considerato, della sua relazione.
			</div>
           <p class="color"><b>0= Estremamente infelice</b></p>
           <p class="color"><b>1= Abbastanza infelice </b></p> 
           <p class="color"><b>2= Un po' infelice </b></p> 
           <p class="color"><b>3= Felice</b></p> 
           <p class="color"><b>4= Molto felice </b></p> 
           <p class="color"><b>5= Estremamente felice </b></p> 
           <p class="color"><b>6= Perfetta</b></p>
           
           <input name="qst['3']"  type="number"  placeholder="N°" max="5"  <?php  echo $controllo?> >
          </div>
          <div class="col-12">
          <div class="adesivo attak">
			
			32. Quali delle seguenti affermazioni meglio descrive ciò che pensa del futuro del suo rapporto?
		</div>
			<div class="col-12 tenda" id="tendaFin">
		<?php 


 foreach ($qst as $chiave=>$testo){
   
     echo  
        '
            
            <label class="contenitore" ">
                <b class="color">'.$testo.'</b>
                <input  name="qst[4]" id="radiofin" type="radio" value="0" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
                       
         ';
    
 }
?>
			</div>
		</div>
    	 <br>
     	<p><input type="submit" value="Invia"/></p>
     </form>
     	<a href="indice.html">Indice</a>
	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	