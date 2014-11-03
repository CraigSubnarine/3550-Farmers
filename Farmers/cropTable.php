<html>
	<?php session_start(); echo "<h2>".$_SESSION['username']."'s Crops </h2>"; ?>
	<table class="table table-striped">
		<thead>
			<tr><th>Crop</th><th>Amount</th><th>Date</th></tr>
		</thead>
		<tbody>
			<?php
				include 'lib.php';
				if(isset($_SESSION['id']))$sql="SELECT `crops`.`crop`, `crops`.`amount`, `crops`.`date` FROM `crops`WHERE (`crops`.`farmer` =".$_SESSION['id'].");";
				else echo'No session found!';
				$con=connect();
				$result=$con->query($sql);
				if($result) 
					while($row=$result->fetch_assoc()){
						echo"<tr><td>".$row['crop']."</td><td>".$row['amount']."</td><td>".$row['date']."</td></tr>";
					}
			?>
		</tbody>
	</table>
</html>