<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Jenis</td>
                <td>
                    <select name="jenis">
                        <option value="makanan">makanan</option>
                        <option value="minuman">minuman</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>penjual</td>
                <td>
                    <select name="id_p" >
                        <?php
                        include_once("config.php");
                        $result = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_p DESC");

                        while ($data = mysqli_fetch_array($result)) {
                            echo "<option value='" . $data['id_p'] . "'>" . $data['nama_penjual'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $nama = $_POST['nama'];
        $penjual = $_POST['id_p'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu (jenis, harga, nama, id_penjual) VALUES('$jenis', '$harga', '$nama', '$penjual')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>