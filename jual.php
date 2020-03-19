<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:lightgrey">
	<div class="container" style="background-color:yellow">
	<font face="franklin gothic medium" size="6" color="black">
    <?php 
        session_start();
        include 'connect.php';
        $username = $_GET['user'];
        $data = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
    
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
    
        if($cek > 0){
            echo "<h3><p class=\"text-right\" style=\"margin-right:5px;\">Welcome, $username</p></h3>";
        }
        else{
            header("location:index.php?pesan=belum_login");
        }
    ?>
	</font>
	</div>
	<div class="container" style="background-color:black">
		<a href=index.php><p class=text-right><font size="1" color="gray">Not you?</font></p></a>
	</div>
    <div class="container">
        
        <div class="col-md-12">
			<center>
			<font face="tahoma" size="10" color="yellow">Yellow</font><font face="franklin" size="10" color="black">Page</font>
			</center>
        </div>
        <div class="col-md-2"></div>
        <form method="POST">
        <div class="input-group input-group-lg col-md-8">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" name="submit" type="submit" value="Search"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
        
        <?php 
            if (ISSET($_POST['submit'])){?>
				<table>
				<tr> <td>Nama</td>
				<td>No Telepon</td> </tr>
				<?php
                $cari = $_POST['search'];
                $query2 = "SELECT * FROM telepon WHERE nama LIKE '$cari%'";
                
                $sql = mysqli_query($connect, $query2);
                $n = mysqli_num_rows($sql);
                $i=0;
                
                $hasils = $sql->fetch_all();
                foreach($hasils as $hasil){
                    echo "<tr>";
                    echo "<td>$hasil[1]</td><td>$hasil[2]</td>";
                }
            }
			else echo "";
        ?>
            
        </div>
        </table>
        <div class="col-md-2"></div>
    </div>
</body>
</html>
