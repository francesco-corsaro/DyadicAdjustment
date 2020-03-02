<?php session_start();
require 'backend/SicurezzaForm/SicurezzaForm.php';
if (!empty($_POST[email])){
test_input_email($_POST[email]);
test_input_nome($_POST[nome]);
test_input_cognome($_POST[cognome]);
test_input_pwd($_POST[pwd1], $_POST[pwd2]);
//test_input_info( $_POST[eta], 18, 99);
//test_input_info($_POST[peso], 30, 150);
//test_input_info($_POST[altezza], 110, 250); ;

require 'backend/DataBase/CambiaPwd.php';
// if (!empty($_POST[email])  && $emailStat==1 && $nomeStat==1 && $cognomeStat==1 && $pwdStat && $infoStato!=0) {
if ($emailStat==1 && $pwdStat && $nomeStat!=0  && $cognomeStat!=0){
 
    cambia_pwd(Anagrafica,Password,$hash,Email,$email,Nome,$_POST[nome],Cognome,$_POST[cognome]);
    $_SESSION['cambiopwd']=1;
    echo $mexpwd;
    header("location: /DyadicAdjustment/pagine/Login.php");
 }
}
?>
<html>
    <head>
    	<title>Modifica Password </title>
    	
    	
        <?php require 'FrontEnd/Css/login/Style.php'; ?>
        
         <script> <!-- con questo script si mostra la password -->
            function myFunction1() {
              var x = document.getElementById("myInput");
              var y = document.getElementById("myInput1");
              if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                document.getElementById('myImage').src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBoZWlnaHQ9IjI0cHgiIHZpZXdCb3g9IjAgMCA1OCA1NCIgd2lkdGg9IjI0cHgiPjxnIGlkPSJQYWdlLTEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGcgaWQ9IjA2MC0tLUV5ZSIgZmlsbD0icmdiKDAsMCwwKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBpZD0iU2hhcGUiIGQ9Im0yOSAyNGMtMS42NTY4NTQyIDAtMyAxLjM0MzE0NTgtMyAzczEuMzQzMTQ1OCAzIDMgMyAzLTEuMzQzMTQ1OCAzLTNjLS4wMDQ5NDIyLTEuNjU0ODAyOC0xLjM0NTE5NzItMi45OTUwNTc4LTMtM3ptMCAwYy0xLjY1Njg1NDIgMC0zIDEuMzQzMTQ1OC0zIDNzMS4zNDMxNDU4IDMgMyAzIDMtMS4zNDMxNDU4IDMtM2MtLjAwNDk0MjItMS42NTQ4MDI4LTEuMzQ1MTk3Mi0yLjk5NTA1NzgtMy0zem0wIDZjMS42NTY4NTQyIDAgMy0xLjM0MzE0NTggMy0zcy0xLjM0MzE0NTgtMy0zLTMtMyAxLjM0MzE0NTgtMyAzYy4wMDQ5NDIyIDEuNjU0ODAyOCAxLjM0NTE5NzIgMi45OTUwNTc4IDMgM3ptMjcuMzItNy40MmMtNC44OS01LjU4LTE0LjM3LTE0LjU2LTI1LjQzLTE1LjQ5aC0uMDFjLS4zMi0uMDMtLjYzLS4wNS0uOTUtLjA2cy0uNjItLjAzLS45My0uMDMtLjYyLjAxLS45My4wM2MtMTEuNDcuNDctMjEuMzYgOS44MS0yNi4zOSAxNS41NS0yLjI0MDE4MjI4IDIuNTIwODk2LTIuMjQwMTgyMjggNi4zMTkxMDQgMCA4Ljg0IDUuMTcgNS44OSAxNS40NiAxNS41OCAyNy4zMiAxNS41OC4xMiAwIC4yNSAwIC4zOC0uMDEuMTIzNDAyNy4wMDY1MzQ2LjI0NzEzMDQuMDAzMTkwNi4zNy0uMDEuMjYtLjAxLjUzLS4wMi44LS4wNWguMDRjMTEuMTktLjc5IDIwLjc5LTkuODkgMjUuNzMtMTUuNTEgMi4yNDAxODIzLTIuNTIwODk2IDIuMjQwMTgyMy02LjMxOTEwNCAwLTguODR6bS0xMy40NSAxMi40MWMtLjEzMzYyOC4yMjk3NDQyLS4zNTMyMTcyLjM5Njg0MTgtLjYxMDI3MDIuNDY0Mzg4Ni0uMjU3MDUzLjA2NzU0NjctLjUzMDQyMTEuMDI5OTg1My0uNzU5NzI5OC0uMTA0Mzg4Ni0uMDc1ODYwOC0uMDQ1MTY3OC0uMTQ2MzE3LS4wOTg4NDg4LS4yMS0uMTYtLjMxMzcxMTUtLjMyMDE3Ny0uMzc4ODYzLS44MDg4MTMxLS4xNi0xLjIgMy41ODcxMzIyLTYuMjI1MTM3NiAxLjg3OTcxODktMTQuMTU1MTM3LTMuOTUxNDY5Mi0xOC4zNTI0MS01LjgzMTE4ODItNC4xOTcyNzI5LTEzLjg5MzA0NjUtMy4yOTkxNjc4LTE4LjY1NzU3MTEgMi4wNzg0ODU5LTQuNzY0NTI0NiA1LjM3NzY1MzgtNC42ODQ5MDQ5IDEzLjQ4ODk5MjQuMTg0MjY0IDE4Ljc3MjA4MzIgNC44NjkxNjg5IDUuMjgzMDkwOSAxMi45NDcxMDM0IDYuMDIyNzcwMiAxOC42OTQ3NzYzIDEuNzExODQwOS4xNzQwNDUtLjEyODAwMDguMzgzOTYzNS0uMTk3OTczNi42LS4yLjMxNDI3ODYuMDAyMDEzNC42MDk4MjIxLjE0OTc4NTIuOC40LjMzMTM3MDguNDQxODI3OC4yNDE4Mjc4IDEuMDY4NjI5Mi0uMiAxLjQtMi42NzY3MDI4IDIuMDIxOTMxNS01LjkyNTk1NDIgMy4xNDIzNjMtOS4yOCAzLjJoLS4zMmMtOC44MzY1NTYgMC0xNi03LjE2MzQ0NC0xNi0xNnM3LjE2MzQ0NC0xNiAxNi0xNmMuNTUgMCAxLjEuMDMgMS42My4wOCA1LjM5NDA0ODEuNTU2NjA5MSAxMC4xMzk5NzgzIDMuODA1MTYxMiAxMi42MTA5OTg2IDguNjMyMTI5OSAyLjQ3MTAyMDQgNC44MjY5Njg4IDIuMzMxNDAxNSAxMC41NzY1Mjk2LS4zNzA5OTg2IDE1LjI3Nzg3MDF6bS0xMy44Ny0xMi45OWMyLjc2MTQyMzcgMCA1IDIuMjM4NTc2MyA1IDVzLTIuMjM4NTc2MyA1LTUgNS01LTIuMjM4NTc2My01LTUgMi4yMzg1NzYzLTUgNS01em0tNy4yNy0xLjg2Yy0uMTkyMjY1MS4xOTY1MzU2LS40NTUwNjYxLjMwODEzNi0uNzMuMzEtLjI1NTczMTctLjAwMDIyOTEtLjUwMjAyODUtLjA5NjYwNjEtLjY5LS4yNy0uNDAxMjY0LS4zODE5MjY3LS40MTkxMjc3LTEuMDE2MDkwNC0uMDQtMS40MiAyLjI2MjE1NTgtMi40MTA0NjYzIDUuNDI0MzE2Ni0zLjc3MjQwNSA4LjczLTMuNzYuNTUyMjg0NyAwIDEgLjQ0NzcxNTMgMSAxcy0uNDQ3NzE1MyAxLTEgMWMtMi43NTUxNzExLS4wMTI5MTAxLTUuMzkwNTU4NCAxLjEyNTM0NTItNy4yNyAzLjE0em0tMi4zNSA0LjEzYy0uMjUxNDIxNC44ODgyMzQyLS4zNzkyODk5IDEuODA2ODY4My0uMzggMi43MyAwIC41NTIyODQ3LS40NDc3MTUzIDEtMSAxcy0xLS40NDc3MTUzLTEtMWMtLjAwMTM0NC0xLjEwNTUyNDguMTUwMDg4My0yLjIwNTkzMjQuNDUtMy4yNy4xNDkxMTY5LS41MzI5NTQ4LjcwMjA0NTItLjg0NDExNjkgMS4yMzUtLjY5NXMuODQ0MTE2OS43MDIwNDUyLjY5NSAxLjIzNXoiIGZpbGw9IiMwMDAwMDAiLz48cGF0aCBpZD0iU2hhcGUiIGQ9Im02IDE0Yy0uMjY1MTk0ODEtLjAwMDA1NjYtLjUxOTUwNzI3LS4xMDU0NTA2LS43MDctLjI5M2wtMi0yYy0uMzc4OTcyMjEtLjM5MjM3ODktLjM3MzU1MjM3LTEuMDE2MDg0OC4wMTIxODE0Mi0xLjQwMTgxODYuMzg1NzMzOC0uMzg1NzMzNzcgMS4wMDk0Mzk2OS0uMzkxMTUzNjEgMS40MDE4MTg1OC0uMDEyMTgxNGwyIDJjLjI4NTkwNzkyLjI4NTk5NDMuMzcxNDIxOTEuNzE2MDM2Ni4yMTY2Nzc5OCAxLjA4OTY1NDYtLjE1NDc0MzkzLjM3MzYxNzktLjUxOTI4MjA4LjYxNzI1OTEtLjkyMzY3Nzk4LjYxNzM0NTR6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggaWQ9IlNoYXBlIiBkPSJtMTYgN2MtLjM4MDgyNTYuMDAyMDc4ODEtLjcyOTc3NDEtLjIxMjMzMDY0LS45LS41NTNsLTEtMmMtLjE1OTY5NzctLjMxOTc1MjctLjEzNjY3ODUtLjcwMDQxNDEyLjA2MDM4NjYtLjk5ODU5Mjc2cy41MzgyMzcyLS40Njg1NzQwOC44OTUtLjQ0NzAwMDAxYy4zNTY3NjI5LjAyMTU3NDA4LjY3NDkxNTcuMjMxODQwMDUuODM0NjEzNC41NTE1OTI3N2wxIDJjLjE1NDU0NTUuMzA5MjY2NzguMTM4Mzc5Ni42NzY0MjM2LS4wNDI3NDkzLjk3MDkxMDYxLS4xODExMjg4LjI5NDQ4NzAxLS41MDE1MjI4LjQ3NDUyMzYzLS44NDcyNTA3LjQ3NjA4OTM5eiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGlkPSJTaGFwZSIgZD0ibTUyIDE0Yy0uNDA0Mzk1OS0uMDAwMDg2My0uNzY4OTM0MS0uMjQzNzI3NS0uOTIzNjc4LS42MTczNDU0LS4xNTQ3NDM5LS4zNzM2MTgtLjA2OTIyOTktLjgwMzY2MDMuMjE2Njc4LTEuMDg5NjU0NmwyLTJjLjM5MjM3ODktLjM3ODk3MjIxIDEuMDE2MDg0OC0uMzczNTUyMzcgMS40MDE4MTg2LjAxMjE4MTQuMzg1NzMzOC4zODU3MzM4LjM5MTE1MzYgMS4wMDk0Mzk3LjAxMjE4MTQgMS40MDE4MTg2bC0yIDJjLS4xODc0OTI3LjE4NzU0OTQtLjQ0MTgwNTIuMjkyOTQzNC0uNzA3LjI5M3oiIGZpbGw9IiMwMDAwMDAiLz48cGF0aCBpZD0iU2hhcGUiIGQ9Im00MiA3Yy0uMzQ2NDQwMS0uMDAwMTg0OTYtLjY2ODEwMzctLjE3OTY2Nzg0LS44NTAxOTQ1LS40NzQzOTQzMy0uMTgyMDkwOS0uMjk0NzI2NDgtLjE5ODY2NDMtLjY2MjcwMzIxLS4wNDM4MDU1LS45NzI2MDU2N2wxLTJjLjI0Njg3MTMtLjQ5NDI5NDg1Ljg0NzcwNTEtLjY5NDg3MTI4IDEuMzQyLS40NDhzLjY5NDg3MTMuODQ3NzA1MTUuNDQ4IDEuMzQybC0xIDJjLS4xNjk1ODU0LjMzOTM3NDMyLS41MTY2MTM5LjU1MzU1NTk5LS44OTYuNTUzeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGlkPSJTaGFwZSIgZD0ibTI5IDRjLS41NTIyODQ3IDAtMS0uNDQ3NzE1MjUtMS0xdi0yYzAtLjU1MjI4NDc1LjQ0NzcxNTMtMSAxLTFzMSAuNDQ3NzE1MjUgMSAxdjJjMCAuNTUyMjg0NzUtLjQ0NzcxNTMgMS0xIDF6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggaWQ9IlNoYXBlIiBkPSJtNCA0NGMtLjQwNDM5NTktLjAwMDA4NjMtLjc2ODkzNDA1LS4yNDM3Mjc1LS45MjM2Nzc5OC0uNjE3MzQ1NC0uMTU0NzQzOTMtLjM3MzYxOC0uMDY5MjI5OTQtLjgwMzY2MDMuMjE2Njc3OTgtMS4wODk2NTQ2bDItMmMuMzkyMzc4ODktLjM3ODk3MjIgMS4wMTYwODQ3OC0uMzczNTUyNCAxLjQwMTgxODU4LjAxMjE4MTQuMzg1NzMzNzkuMzg1NzMzOC4zOTExNTM2MyAxLjAwOTQzOTcuMDEyMTgxNDIgMS40MDE4MTg2bC0yIDJjLS4xODc0OTI3My4xODc1NDk0LS40NDE4MDUxOS4yOTI5NDM0LS43MDcuMjkzeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGlkPSJTaGFwZSIgZD0ibTE1IDUxYy0uMzQ2NDQwMS0uMDAwMTg1LS42NjgxMDM3LS4xNzk2Njc4LS44NTAxOTQ1LS40NzQzOTQzLS4xODIwOTA5LS4yOTQ3MjY1LS4xOTg2NjQzLS42NjI3MDMyLS4wNDM4MDU1LS45NzI2MDU3bDEtMmMuMjQ2ODcxMy0uNDk0Mjk0OS44NDc3MDUxLS42OTQ4NzEzIDEuMzQyLS40NDhzLjY5NDg3MTMuODQ3NzA1MS40NDggMS4zNDJsLTEgMmMtLjE2OTU4NTQuMzM5Mzc0My0uNTE2NjEzOS41NTM1NTYtLjg5Ni41NTN6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggaWQ9IlNoYXBlIiBkPSJtNTQgNDRjLS4yNjUxOTQ4LS4wMDAwNTY2LS41MTk1MDczLS4xMDU0NTA2LS43MDctLjI5M2wtMi0yYy0uMzc4OTcyMi0uMzkyMzc4OS0uMzczNTUyNC0xLjAxNjA4NDguMDEyMTgxNC0xLjQwMTgxODZzMS4wMDk0Mzk3LS4zOTExNTM2IDEuNDAxODE4Ni0uMDEyMTgxNGwyIDJjLjI4NTkwNzkuMjg1OTk0My4zNzE0MjE5LjcxNjAzNjYuMjE2Njc4IDEuMDg5NjU0Ni0uMTU0NzQzOS4zNzM2MTc5LS41MTkyODIxLjYxNzI1OTEtLjkyMzY3OC42MTczNDU0eiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGlkPSJTaGFwZSIgZD0ibTQzIDUxYy0uMzgwODI1Ni4wMDIwNzg4LS43Mjk3NzQxLS4yMTIzMzA2LS45LS41NTNsLTEtMmMtLjI0Njg3MTMtLjQ5NDI5NDktLjA0NjI5NDktMS4wOTUxMjg3LjQ0OC0xLjM0MnMxLjA5NTEyODctLjA0NjI5NDkgMS4zNDIuNDQ4bDEgMmMuMTU0NTQ1NS4zMDkyNjY4LjEzODM3OTYuNjc2NDIzNi0uMDQyNzQ5My45NzA5MTA2LS4xODExMjg4LjI5NDQ4Ny0uNTAxNTIyOC40NzQ1MjM2LS44NDcyNTA3LjQ3NjA4OTR6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggaWQ9IlNoYXBlIiBkPSJtMjkgNTRjLS41NTIyODQ3IDAtMS0uNDQ3NzE1My0xLTF2LTJjMC0uNTUyMjg0Ny40NDc3MTUzLTEgMS0xczEgLjQ0NzcxNTMgMSAxdjJjMCAuNTUyMjg0Ny0uNDQ3NzE1MyAxLTEgMXoiIGZpbGw9IiMwMDAwMDAiLz48L2c+PC9nPjwvc3ZnPgo=';
              } else {
                x.type = "password";
                y.type = "password";
                document.getElementById('myImage').src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1NTEuMTIyIDU1MS4xMjIiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDU1MS4xMjIgNTUxLjEyMiIgd2lkdGg9IjI0cHgiPjxwYXRoIGQ9Im0yNzUuNTYxIDY4Ljg4N2MtMzguNjkgMC03NS43NiA4Ljc2OS0xMTAuMTc0IDIzLjQzN2wyNi4yMzYgMjYuMjM2YzI2LjU4NS05LjYzMSA1NC43NjgtMTUuMjI4IDgzLjkzOC0xNS4yMjggMTA2LjUzMiAwIDIwMi4yODQgNjguOTc1IDI0MC4wNzcgMTcyLjIyOC0xNC40MDEgMzkuMzQ4LTM3LjMwNSA3My42MTEtNjUuOTMxIDEwMS4wODNsMjQuMjIyIDI0LjIyMmMzMy42MTUtMzIuNDEgNjAuMjg2LTcyLjk1NyA3Ni4yNzMtMTE5LjczOCAxLjIyOC0zLjYxNiAxLjIyOC03LjUxOCAwLTExLjEzNC00MS4xMDctMTIwLjI5LTE1MS40NzUtMjAxLjEwNi0yNzQuNjQxLTIwMS4xMDZ6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTM0My45ODMgMjcwLjkyMSAzMS4wNjMgMzEuMDYzYzIuMjYtOC40ODUgMy44NTItMTcuMjMzIDMuODUyLTI2LjQyMyAwLTU2Ljk4My00Ni4zNTMtMTAzLjMzNy0xMDMuMzM3LTEwMy4zMzctOS4xOSAwLTE3LjkzOCAxLjU5Mi0yNi40MjMgMy44NTJsMzEuMDYzIDMxLjA2M2MzNC4yMzUgMi4zMjkgNjEuNDUzIDI5LjU0NyA2My43ODIgNjMuNzgyeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0zNC40NDEgNTguNzk2IDY5LjgzNyA2OS44MzdjLTQ2LjI1MyAzNC45OC04My4zODUgODIuOTE0LTEwMy4zNTggMTQxLjM2MS0xLjIyOCAzLjYxNi0xLjIyOCA3LjUxOCAwIDExLjEzNCA0MS4xMDYgMTIwLjI5MSAxNTEuNDczIDIwMS4xMDcgMjc0LjY0IDIwMS4xMDcgNTEuMiAwIDk5LjU1Ny0xNS4wNDUgMTQyLjIxNi00MC4xMDNsNzQuNTQ5IDc0LjU0OSAyNC4zNTQtMjQuMzU0LTQ1Ny44ODUtNDU3Ljg4Ni0yNC4zNTQgMjQuMzU0em0yNDEuMTIgMzg4Ljk5NGMtMTA2LjUzMiAwLTIwMi4yODQtNjguOTc1LTI0MC4wNzctMTcyLjIyOCAxOC42NC01MC45MzEgNTIuMTM3LTkyLjM1OCA5My4zNzgtMTIyLjM0NWw2Mi42NDkgNjIuNjQ5Yy0xMi4wNCAxNi44OTctMTkuMjg3IDM3LjQxNC0xOS4yODcgNTkuNjk1IDAgNTYuOTgzIDQ2LjM1MyAxMDMuMzM3IDEwMy4zMzcgMTAzLjMzNyAyMi4yODEgMCA0Mi43OTgtNy4yNDcgNTkuNjk1LTE5LjI4N2w1Ny4zMTUgNTcuMzE1Yy0zNS41NzIgMTkuMjc2LTc1LjE5MyAzMC44NjQtMTE3LjAxIDMwLjg2NHptLTU5LjEzMi0yMDcuMDA1IDkzLjkxIDkzLjkxYy0xMC4yNDcgNi4wNTEtMjIuMDM5IDkuNzU5LTM0Ljc3OCA5Ljc1OS0zNy45OTUgMC02OC44OTEtMzAuODk3LTY4Ljg5MS02OC44OTEgMC0xMi43MzkgMy43MDgtMjQuNTMxIDkuNzU5LTM0Ljc3OHoiIGZpbGw9IiMwMDAwMDAiLz48L3N2Zz4K';
              }
            }
         </script>
        
         
    </head>

	<body>
		<h1>Corso Mbsr</h1>
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
    			
    			<div class="col-9 tenda">
    				
    					<div class="col-11">
    						<div class="roi">
    							Inserisci i tuoi dati e la nuova password <?php echo $mexpwd;?>
    						</div>
        				</div>
                		<div class="col-6">	
                				<?php echo $emailErr;$emailErr='';?>
                				<input name="email" type="TEXT" placeholder="Email" required>
                				
						</div>    			
                		<div class="col-8">
                		
            			<?php echo $infoErr;$infoErr='';?>	
                    	<div class="col-6 sezione">
                    		<input name="nome" type="TEXT"   placeholder="Nome" required >
                    	</div>
                    	<div class="col-6 sezione">
                    		<input name="cognome" type="TEXT"   placeholder="Cognome" required >
                    	</div>
                    	<?php echo $pwdErr;?>
                			                				
                			<div class="col-12">
                				<div class="occhio">
                				      <img  id="myImage" onclick="myFunction1()" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1NTEuMTIyIDU1MS4xMjIiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDU1MS4xMjIgNTUxLjEyMiIgd2lkdGg9IjI0cHgiPjxwYXRoIGQ9Im0yNzUuNTYxIDY4Ljg4N2MtMzguNjkgMC03NS43NiA4Ljc2OS0xMTAuMTc0IDIzLjQzN2wyNi4yMzYgMjYuMjM2YzI2LjU4NS05LjYzMSA1NC43NjgtMTUuMjI4IDgzLjkzOC0xNS4yMjggMTA2LjUzMiAwIDIwMi4yODQgNjguOTc1IDI0MC4wNzcgMTcyLjIyOC0xNC40MDEgMzkuMzQ4LTM3LjMwNSA3My42MTEtNjUuOTMxIDEwMS4wODNsMjQuMjIyIDI0LjIyMmMzMy42MTUtMzIuNDEgNjAuMjg2LTcyLjk1NyA3Ni4yNzMtMTE5LjczOCAxLjIyOC0zLjYxNiAxLjIyOC03LjUxOCAwLTExLjEzNC00MS4xMDctMTIwLjI5LTE1MS40NzUtMjAxLjEwNi0yNzQuNjQxLTIwMS4xMDZ6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTM0My45ODMgMjcwLjkyMSAzMS4wNjMgMzEuMDYzYzIuMjYtOC40ODUgMy44NTItMTcuMjMzIDMuODUyLTI2LjQyMyAwLTU2Ljk4My00Ni4zNTMtMTAzLjMzNy0xMDMuMzM3LTEwMy4zMzctOS4xOSAwLTE3LjkzOCAxLjU5Mi0yNi40MjMgMy44NTJsMzEuMDYzIDMxLjA2M2MzNC4yMzUgMi4zMjkgNjEuNDUzIDI5LjU0NyA2My43ODIgNjMuNzgyeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0zNC40NDEgNTguNzk2IDY5LjgzNyA2OS44MzdjLTQ2LjI1MyAzNC45OC04My4zODUgODIuOTE0LTEwMy4zNTggMTQxLjM2MS0xLjIyOCAzLjYxNi0xLjIyOCA3LjUxOCAwIDExLjEzNCA0MS4xMDYgMTIwLjI5MSAxNTEuNDczIDIwMS4xMDcgMjc0LjY0IDIwMS4xMDcgNTEuMiAwIDk5LjU1Ny0xNS4wNDUgMTQyLjIxNi00MC4xMDNsNzQuNTQ5IDc0LjU0OSAyNC4zNTQtMjQuMzU0LTQ1Ny44ODUtNDU3Ljg4Ni0yNC4zNTQgMjQuMzU0em0yNDEuMTIgMzg4Ljk5NGMtMTA2LjUzMiAwLTIwMi4yODQtNjguOTc1LTI0MC4wNzctMTcyLjIyOCAxOC42NC01MC45MzEgNTIuMTM3LTkyLjM1OCA5My4zNzgtMTIyLjM0NWw2Mi42NDkgNjIuNjQ5Yy0xMi4wNCAxNi44OTctMTkuMjg3IDM3LjQxNC0xOS4yODcgNTkuNjk1IDAgNTYuOTgzIDQ2LjM1MyAxMDMuMzM3IDEwMy4zMzcgMTAzLjMzNyAyMi4yODEgMCA0Mi43OTgtNy4yNDcgNTkuNjk1LTE5LjI4N2w1Ny4zMTUgNTcuMzE1Yy0zNS41NzIgMTkuMjc2LTc1LjE5MyAzMC44NjQtMTE3LjAxIDMwLjg2NHptLTU5LjEzMi0yMDcuMDA1IDkzLjkxIDkzLjkxYy0xMC4yNDcgNi4wNTEtMjIuMDM5IDkuNzU5LTM0Ljc3OCA5Ljc1OS0zNy45OTUgMC02OC44OTEtMzAuODk3LTY4Ljg5MS02OC44OTEgMC0xMi43MzkgMy43MDgtMjQuNTMxIDkuNzU5LTM0Ljc3OHoiIGZpbGw9IiMwMDAwMDAiLz48L3N2Zz4K"/>
                					</div>
                					<input name="pwd1" type="password"  maxlength="8" id="myInput" placeholder="Crea nuova password" required  >
                				
                				
                					<input name="pwd2" type="password"  oninput="compare_pwd()" maxlength="8" id="myInput1" placeholder="Conferma Password" required  >
                				    <p id="mex_err"><p>
                				<!-- Questo script manda un messaggio se le password non coincidono -->
                				   
                				<script>
                        			function compare_pwd(){
                        				var pwd=document.getElementById("myInput").value;
                        				var	pwd1=document.getElementById("myInput1").value;
                        				if (pwd === pwd1){
                        					document.getElementById("mex_err").innerHTML=
                            				"Passwrord: ok!";
                        					document.getElementById("mex_err").style.color=
                            				'green';
                        				} else {
                        					document.getElementById("mex_err").innerHTML=
                                				"Le password non coincidono";
                        					document.getElementById("mex_err").style.color=
                                				'red';
                            				}
                        			}
                                 </script>
            				</div>
                    	<div class="col-12">
                    		<input type="submit" value="Invia"/>
                    	</div>
            
            </div>
            
    		</form>
    	
	</body>
</html>