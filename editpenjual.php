<?php
// include database connection file
include_once("config.php");

// Check if the form is submitted for user update, then redirect to the homepage after update
if (isset($_POST['updates'])) {
    $idp = $_POST['id_p'];
    $namap = $_POST['nama_penjual'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // Update user data
    $sql = "UPDATE penjual SET nama_penjual=?, no_hp=?, alamat=? WHERE id_p=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssi", $namap, $no_hp, $alamat, $idp);

    if ($stmt->execute()) {
        // Redirect to the homepage to display the updated user in the list
        header("Location: penjual.php");
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    $stmt->close();
}

// Display selected user data based on id
// Getting id from the URL
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id_p=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $namap = $user_data['nama_penjual'];
    $no_hp = $user_data['no_hp'];
    $alamat = $user_data['alamat'];
}
?>

<html>

<head>
    <title>Edit Penjual Data</title>
</head>

<body>
    <a href="penjual.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="editpenjual.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_penjual" value="<?php echo $namap; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" value="<?php echo $no_hp; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_p" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="updates" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>