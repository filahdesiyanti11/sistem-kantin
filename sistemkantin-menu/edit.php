<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $jenis=$_POST['Jenis'];
    $harga=$_POST['Harga'];
    $nama=$_POST['Nama'];
    
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET Jenis='$jenis',Harga='$harga' WHERE id=$id");
    
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
    $jenis = $user_data['Jenis'];
    $harga = $user_data['Harga'];
    $nama = $user_data['Nama'];
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
                <td><input type="text" name="Jenis" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="Nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>