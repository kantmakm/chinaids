<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
header("Content-Type: text/html;charset=UTF-8");
?>
<?php
function get_ip() {
		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$the_ip = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		return $the_ip;
	}
?>

<?php

if (strlen($_POST["element_2"]) <= 7) {

echo '<script language="javascript">';
echo 'alert("DOB should be 8 digits!");';
echo 'location.href="index.php";';
echo '</script>';


exit;
}

elseif  (strlen($_POST["element_2"]) >= 9) {

echo '<script language="javascript">';
echo 'alert("DOB should be 8 digits!");';
echo 'location.href="index.php";';
echo '</script>';


exit;
}
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
	
		<h1><a>Chinese ID checksum</a></h1>
		<form id="form_1053692" class="appnitro"  method="post" action="test.php">
					<div class="form_description">
			<h2>Chinese ID (身份证 - Shen Fen Zheng) Generator</h2>
			<p>creates valid Chinese Resident ID numbers including checksum digit</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Your valid 18 digit Chinese IDs</label>
		<div>
<?php
mysql_connect('localhost', 'USERNAME', 'PASSWD');
mysql_query("set names 'utf8'");
mysql_select_db('code-com_wp');

$sql = "SELECT  DISTINCT `gbcode` ,  `pinyin` , `hanzi` FROM  `UTF8-gbcodes1SIMP` where gbcode=" . $_POST["element_1"];
$result = mysql_query($sql);



while ($row = mysql_fetch_array($result)) {

    echo "ID's for DOB: " . $_POST["element_2"] . " Born in: " . $row['pinyin'] . " - " . $row['hanzi'] . "<p>";
    
    $gbcode = $row['gbcode'];
    $raddr = get_ip();
    $dob = $_POST['element_2'];
    $loc = $row['pinyin'];
    $sex = $_POST['element_3'];

$sql2 = "INSERT INTO `generated_ids` (`china_id`, `remote_ip`, `dob`, `location`, `sex`) VALUES ('$gbcode', '$raddr', '$dob', '$loc', '$sex');";
mysql_query($sql2);

    
}

mysql_close();
?>
You can validate the numbers here:  <a href="http://qq.ip138.com/idsearch/" target=_blank>http://qq.ip138.com/idsearch/</a> or <a href="http://www.cfguide.com/TOOL/ID_card_locator.asp?" target=_blank>http://www.cfguide.com/TOOL/ID_card_locator.asp?</a><p>


<?php

    function checkSum($string) {
        //
        $wi = array( 7 , 9 , 10 , 5 , 8 , 4 , 2 , 1 , 6 , 3 , 7 , 9 , 10 , 5 , 8 , 4 , 2 );

        //
        $ai = array( '1' , '0' , 'X' , '9' , '8' , '7' , '6' , '5' , '4' , '3' , '2' );

        //17
        for ( $i = 0 ; $i < 17 ; $i ++) { 
            // the ith char of $body
            $b = (int) $string { $i };

            //
            $w = $wi [ $i ];

            //?
            $sigma += $b * $w ; 
        }

        //
        $number = $sigma % 11 ;

        //? 
        $check_number = $ai [ $number ];

        //
        echo $string . $check_number;

    }
	
	function calculateBoysArray($code) {
        $boys_array = array('101');

        for ($i = 3; $i < 1000; $i +=2) {
            $digit;

            if ($i < 10) {
                $digit = "00" . strval($i);
            } else if ($i < 100) {
                $digit = "0" . strval($i);
            } else {
                $digit = strval($i);
            }

            $boys_array[] = $code . $digit;
        }

        return $boys_array;    
    }

    function calculateGirlsArray($code) {
        $girls_array = array();
        
        for ($i = 0; $i < 1000; $i +=2) {
            $digit;

            if ($i < 10) {
                $digit = "00" . strval($i);
            } else if ($i < 100) {
                $digit = "0" . strval($i);
            } else {
                $digit = strval($i);
            }

            $girls_array[] = $code . $digit;
        }    

        return $girls_array;
    }
  
  $baseid = $_POST["element_1"] . $_POST["element_2"];
  $gender = $_POST["element_3"];
  
  
  if ($gender == "male") {
     foreach (calculateBoysArray($baseid) as $id) {
	 echo checkSum($id);
     echo '<br>';
     }	 
	} else {
	 foreach (calculateGirlsArray($baseid) as $id) {
	 echo checkSum($id);
     echo '<br>';
      }
     }
    
?>





		</div> 
		
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

		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87846-2', 'auto');
  ga('send', 'pageview');

</script>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	

	</body>
</html>