<?php
	include("dataconfig.php");
	$selectsql="SELECT * FROM cinfo";
	$selectsql_for_test="SELECT * FROM contactinfo";

	$connection->query($selectsql);
	$result_contact=$connection->query($selectsql);

	$connection->query($selectsql_for_test);
	$result_contact_for_test=$connection->query($selectsql_for_test);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Document</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<caption>List of one file</caption>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">MyFile</th>
						</tr>
					</thead>
					<tbody>
						<?php

						while ($row = $result_contact->fetch_assoc()) {
							$id = $row["id"];
							$name = $row["name"];
							$email = $row["email"];
							$myFile = $row["myFile"];
							echo '<tr style=" width: 100%">';
							echo "<td>" . $id . "</td>";
							echo "<td>" . $name . "</td>";
							echo "<td>" . $email . "</td>";
							echo "<td>" . $myFile . "</td>";
							?>
							<td><a class="btn btn-primary" type="submit" download="<?php echo $row['myFile']; ?>" href="ff/<?php echo $row['myFile']; ?>">Download</a></td>

							<td style=' width: auto'>
								<a onclick="return comfirm('Are you sure?')" class="text-primary" href="delete.php?id=<?php echo $row['id'] ?>& myFile=<?php echo $myFile ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
							</td>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<caption>List of one file</caption>
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">SSCFile</th>
							<th scope="col">HSCFile</th>
						</tr>
					</thead>
					<tbody>
						<?php

						while ($row = $result_contact_for_test->fetch_assoc()) {
							$id = $row["id"];
							$name = $row["name"];
							$email = $row["email"];
							$sscFile = $row["sscFile"];
							$hscFile = $row["hscFile"];
							echo '<tr style=" width: 100%">';
							echo "<td>" . $id . "</td>";
							echo "<td>" . $name . "</td>";
							echo "<td>" . $email . "</td>";
							echo "<td>" . $sscFile . "</td>";
							echo "<td>" . $hscFile . "</td>";
							?>
							<td><a class="btn btn-primary" type="submit" download="<?php echo $row['sscFile']; ?>" href="ff/<?php echo $row['sscFile']; ?>">Download</a></td>

							<td><a class="btn btn-primary" type="submit" download="<?php echo $row['hscFile']; ?>" href="ff/<?php echo $row['hscFile']; ?>">Download</a></td>
							<td style=' width: auto'>
								<a onclick="return comfirm('Are you sure?')" class="text-primary" href="delete.php?id=<?php echo $row['id'] ?>& sscFile=<?php echo $sscFile ?>& hscFile=<?php echo $hscFile ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
							</td>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>