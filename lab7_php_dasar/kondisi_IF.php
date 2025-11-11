<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Dasar</title> 
<head> 
<body>
    <h1>Kondisi IF</h1> 
    <?php
        $nama_hari = date("l");
        if ($nama_hari == "Sunday") {
        echo "Minggu";
        } elseif ($nama_hari == "Monday") {
        echo "Senin";
        } else {
        echo "Selasa";
        }
?>
</head>
</body>