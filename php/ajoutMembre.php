<?php

include '_connexion.php';

$name = isset($_POST['name'])?$_POST['name']: "";
$firstname = isset($_POST['firstname'])?$_POST['firstname']: "";
$surname = isset($_POST['surname'])?$_POST['surname']: "";
$email = isset($_POST['email'])?$_POST['email']: "";

// var_dump($_POST);

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
  $str = '';
  $max = mb_strlen($keyspace, '8bit') - 1;
  for ($i = 0; $i < $length; ++$i) {
    $str .= $keyspace[random_int(0, $max)];
  }
  return $str;
}
if(isset($_POST['surname'])){
  $numberOfChar = round(rand(8,12));
  $password = random_str($numberOfChar);
  // echo $password;
  $cost = 10;
  // Create a random salt
  $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
  // Prefix information about the hash so PHP knows how to verify it later.
  // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
  $salt = sprintf("$2a$%02d$", $cost).$salt;
  // Hash the password with the salt
  $hash = crypt($password, $salt);
}

// echo $hash;

$res = mysqli_query($cnx,
 "INSERT INTO membre(Nom, Prenom, Identifiant,Mdp, Hash, Super_User, Membre_actif, Mail)
  VALUES ('$name', '$firstname', '$surname', '$password', '$hash', 'false', 'true', '$email')");

print_r($res);
 ?>
