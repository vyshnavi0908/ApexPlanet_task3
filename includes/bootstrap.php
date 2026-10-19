<?php
if(session_status()!==PHP_SESSION_ACTIVE){ini_set('session.use_strict_mode','1');session_start();}
require_once __DIR__.'/../config/config.php'; require_once __DIR__.'/db.php'; require_once __DIR__.'/functions.php';
