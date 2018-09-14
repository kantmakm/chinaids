<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
header("Content-Type: text/html;charset=UTF-8");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Chinese ID checksum</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">

	<div id="form_container">
	
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- code-complete1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6478149510168175"
     data-ad-slot="1303551398"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script type="text/javascript">
    var adblock = true;
</script>
<script type="text/javascript" src="adframe.js"></script>
<script type="text/javascript">
    if(adblock) {
alert("You might have an ad blocker - turn it off and try again! Just a couple adsense ads to help keep the lights on.");
window.location.href = "/chinaid/";
    }
</script>

	
		<h1><a>Chinese ID checksum</a></h1>
		<form id="form_1053692" class="appnitro"  method="post" action="validids.php">
					<div class="form_description">
			<h2>Chinese ID (身份证 - Shen Fen Zheng) Generator</h2>
			<p>creates valid Chinese Resident ID numbers including checksum digit
</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Residence Code 6 digit </label>
		<div>
<?php
mysql_connect('localhost', 'dbuser', 'passwd');
mysql_query("set names 'utf8'");
mysql_select_db('code-com_wp');

$sql = "SELECT DISTINCT  `gbcode` ,  `pinyin` ,  `hanzi` FROM  `UTF8-gbcodes1SIMP`";
$result = mysql_query($sql);

echo "<select id='element_1' name='element_1'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['gbcode'] . "'>" . $row['pinyin'] . " - " . $row['hanzi'] . " - " . $row['gbcode'] . "</option>";
}
echo "</select>";

?>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="dob">DOB - yyyymmdd 8 digit </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>year (4), month (2), day (2).</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Male (1) or female (2) </label>
		<div>
		<select id='element_3' name='element_3'>
		<option value='male'>Male</option>
		<option value='female'>Female</option>
		</select>			
		</div><p class="guidelines" id="guide_3"><small>for a male enter 1 for a female enter 2</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1053692" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			code-complete.com
		</div>
		
			<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6478149510168175"
data-ad-slot="1303551398"
data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

	</div>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87846-2', 'auto');
  ga('send', 'pageview');

</script>
	<img id="bottom" src="bottom.png" alt="">

	</body>
</html>
