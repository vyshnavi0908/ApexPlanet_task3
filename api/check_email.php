<?php
require_once __DIR__.'/../includes/bootstrap.php';
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
$email=strtolower(trim($_GET['email']??''));
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){http_response_code(400);echo json_encode(['available'=>false,'message'=>'Enter a valid email.']);exit;}
$s=db()->prepare('SELECT id FROM users WHERE email=? LIMIT 1');$s->execute([$email]);$exists=(bool)$s->fetch();
echo json_encode(['available'=>!$exists,'message'=>$exists?'Email already registered.':'Email is available.']);
