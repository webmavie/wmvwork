<?php
// KENDİNİZE GÖRE DÜZENLEMELERİ YAPINIZ

DEFINE("SITE_URL", "");
DEFINE("DEFAULT_INDEX", "merhaba.php");
DEFINE("ERROR_PAGE", "_hata.php");

DEFINE("DB_HOST", "");
DEFINE("DB_USER", "");
DEFINE("DB_PASS", "");
DEFINE("DB_NAME", "");
DEFINE("DB_PERFIX", "");

DEFINE("SMTP_HOST", "");
DEFINE("SMTP_USERNAME", "");
DEFINE("SMTP_PASSWORD", "");
DEFINE("SMTP_SENDER", "");

DEFINE("DEFAULT_LANGUAGE", "tr");

// DEĞİŞİKLİK YAPILMASI ÖNERİLMİYOR

DEFINE("VIEW_FOLDER", "wmv_view/");
DEFINE("DIST_FOLDER", "wmv_dist/");
DEFINE("UPLOAD_FOLDER", "wmv_upload/");
DEFINE("ERROR_WORD", "<b>I don't find default view files!</b><br/>Default index file name: <b>".DEFAULT_INDEX."</b><br/>Default error file name: <b>".ERROR_PAGE."</b>");


// DOKUNMAYINIZ

header('Content-Type: text/html; charset=utf-8');

require_once("class/pdo.class.php");
require_once("class/wmvsmtp.class.php");

// ini_set('display_errors', '0');
// ini_set('display_startup_errors', '0');
// error_reporting(0);

if (DB_HOST!==""){
    $db=new wmvpdo(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PERFIX);
}

if (SMTP_HOST!==""){
    $mail=new wmvsmtp(SMTP_HOST, SMTP_USERNAME, SMTP_PASSWORD, SMTP_SENDER);
}

function base_url($adress=""){
    $adress=ltrim($adress, '/');
    if (SITE_URL == "") {
        return rtrim(url(), '/').'/'.$adress;
    }else {
        return rtrim(SITE_URL, '/').'/'.$adress;
    }   
}

function dist_url($dist=""){
    $dist=ltrim($dist, '/');
    return base_url(rtrim(DIST_FOLDER, '/')).'/'.$dist;
}

function action_url($data=array()){
    $query=http_build_query($data);
    $query_action=base_url('wmv_core/action.php?').$query;
    return rtrim($query_action, '?');
}

function upload_url($upload=""){
    $upload=ltrim($upload, '/');
    return base_url(rtrim(UPLOAD_FOLDER, '/')).'/'.$upload;
}

function upload_dir($filename=""){
    $fullpath=str_replace(trim(" \ "), "/", dirname(__DIR__));
    return $fullpath.'/'.trim(UPLOAD_FOLDER, "/")."/".$filename;
}


function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}


?>