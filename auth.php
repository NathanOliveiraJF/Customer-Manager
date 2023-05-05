<?php 

require_once './vendor/autoload.php';
require_once 'Connection.php';

use Firebase\JWT\JWT;

$username = $_POST['username'];
$password = $_POST['password'];

// use Firebase\JWT\Key;

$db = new Connection();

$sql = "SELECT * FROM login WHERE username = :user AND password = :pass";
$stmt = $db->getConnection()->prepare($sql);
$stmt->execute([
    ':user' => $username,
    'pass' => $password
]);
$user = $stmt->fetch();

$key = 'example_key';
$expire_claim = time() * 60;
// claims - declarações sobre uma entidade(user) com dados adicionais.
$payload = [
  'sub' => 'localhost', // entidade a quem pertence o token(id user)
  'iss' => $user['id'], // Identifica quem está solicitando o recurso(user, services or organizations)
  'username' => $user['username'],
  'iat' => time(), // Indica a hora que o JWT foi emitido(criado)
  'exp' => $expire_claim,
];
// $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
$resp = json_encode(array("message" => "login com sucesso", "token" => $token, "expireAt" => $expire_claim));
//echo "<script>localStorage.setItem('key', '$resp');</script>";
echo "<pre>";
print_r($resp);