<?php
define('IN_TOOL', 1);
include("constants.php");
$lang = (trim($_GET['lang']) != "") ? $_GET['lang'] : LANG_STANDARD;
if (in_array($lang, $lang_array))
{
include("lang/" . $lang . ".php");
$hinweis_text = $language['hinweis'];
}
else
{
include("lang/" . LANG_STANDARD . ".php");
$hinweis_text = $language['sprachauswahlfehler'];
}
?>
<head>
	<link rel="apple-touch-icon" sizes="57x57" href="../fav/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../fav/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../fav/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../fav/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../fav/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../fav/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../fav/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../fav/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../fav/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../fav/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../fav/favicon-194x194.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../fav/favicon-16x16.png">
	<link rel="manifest" href="../fav/manifest.json">
	<meta name="msapplication-TileColor" content="#900206">
	<meta name="msapplication-TileImage" content="../fav/mstile-144x144.png">
	<meta name="theme-color" content="#900206">
    <title><?php echo $language['title'];?></title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="../js/ometer.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/zxcvbn.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {
		$("#StrengthProgressBar").zxcvbnProgressBar({ passwordInput: "#paswod" });
	});
	</script>
</head>
<center>
<br><br><br>
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $language['title'];?></h3>
  </div>
  <div class="panel-body">
<iframe width="50" frameborder="0" scrolling="no" style="visibility:hidden;display:none" src="https://counter.tqsg.de/dropyetinstallations/countinstalls.php" seamless="seamless"> </iframe>
</html>
<?php
 
   $file = "../config_user.php";
 
echo "<form action=\"$PHP_SELF\" method=\"POST\">";
 
echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\">1.</span>";
echo "<input class=\"form-control\" placeholder=\"".$language['username']."\" type=\"text\" name=\"usna\" maxlength=\"25\" required>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\">2.</span>";
echo "<input class=\"form-control\" placeholder=\"".$language['password']."\" type=\"password\" name=\"paswod\" id=\"paswod\" required>";
echo "</div>";
echo "<BR>";
echo "<div class=\"progress\">";
echo "<div id=\"StrengthProgressBar\" class=\"progress-bar\"></div>";
echo "</div>";

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\">3.</span>";
echo "<input class=\"form-control\" placeholder=\"".$language['email']."\" type=\"email\" name=\"email\">";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\">4.</span>";
echo "<select class=\"form-control\" id=\"lang\" name=\"lang\">
											<option value=\"\" selected disabled>".$language['lang']."</option>
											<option value=\"de\">Deutsch</option>
											<option value=\"en\">English</option>
											<option value=\"cn\">中文 (Chinese)</option>
											<option value=\"es\">Español</option>
											<option value=\"\" disabled>".$language['more_lang']."</option>
										
											</select>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\">5.</span>";
echo "<select class=\"form-control\" id=\"tform\" name=\"tform\">
											<option value=\"\" selected disabled>".$language['dateatime']."</option>
											<option value=\"d.m.Y H:i:s\">".$language['dategerman']."</option>
											<option value=\"m/d/Y h:m:s a\">".$language['dateenglish']."</option>
											<option value=\"Y年m月d日 h点m分s秒 a\">".$language['datechina']." (2016年12月24日 06点00分00秒 pm)</option>
											<option value=\"d-m-Y h:m:s\">".$language['datespanish']." (24-12-2016 18:00:00)</option>
										
											</select>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<select style=\"display:none;\" class=\"form-control\" value=\"".$barcolour."\" id=\"col\" name=\"col\">
											<option value=\"success\" selected>Installationsstandard</option>
										
											</select>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<select style=\"display:none;\" class=\"form-control\" value=\"".$navbarcolour."\" id=\"navcol\" name=\"navcol\">
											<option value=\"default\" selected>Installationsstandard</option>
										
											</select>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<select style=\"display:none;\" class=\"form-control\" value=\"".$backgrounddy."\" id=\"bgdy\" name=\"bgdy\">
											<option value=\"img/bg1.jpg\" selected>Installationsstandard</option>
											</select>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<select style=\"display:none;\" class=\"form-control\" value=\"".$log."\" id=\"logact\" name=\"logact\">
											<option value=\"log/log.txt\" selected>Installationsstandard</option>
											</select>";
echo "</div>";
echo "<BR>";


echo "<br>"; 
echo "<input type=\"submit\" class=\"btn btn-success btn-block\" name=\"gesendet\" value=\"".$language['save']."\">";
echo "</form><BR>";

$salt = "tXZlEmX0E2h0qr2knfDz";
 
   if (isset($_POST["gesendet"]))
   {
   $email = $_POST['email'];
   $usna = $_POST['usna'];
   $paswod = $_POST['paswod'];
   $md5paswod = hash('sha512', $salt . $paswod);
   $lang = $_POST['lang'];
   $col = $_POST['col'];
   $navcol = $_POST['navcol'];
   $tform = $_POST['tform'];
   $bgdy = $_POST['bgdy'];
   $logact = $_POST['logact'];
 
      $fp=fopen($file, "w");
      fwrite($fp,"<?php \n");
      fwrite($fp,"\n");
      fwrite($fp,"\$usernamedy = \"".$usna."\";\n");
      fwrite($fp,"\$passworddy = \"".$md5paswod."\";\n");
	  fwrite($fp,"\$emaildy = \"".$email."\";\n");
	  fwrite($fp,"\$languagedy = \"".$lang."\";\n");
	  fwrite($fp,"\$barcolour = \"".$col."\";\n");
	  fwrite($fp,"\$navbarcolour = \"".$navcol."\";\n");
	  fwrite($fp,"\$timeform = \"".$tform."\";\n");
	  fwrite($fp,"\$backgrounddy = \"".$bgdy."\";\n");
	  fwrite($fp,"\$log = \"".$logact."\";\n");
      fwrite($fp,"\n");
      fwrite($fp,"?>");
      fclose($fp);
      echo "<div class=\"alert alert-success\" role=\"alert\">".$language['finished']."</div>";
} 
?>
<div class="alert alert-danger" role="alert"><?php echo $language['del_info'];?></div>
<form method="post">
   <input class="btn btn-danger btn-block" name="delete" type="submit" value="<?php echo $language['del'];?>">
</form>    

<?php
    if(isset($_POST['delete']))
    {
        function removeDirectory($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	rmdir($path);
 	return;
	}
	removeDirectory('../install');
    }
?>
<br>
</div>
<div class="panel-footer">© 2013 - 2019 <a target="_blank" href="https://www.maximiliansixdorf.de">Maximilian Sixdorf</a> | DropYet 2.4.6.3 | <a target="_blank" href="../LICENSE"><?php echo $language['license'];?></a> | <a href="?lang=de"><img border="0" alt="Deutsch" src="img/de.png" width="16" height="11"></a> - <a href="?lang=en"><img border="0" alt="English" src="img/us.png" width="16" height="11"></a> - <a href="?lang=cn"><img border="0" alt="中國" src="img/cn.png" width="16" height="11"></a> - <a href="?lang=es"><img border="0" alt="Español" src="img/es.png" width="16" height="11"></a></div>
</div>
</div>
</div>
</center>