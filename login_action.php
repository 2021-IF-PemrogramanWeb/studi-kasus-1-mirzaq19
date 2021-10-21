<?php

$email = $_POST['email'];
$password = $_POST['password'];

if($email == 'mirzaq@gmail.com' && $password == '12345')
  echo('Login Berhasil');
else
  echo('Login Gagal');

?>