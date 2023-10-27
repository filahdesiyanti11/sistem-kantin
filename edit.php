<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id_p = $_POST['id_p'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$nama', jenis='$jenis', harga='$harga', id_penjual='$id_p' WHERE id=$id");


    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
    $id_p = $user_data['id_penjual'];
}
?>
<html>

<head>
    <title>Edit Menu Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><select name="jenis">
                        <option value="makanan" <?php if ($jenis == 'makanan')
                                                    echo 'selected'; ?>>Makanan</option>
                        <option value="minuman" <?php if ($jenis == 'minuman')
                                                    echo 'selected'; ?>>Minuman</option>
                    </select></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td>Penjual</td>
                <td>
                    <select name="id_p">
                        <?php
                        include_once("config.php");

                        $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_p DESC");

                        while ($penjual_data = mysqli_fetch_array($penjual)) {
                            $selected = ($penjual_data['id_p'] == $id_p) ? 'selected' : '';
                            echo '<option value="' . $penjual_data['id_p'] . '" ' . $selected . '>' . $penjual_data['nama_penjual'] . '</option>';
                        }
                        ?>
                    </select>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>