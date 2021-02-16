<?if(basename($_SERVER['PHP_SELF'])==basename(__FILE__)){ exit("No direct script access allowed");}?>
<!DOCTYPE html>
<html>
<head>
<title>Hata!</title>
</head>
<link rel="stylesheet" href="<?=dist_url('hata.css')?>">
<body>

<div class="content">
	<div class="bigtext">Hata!</div> 
   Sayfa bulunmadığında bu sayfa gelir. Hata sayfasını değiştirmek için <b><?=VIEW_FOLDER?></b> klasörü içerisindeki <b><?=ERROR_PAGE?></b> dosyasını düzenleyiniz.
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
