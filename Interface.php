<html>
<head>
</head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<title>TweetGenerator</title>
</head>
<body>
	<?php
//	ini_set('display_errors','On');
//	error_reporting(E_ALL | E_STRICT );
	?>

	<div class="container-fluid">
	<style type="text/css">
		body { background:PowderBlue; }
	</style>
		<div class="col-sm-3 col-md-2 sidebar">
		</div>
		<div class="col-sm-6 col-sm-4">
			<h1 class="page-header">TweetGenerator</h1>
			
			<?php//The following form contains 5 lines which can be used for input.
			//Per default, only the first line is visible.
			?>
			<form role="form" action="Interface.php" method="post" id="tgvars" accept-charset="UTF-8">

                <div class="form-group">
				<p><label for="text">Number of tweets: </label>
                    
                    <p><input type="number" name="quantity" min="1" value="20" size="1"></p>
					
					<p>		
					<label for="text"> Topic: </label>
                    <input type="text" name="name1" min="0" max="100" size="10">
                    <label for="text">&nbsp Percentage: </label>
		    		<input type="number" name="num1" min="0" max="100" size="1" value="100" id="p1">
                    <label for="text">&nbsp Sentiment: </label>
                    <input type= "radio" id= "radio11" name="polarity1" value="pos" > pos
                    <input type= "radio" id= "radio12" name="polarity1" value="neg" > neg
                    <input type= "radio" id= "radio13" name="polarity1" value="neut" > neut</p>
					
					<p>
					<div id="div2" style="display: none;"> 
					<label for="text"> Topic: </label>
                    <input type="text" name="name2" min="0" max="100" size="10">
                    <label for="text">&nbsp Percentage: </label>
		    		<input type="number" name="num2" min="0" max="100" size="1" value="0" id="p2">
                    <label for="text">&nbsp Sentiment: </label>
                    <input type= "radio" id= "radio21" name="polarity2" value="pos" > pos
                    <input type= "radio" id= "radio22" name="polarity2" value="neg" > neg
                    <input type= "radio" id= "radio23" name="polarity2" value="neut" > neut
                    </div>
                    </p>
                    
                    <p>
					<div id="div3" style="display: none;"> 
                    <label for="text"> Topic: </label>
                    <input type="text" name="name3" min="0" max="100" size="10">
                    <label for="text">&nbsp Percentage: </label>
		    		<input type="number" name="num3" min="0" max="100" size="1" value="0" id="p3">
                    <label for="text">&nbsp Sentiment: </label>
                    <input type= "radio" id= "radio31" name="polarity3" value="pos" > pos
                    <input type= "radio" id= "radio32" name="polarity3" value="neg" > neg
                    <input type= "radio" id= "radio33" name="polarity3" value="neut" > neut
                    </div>
                    </p>
                    
                    <p>
					<div id="div4" style="display: none;"> 
					<label for="text"> Topic: </label>
                    <input type="text" name="name4" min="0" max="100" size="10">
                    <label for="text">&nbsp Percentage: </label>
		    		<input type="number" name="num4" min="0" max="100" size="1" value="0" id="p4">
                    <label for="text">&nbsp Sentiment: </label>
                    <input type= "radio" id= "radio41" name="polarity4" value="pos" > pos
                    <input type= "radio" id= "radio42" name="polarity4" value="neg" > neg
                    <input type= "radio" id= "radio43" name="polarity4" value="neut" > neut
                    </div>
                    </p>
                    
                    <p>
					<div id="div5" style="display: none;"> 
					<label for="text"> Topic: </label>
                    <input type="text" name="name5" min="0" max="100" size="10">
                    <label for="text">&nbsp Percentage: </label>
		    		<input type="number" name="num5" min="0" max="100" size="1" value="0" id="p5">
                    <label for="text">&nbsp Sentiment: </label>
                    <input type= "radio" id= "radio51" name="polarity5" value="pos" > pos
                    <input type= "radio" id= "radio52" name="polarity5" value="neg" > neg
                    <input type= "radio" id= "radio53" name="polarity5" value="neut" > neut
                    </div>
                    </p>
                      
                     
                    <?php// If an invalid combination of percentages is entered, an error message will
                    // be displayed here.
                    ?>
                     
                    <p id="message" style="color:red"></p>

					</div>

		<?php// At the end of the form is the submit-button, which will post the input to the file
		// itself, activating the php script down below.?>
		
		<input type="submit" name="submit"  id="button" class="btn btn-default"/>
			</form>


		<?php
		
		// The script extracts the given input from the forms and adds it to 
		// an array which will be sent to the function GenerateTweets.
		// A line will be considered only if the radio butten was clicked.
		
		include 'TweetGenerator.php';

		$quantity = $_POST['quantity'];
		$array = array();
		$isgenerateTweets = FALSE;

		if (!empty($_POST['polarity1'])){
			$arr1 = array($_POST['num1'], $_POST['name1'], $_POST['polarity1']);
			array_push($array, $arr1);
			$isgenerateTweets = TRUE;
		}

		if (!empty($_POST['polarity2'])){
			$arr2 = array($_POST['num2'], $_POST['name2'], $_POST['polarity2']);
			array_push($array, $arr2);
			$isgenerateTweets = TRUE;
		}

		if (!empty($_POST['polarity3'])){
			$arr3 = array($_POST['num3'], $_POST['name3'], $_POST['polarity3']);
			array_push($array, $arr3);
			$isgenerateTweets = TRUE;
		}
		
		if (!empty($_POST['polarity4'])){
			$arr4 = array($_POST['num4'], $_POST['name4'], $_POST['polarity4']);
			array_push($array, $arr4);
			$isgenerateTweets = TRUE;
		}

		if (!empty($_POST['polarity5'])){
			$arr5 = array($_POST['num5'], $_POST['name5'], $_POST['polarity5']);
			array_push($array, $arr5);
			$isgenerateTweets = TRUE;
		}



	
		// if one or more radio buttons was clicked, the following function wil be
		// executed. it takes the number of tweets and an array, consisting of arrays
		// with the data from each line. it returns an array of tweets.
		// the tweets are extractes by the for loop and put into a html list.
		
		if ($isgenerateTweets){
			echo "<br><label>Tweets:</label><ol type=1>";

		$tweets = generateTweets($quantity, $array);

		foreach ($tweets as $key => $value){

			echo "<li>" .  $value ."</li><br>";
			}
			"</ol>";


		
		}
		?>

              <script>
              
              // these event listeners call the respective functions when percentage values
              // or radiobuttons are changed
              
                        document.getElementById("p1").addEventListener("change", myFunction);			
                        document.getElementById("p2").addEventListener("change", myFunction);			
                        document.getElementById("p3").addEventListener("change", myFunction);			
                        document.getElementById("p4").addEventListener("change", myFunction);			
                        document.getElementById("p5").addEventListener("change", myFunction);	
                        		
			document.getElementById("radio11").addEventListener("change", addline2);				
			document.getElementById("radio12").addEventListener("change", addline2);				
			document.getElementById("radio13").addEventListener("change", addline2);
 						
 			document.getElementById("radio21").addEventListener("change", addline3);				
 			document.getElementById("radio22").addEventListener("change", addline3);				
 			document.getElementById("radio23").addEventListener("change", addline3);
 						
 			document.getElementById("radio31").addEventListener("change", addline4);				
 			document.getElementById("radio32").addEventListener("change", addline4);				
 			document.getElementById("radio33").addEventListener("change", addline4);
 						
 			document.getElementById("radio41").addEventListener("change", addline5);				
 			document.getElementById("radio42").addEventListener("change", addline5);				
 			document.getElementById("radio43").addEventListener("change", addline5);
                        
                        // the addlineX functions display the next line taking input
                        // moreover, they calculate the remaining number of 
                        // percentages and display the value in the added line
                        
                        function addline2(){
                    	document.getElementById("div2").style = "display=block";
                    	var x = 100 - parseInt(document.getElementById("p1").value);
                    	if (x > 0){
                    		document.getElementById("p2").value = x;
                    			}
                    		else{
                    		document.getElementById("p2").value = 0;
                    		}
                        }
                        
                        function addline3(){
                    	document.getElementById("div3").style = "display=block";
                    	var x = 100 - parseInt(document.getElementById("p1").value)
                    				- parseInt(document.getElementById("p2").value);
                    		if (x > 0){
                    		document.getElementById("p3").value = x;
                    			}
                    		else{
                    		document.getElementById("p3").value = 0;
                    		}
                        }
                        
                         function addline4(){
                    	document.getElementById("div4").style = "display=block";
                    	var x = 100 - parseInt(document.getElementById("p1").value)
                    				- parseInt(document.getElementById("p2").value)
                    				- parseInt(document.getElementById("p3").value);
                    		if (x > 0){
                    		document.getElementById("p4").value = x;
                    			}
                    		else{
                    		document.getElementById("p4").value = 0;
                    		}
                        }
                        
                           function addline5(){
                    	document.getElementById("div5").style = "display=block";
                    	var x = 100 - parseInt(document.getElementById("p1").value)
                    				- parseInt(document.getElementById("p2").value)
                    				- parseInt(document.getElementById("p3").value)
                    				- parseInt(document.getElementById("p4").value);
                    		if (x > 0){
                    		document.getElementById("p5").value = x;
                    			}
                    		else{
                    		document.getElementById("p5").value = 0;
                    		}
                        }
                         
                        // the myfunction function makes sure nobody enters percentage
                        // values that add up to more than 100%
                        
			//TO DO: deal with case that user enters <100% 
                        function myFunction() {
                        var x = parseInt(document.getElementById("p1").value);
                       	var y = parseInt(document.getElementById("p2").value);
                       	var z = parseInt(document.getElementById("p3").value);
                       	var a = parseInt(document.getElementById("p4").value);
                       	var b = parseInt(document.getElementById("p5").value);

                        if ((x+y+z+a+b)>100){
                            document.getElementById("message").innerHTML = "Percentages add up to more than 100!";
                            document.getElementById("button").disabled = true;
                        }
                        
                        else{
                            document.getElementById("message").innerHTML = "";
                            document.getElementById("button").disabled = false;
                        }
                        }
                </script>

	</div>
</body>
</html>