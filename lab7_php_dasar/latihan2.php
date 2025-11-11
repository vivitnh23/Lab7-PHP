<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>PHP Dasar</title> 
</head> 
<body> 
     <h2>Predefine Variable</h2>
     <?php 
        $nama_user = $_GET['nama'] ?? ''; 
         echo 'Selamat Datang' . ($nama_user ? ', ' . $nama_user : '');
    ?>
</body>
</html>