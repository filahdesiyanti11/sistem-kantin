<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
    $nama=$_POST['nama'];
    $penjual=$_POST['penjual'];
    
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET jenis='$jenis',harga='$harga' WHERE id=$id");
    
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
 
while($user_data = mysqli_fetch_array($result))
{
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
    $nama = $user_data['nama'];
    $penjual = $user_data['penjual'];   
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Jenis</td>
                <td><input type="text" name="jenis" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>penjual</td>
                <td>
                    <select name="id_p" >
                        <?php
                        include_once("config.php");
                        $result = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_p DESC");

                        while ($data = mysqli_fetch_array($result)) {
                            echo "<option value='" . $data['id_p'] . "'>" . $data['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
            
        </table>
    </form>
</body>
</html>