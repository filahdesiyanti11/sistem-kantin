<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM menu ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Menu Kantin</title>
</head>
 
<body>
<a href="add.php">Tambah Pesanan</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
     <th>Jenis</th> <th>Harga</th> <th>Nama</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['jenis']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['nama']."</td>";   
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>