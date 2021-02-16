<?if(basename($_SERVER['PHP_SELF'])==basename(__FILE__)){ exit("No direct script access allowed");}?>
<!DOCTYPE html>
<html>
<head>
<title>Hoş geldiniz!</title>
</head>
<link rel="stylesheet" href="<?=dist_url('merhaba.css')?>">
<body>

<div class="content">
	<div class="bigtext">Hoş geldiniz!</div> 
    Merhaba. Bu <b>WebMaVie</b> yazılım tarafından hazırlanan ve yazılımlarınızın yazılma süresini azaltan hemde daha güvenli hale getiren yazılımdır. Proje başlatmak için <b><?=VIEW_FOLDER?></b> klasörü içerisindeki <b><?=DEFAULT_INDEX?></b> dosyasını düzenleyiniz veya kendi dosyanızı oluşturunuz.
    <br/><br/>
    <a href="https://webmavie.github.io/wmvwork/">Kullanım klavuzu</a> | <a href="https://github.com/webmavie/wmvwork">Versiyon kontrolü</a>
    <hr/>
    <div class="right">
        Saygılarla <a href="https://instagram.com/webmavie">WebMaVie</a>
    </div>
    <div class="left">
        <b>Versiyon: 2.5</b>
    </div>
</div>
</body>
</html>