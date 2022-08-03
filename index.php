<?php
require 'functions.php';
$datas = query("SELECT * FROM main");


?>

<html>

	
	<script src="https://cdn.tailwindcss.com"></script>
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<div class="mx-20 my-10">
		<form action="upload.php">

			<button type="submit" class="mb-5 bg-slate-600 rounded-md w-20 h-10"><a class="text-white " href="uploads.php">Upload</a></button>
		</form>
	
<table id="example" class="display" style="width:100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Npm</th>
                <th>Name</th>
                <th>Kelulusan</th>
                <th>Aksi</th>
             
            </tr>
        </thead>
        <tbody>
			<?php $no = 1; ?>
			<?php foreach($datas as $dat) : ?>
            <tr>
				<td><?= $no ?></td>
				<td><?= $dat['npm'] ?></td>
				<td><?= $dat['nama'] ?></td>
				<td><?php 
				if($dat['smt1'] == 1 && $dat['smt2'] == 1 &&$dat['smt3'] == 1 && $dat['smt4'] == 1 && $dat['smt5'] == 1 && $dat['smt6'] == 1 && $dat['smt7'] == 1 && $dat['smt8'] == 1 ){
					echo "Lulus";
				}else{
					echo "Tidak Lulus";
				}
			?></td>
			<td>Aksi</td>
				<?php $no = $no+1?>
			</tr>
			<?php endforeach ?>
		</tbody>
    </table>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
    $('#example').DataTable();
});
	</script>
</html>