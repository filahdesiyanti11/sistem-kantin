<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result ="SELECT menu. *, penjual.nama_penjual FROM menu join penjual on menu.id_penjual = penjual.id_p ";
$data = mysqli_query($mysqli, $result);

?>
 
<html>
<head>    
    <title>Menu Kantin</title>
</head>
 
<body>
<a href="add.php">Tambah Pesanan</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
     <th>Jenis</th> <th>Harga</th> <th>Nama</th> <th>Penjual</th><th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($data)) {         
        echo "<tr>";
        echo "<td>".$user_data['jenis']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['nama']."</td>";   
        echo "<td>".$user_data['nama_penjual']."</td>";   
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>