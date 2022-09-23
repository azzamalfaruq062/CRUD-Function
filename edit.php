<?php
include 'cor/config.php';

$id=$_GET["id"];
$all = read('mahasiswa','jurusan','WHERE id_jurusan='.$id); //Tampil Tabel
$tampil = read('mahasiswa', 'jurusan','WHERE id_jurusan='.$id); //Tampil Form

if(isset($_POST['update'])){
    $njurusan = $_POST['jurusan']; 
    $update = update('mahasiswa', 'jurusan',"nama_jurusan='$njurusan' WHERE id_jurusan='$id'");
    if($update){
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'navebar.php'?>
    <div class="container-fluid">
    <div class="container-fluid">
        <div class="input-group mt-2 mb-2">
            <a class="btn btn-sm btn-success" href="index.php" style="border-radius: 3px 0 0 3px;">Tambah +</a>
            <a class="btn btn-sm btn-warning text-light" href="index.php"><i class="fas fa-home"></i></a>
        </div>
        <div class="row">            
                <div class="col-md-8">
                    <table class="table table-hover table-bordered border-dark table-sm">
                        <thead class="table table-dark text-center" >
                            <tr>
                                <th>No</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            while($data = mysqli_fetch_assoc($all)){
                                $no++;
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data['nama_jurusan']?></td>
                                <td class="text-center">
                                        <a class="btn btn-sm btn-danger" href="hapus.php?id=<?=$data['id_jurusan']?>">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <!-- Update -->
                    <div class="container-fluid" style="border: 1px solid black; border-radius:4px;">
                        <?php
                        while($data=mysqli_fetch_assoc($tampil)){
                        ?>
                        <form method="POST">
                            <h6 class="text-center mt-2">UPDATE DATA JURUSAN</h6>
                            <div class="form-floating">
                                <input class="form-control" type="text" id="jurusan" name="jurusan" oninput="tamp()" value="<?=$data['nama_jurusan']?>" placeholder="jurusan">
                                <label>Jurusan</label>
                            </div>
                            <div class="d-md-flex justify-content-md-end">
                                <input class="btn btn-sm btn-success mt-2" type="submit" name="update" value="Update">
                            </div>
                            <h6 class="text-center">PREVIEW</h6>
                            <div class="form-floating mt-3 mb-3">
                                <input class="form-control" type="text" id="t_jurusan" placeholder="jurusan" disabled>
                                <label>Jurusan</label>
                            </div>
                            <script>
                                function tamp(){
                                    let tamp = document.getElementById("jurusan").value
                                    document.getElementById("t_jurusan").value = tamp
                                }
                            </script>
                            <input type="hidden" name="id">
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>