<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Tweet-Generator</title>
</head>
<body>
	<div class="container-fluid">
	<style type="text/css">
		body { background:PowderBlue; }
	</style>
		<div class="col-sm-3 col-md-2 sidebar">
		</div>
		<div class="col-sm-6 col-sm-4">
			<h1 class="page-header">Tweet-Generator</h1>
			<form role="form" action="Interface.php" method="post" i
d="tgvars" accept-charset="UTF-8">

                <div class="form-group">
					<p><label for="text">Number of tweets: <
/label>
                        <input type="number" name="quantity" min="1" value="100"
 size="1"></p>

				    <p><input type="number" name="num1" min="0"
max="100" size="1" value="100" id="p1">
                    <label for="text">%</label>
                    <input type="text" name="name1" min="0" max="100" size="10">
                    <input type= "radio" name="polarity1" value="pos" > pos&nbsp
                    <input type= "radio" name="polarity1" value="neg" > neg&nbsp
                    <input type= "radio" name="polarity1" value="neut" > neut&nb
sp</p>

                    <p><input type="number" name="num2" min="0" max="100" size="
1" value="0" id="p2">
                    <label for="text">%</label>
                    <input type="text" name="name2" min="0" max="100" size="10">
                    <input type= "radio" name="polarity2" value="pos" > pos&nbsp
                    <input type= "radio" name="polarity2" value="neg" > neg&nbsp
                    <input type= "radio" name="polarity2" value="neut" > neut&nb
sp</p>

                    <p><input type="number" name="num3" min="0" max="100" size="
1" value="0" id="p3">
                    <label for="text">%</label>
                    <input type="text" name="name3" min="0" max="100" size="10">
                    <input type= "radio" name="polarity3" value="pos" > pos&nbsp
                    <input type= "radio" name="polarity3" value="neg" > neg&nbsp
                    <input type= "radio" name="polarity3" value="neut" > neut&nb
sp</p>

                 <p id="message"></p>

				</div>


				<input type="submit" name="submit"  id="button"
class="btn btn-default"/>
			</form>


		<?php
		include 'TweetGenerator.php';

		$quantity = $_POST['quantity'];
		$array = array();

		if (!empty($_POST['polarity1'])){
			$arr1 = array($_POST['num1'], $_POST['name1'], $_POST['p
olarity1']);
			array_push($array, $arr1);
		}

		if (!empty($_POST['polarity2'])){
			$arr2 = array($_POST['num2'], $_POST['name2'], $_POST['p
olarity2']);
			array_push($array, $arr2);
		}

		if (!empty($_POST['polarity3'])){
			$arr3 = array($_POST['num3'], $_POST['name3'], $_POST['p
olarity3']);
			array_push($array, $arr3);
		}


		$tweets = generateTweets($quantity, $array);
		
		foreach ($tweets as $key => $value){
			
			echo $value . "\n\n";
			}
		


		?>

              <script>
                        document.getElementById("p1").addEventListener("change",
 myFunction);
                        document.getElementById("p2").addEventListener("change",
 myFunction);
                        document.getElementById("p3").addEventListener("change",
 myFunction);

                        function myFunction() {
                        var x = document.getElementById("p1").value;
                        var y = document.getElementById("p2").value;
                        var z = document.getElementById("p3").value;

                        if (parseInt(x) + parseInt(y) + parseInt(z)>100){
                            document.getElementById("message").innerHTML = "Perc
entages add up to more than 100!";
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