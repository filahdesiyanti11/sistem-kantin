<html>
<a href="run.php">
    <<br>Kembali</br>
</a>

</html>



<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = "SELECT * FROM penjual ORDER BY id_p ";
$data = mysqli_query($mysqli, $result);

?>

<html>

<head>
    <title>Menu Kantin</title>
</head>

<body>
    <a href="addpenjual.php">Tambah Penjual</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th>nama_penjual</th>
            <th>no_hp</th>
            <th>alamat</th>
            <th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($data)) {
            echo "<tr>";
            echo "<td>" . $user_data['nama_penjual'] . "</td>";
            echo "<td>" . $user_data['no_hp'] . "</td>";
            echo "<td>" . $user_data['alamat'] . "</td>";
            echo "<td><a href='editpenjual.php?id=$user_data[id_p]'>Edit</a> | <a href='deletepenjual.php?id=$user_data[id_p]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>