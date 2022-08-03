<?php

require 'functions.php';
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if(upload($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>
<html>
<script src="https://cdn.tailwindcss.com"></script>
<div class="grid grid-cols-3 gap-4 mx-10 my-10">
    <div >
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="my-5 ">
            <label for="ids">Pilih Data Smester :</label>
            <select name="semester" id="ids" class="border-2 w-32 rounded-md">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
</div>
    <div class="my-5 bg-neutral-600 rounded-md">
        <input  class="w-42 h-9  divide-gray-500 text-white" type="file" name="fiel">
    </div>
    <div class="my-5">
        <button class="bg-cyan-300 rounded-md w-48 h-9 font-bold" type="submit" name="submit">Tambah Data!</button>
    </div>
    </form>
</div>
</html>