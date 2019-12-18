<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
		# Ex 4 : 
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if (empty($_POST["Name"])||empty($_POST["ID"])||empty($_POST["Courses"])
		||empty($_POST["CardNumber"])||empty($_POST["Card"])) {
		?>
		<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <span> <a href = "gradestore.html"> Try again?</a></span></p>
		<!-- Ex 4 : -->
			<!-- Display the below error message : --> 
		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		} elseif (!preg_match("/[a-zA-Z]/",$_POST["Name"])){ 
		?>

		<!-- Ex 5 : 
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		} elseif (!preg_match("/[0-9]{16}/",$_POST["CardNumber"])) {
		?>

		<!-- Ex 5 : 
			Display the below error message :  -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>

		<?php
		# if all the validation and check are passed 
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<?php 
			$Name = $_POST["Name"];
			$ID = $_POST['ID'];
			$Courses = $_POST['Courses'];		
			$Grade = $_POST['Grade'];
			$CardNumber = $_POST['CardNumber'];
			$Card = $_POST['Card'];
		?>
		<ul> 
			<li>Name: <?php echo $Name ?></li>
			<li>ID: <?php echo $ID ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?php echo processCheckbox($Courses) ?></li>
			<li>Grade: <?php echo $Grade ?></li>
			<li>Credit Card: <?php echo $CardNumber;echo "  ($Card)" ?></li>
		</ul>
		
		
		<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
			file_put_contents($filename, "$Name;$ID;$CardNumber;$Card\n", FILE_APPEND);
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

			<pre><?php echo file_get_contents($filename)?></pre>
		<?php
		# }
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
		}	
			function processCheckbox($names){ 
				$result = "";
				for ($i=0;$i<count($names);$i++){
					$result = $result."$snames[$i]";
					if ($i != (count($names)-1) ){
						$result = $result.", ";
					}
				}
				return $result;
			}
		
		?>
		
	</body>
</html>
