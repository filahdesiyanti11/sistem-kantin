<html>

<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br /><br />

    <form action="addpenjual.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>nama_penjual</td>
                <td><input type="text" name="nama_penjual"></td>
            </tr>
            <tr>
                <td>no_hp</td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $nama_penjual = $_POST['nama_penjual'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual (nama_penjual, no_hp, alamat) VALUES('$nama_penjual', '$no_hp', '$alamat')");

        // Show message when user added
        echo "User added successfully. <a href='penjual.php'>View Users</a>";
    }
    ?>
</body>

</html>