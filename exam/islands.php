<?php
require __DIR__ . '/lib/islands.inc.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<script type="text/javascript" src="jquery-2.2.3.min.js"></script>
	<link href="islands.css" type="text/css" rel="stylesheet" />
	<title>Islands</title>
</head>
<body>
<form id="gameform" action="post/islands.php" method="POST">
	<fieldset>
		<p><?php echo $islands->getName(); ?>'s Islands</p>
		<?php
		$html = '<table><caption></caption>';
		$data = $islands->getIslands();
		$sol = $islands->getSolution();
		$check = $islands->getCheck();
		$message = $islands->getMessage();

		for ($i = 0; $i < 8; $i++) {
			$html .= "<tr>";
			for ($j = 0; $j < 8; $j++) {
				$entity = $data[$i][$j];
				if (array_key_exists('img', $entity)) {
					$html .= '<td';
					if ($check && $data[$i][$j] !=  $sol[$i][$j]) {
						$html .= ' class="bad"';
					}
					$html .= '><img src="images/' . $entity['img']  . '" alt="line"></>';
				}
				elseif (array_key_exists('num', $entity)) {
					$html .= '<td class="island"><button ';
					if (array_key_exists('clicked', $entity)) {
						$html .= 'class="clicked" ';
					}
					$html .= 'name="island" value="' . $i . ','. $j .'">' . $entity['num'] . '</button></td>';
				}
				else {
					$html .= '<td';
					if ($check && $data[$i][$j] !=  $sol[$i][$j]) {
						$html .= ' class="bad"';
					}
					$html .= '>&nbsp;</>';
				}
			}
			$html .= "</tr>";
		}

		$html .= "</table>";
		if ($check) {
			if ($data != $sol) {
				$html .= '<p>Solution is not correct</p>';
			}
			else {
				$html .= '<p>You Win!</p>';
			}
		}
		if ($message !== null) {
			$html .= '<p>' . $message . '</p>';
		}
		echo $html;
		?>

		<p><input type="submit" name="check" value="Check"></p>
		<p><input type="submit" name="giveup" value="Give Up"></p>
		<p><input type="submit" name="newgame" value="New Game"></p>
	</fieldset>
</form>

</body>
</html>