<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
        $program_studi = isset($_POST['program_studi']) ? $_POST['program_studi'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE tb_mahasiswa SET id = ?, nama = ?, nim = ?, program_studi = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $nim, $program_studi, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM tb_mahasiswa WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $tb_mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$tb_mahasiswa) {
        exit('data doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Tabel Mahasiswa #<?=$tb_mahasiswa['id']?></h2>
    <form action="update.php?id=<?=$tb_mahasiswa['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="nim">NIM</label>
        <label for="program_studi">Program Studi</label>
        <input type="text" name="nim" value="<?=$contact['nim']?>" id="nim">
        <input type="text" name="program_studi" value="<?=$contact['program_studi']?>" id="program_studi">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>