<?php
$email = $_POST['email'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);
$connect = mysql_connect('PetForFriend','root','');
$db = mysql_select_db('es_trabalho');
  if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM usuariopf WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('E-mail e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{
        setcookie("email",$email);
        header("Location:/home.html");
      }
  }
?>