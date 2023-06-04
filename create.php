<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
    $program_studi = isset($_POST['program_studi']) ? $_POST['program_studi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO tb_mahasiswa VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $nim, $program_studi]);
    // Output message
    $msg = 'Created Successfully!';

    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nidn = isset($_POST['nidn']) ? $_POST['nidn'] : '';
    $program_studi = isset($_POST['jenjang_pendidikan']) ? $_POST['jenjang_pendidikan'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO tb_dosen VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $nidn, $jenjang_pendidikan]);
    // Output message
    $msg = 'Created Successfully!';

    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nim = isset($_POST['kode_matakuliah']) ? $_POST['kode_matakuliah'] : '';
    $program_studi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO tb_matakuliah VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $kode_matakuliah, $deskripsi]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create tb_mahasiswa</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="nim">NIM</label>
        <label for="program_Studi">Program Studi</label>  
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<div class="content update">
	<h2>Create tb_dosen</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="nidn">NIDN</label>
        <label for="jenjang_pendidikan">Jenjang Pendidikan</label>  
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<div class="content update">
	<h2>Create tb_matakuliah</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="kode_matakuliah">Kode Matakuliah</label>
        <label for="deksripsi">Deskripsi</label>  
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

