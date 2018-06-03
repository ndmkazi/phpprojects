<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Program 1</title>	
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-sm-12">
			<h3>1. Write a program to concatenate two strings character by character.</h3>
			<h4>String 1 : JOHN</h4>
			<h4>String 2 : SMITH</h4>
			<?php
			//Write a program to concatenate two strings character by character. e.g : JOHN + SMITH = JSOMHINTH.

			$txt1 = "JOHN";
			$txt2 = "SMITH";

			$len1 = strlen($txt1);
			$len2 = strlen($txt2);	//get length of both strings 

			$max = max($len1,$len2); //to get maximum length

			$op = "";				// variable to store output
		
			for($i=0; $i < $max; $i++) {
				if(isset($txt1[$i])){		// checks if character is available or not at position
					$op .= $txt1[$i];
				}
				if(isset($txt2[$i])){
					$op .= $txt2[$i];
				}
			}
			echo "<h3>Output : ".$op."</h3>"; 
		?>
		<br/>
		<h3>2. WAP to concatenate first string with reverse of second string.</h3>
			<h4>String 1 : JOHN</h4>
			<h4>String 2 : SMITH</h4>
		<?php
			//to concatenate first string with reverse of second string.
			
			$result = "";
			$tmp = $max;	//variable to reverse of second string

			for($i=0; $i < $max; $i++){
				if(isset($txt1[$i])){
					$result .= $txt1[$i];
				}
				$tmp--;
				if(isset($txt2[$tmp])) {
					$result .= $txt2[$tmp];
				}
			}

			echo "<h3>Output : ".$result."</h3>";

			?>
		</div>
		</div>
	</div>
</body>
</html>