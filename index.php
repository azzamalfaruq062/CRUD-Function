<?php
include 'cor/config.php';
// include 'asc.php';
// Tampil
$tampil_asc = read('mahasiswa', '', 'jurusan', ' ORDER by nama_jurusan ASC');
// $tampil_dsc = read('mahasiswa', 'jurusan', ' ORDER by nama_jurusan DSC');
// Tambah
if(isset($_POST['tambah'])){
    $jurusan = $_POST['jurusan'];
    $tambah = cread('mahasiswa', 'jurusan' ,"('', '$jurusan')");
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
        <div class="input-group mt-2 mb-2">
            <button type="button" class="btn btn-sm btn-success" onclick="tampil()">Tambah +</button>
            <a class="btn btn-sm btn-warning text-light" href="index.php"><i class="fas fa-home"></i></a>
        </div>
            <script>
                function tampil(){
                    document.getElementById("tambah").style.display="block";
                }
            </script>
        <div class="row">            
            <div class="col-md-8">
                <table class="table table-hover table-bordered border-dark table-sm">
                    <thead class="table table-dark text-center" >
                        <tr>
                            <th>No</th>
                            <th>Jurusan
                                <button class="dropdown text-light" style="border: none;" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-sort"></i>
                                    <ul class="dropdown-menu">
                                        <!-- <li><a class="dropdown-item" href="#">A - Z</a></li> -->
                                        <li><a class="dropdown-item" href="#">A - Z</a></li>
                                        <li><a class="dropdown-item" href="#">z - a</a></li>
                                    </ul>
                                </button>
                            </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while($data = mysqli_fetch_assoc($tampil_asc)){
                            $no++;
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data['nama_jurusan']?></td>
                            <td class="text-center">
                                    <a class="btn btn-sm btn-primary" name="edit" href="edit.php?id=<?=$data['id_jurusan']?>">
                                    <i class="fas fa-pen"></i>
                                    </a> |
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
                <!-- Tambah -->
                <div class="container-fluid" id="tambah" style="display:none; border: 1px solid black; border-radius:4px;">
                    <form class="mt-3" method="POST" action="index.php">
                        <h6 class="text-center">TAMBAH DATA JURUSAN</h6>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="jurusan" id="jurusan" oninput="tjurusan()" placeholder="jurusan">
                            <label>Masukkan Jurusan</label>
                        </div>
                        <div class="d-md-flex justify-content-md-end">
                            <input class="btn btn-sm btn-success mt-2" type="submit" name="tambah" value="Tambah">
                        </div>
                        <h6 class="text-center">PREVIEW</h6>
                        <div class="form-floating mt-3  mb-3">
                            <input class="form-control" type="text" id="tam_jurusan" disabled>
                        </div>
                        <script>
                            function tjurusan(){
                                let val = document.getElementById('jurusan').value;
                                document.getElementById('tam_jurusan').value = val;
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>