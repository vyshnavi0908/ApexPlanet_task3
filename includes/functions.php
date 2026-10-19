<?php
function e(?string $s):string{return htmlspecialchars($s??'',ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');}
function redirect(string $p):never{header('Location: '.(str_starts_with($p,'http')?$p:BASE_URL.'/'.ltrim($p,'/')));exit;}
function is_logged_in():bool{return isset($_SESSION['user']['id']);}
function current_user():?array{return $_SESSION['user']??null;}
function require_login():void{if(!is_logged_in()){set_flash('error','Please log in first.');redirect('login.php');}}
function require_admin():void{require_login();if(($_SESSION['user']['role']??'')!=='admin'){http_response_code(403);render_header('Access denied');echo '<section class="panel"><h1>Access denied</h1><p>Administrator access is required.</p></section>';render_footer();exit;}}
function csrf_token():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function verify_csrf():void{if(!isset($_POST['csrf_token'])||!hash_equals(csrf_token(),(string)$_POST['csrf_token'])){http_response_code(419);exit('Form expired. Refresh and try again.');}}
function set_flash(string $t,string $m):void{$_SESSION['flash']=['type'=>$t,'message'=>$m];}
function render_header(string $title):void{$u=current_user();$f=$_SESSION['flash']??null;unset($_SESSION['flash']);echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.e($title).' | '.e(APP_NAME).'</title><link rel="stylesheet" href="'.e(BASE_URL).'/assets/css/style.css"><script defer src="'.e(BASE_URL).'/assets/js/app.js"></script></head><body><header><a class="brand" href="'.e(BASE_URL).'/">APEXPLANET <small>TASK 3</small></a><button class="nav-toggle" aria-label="Toggle navigation">☰</button><nav class="nav">';if($u){echo '<a href="'.e(BASE_URL).'/dashboard.php">Dashboard</a><a href="'.e(BASE_URL).'/profile.php">My profile</a>';if($u['role']==='admin')echo '<a href="'.e(BASE_URL).'/admin/users.php">Users</a>';echo '<a class="nav-cta" href="'.e(BASE_URL).'/logout.php">Log out</a>';}else echo '<a href="'.e(BASE_URL).'/login.php">Log in</a><a class="nav-cta" href="'.e(BASE_URL).'/register.php">Register</a>';echo '</nav></header><main class="container">';if($f)echo '<div class="alert '.e($f['type']).'">'.e($f['message']).'</div>';}
function render_footer():void{echo '</main><footer>APEXPLANET · FULL STACK WEB DEVELOPMENT · TASK 3</footer></body></html>';}
function valid_name(string $n):bool{return mb_strlen(trim($n))>=2&&mb_strlen(trim($n))<=100;}
function strong_password(string $p):bool{return strlen($p)>=8&&preg_match('/[A-Za-z]/',$p)&&preg_match('/[0-9]/',$p);}
function find_user(int $id):?array{$s=db()->prepare('SELECT id,full_name,email,phone,bio,profile_picture,role,created_at FROM users WHERE id=?');$s->execute([$id]);return $s->fetch()?:null;}
