<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<?php include('navbar.php'); ?>

<body>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="card w-50 m-auto p-3 ">
            <h3 class="text-center">Tambah Siswa</h3>
            <form action="<?php echo base_url('admin/aksi_tambah_siswa')?>" enctype="multipart/form-data" method="post" class="row">
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nisn</label>
                    <input type="text" class="form-control" id="nisn" name="nisn">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option selected>Pilih Gender</option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Tingkat Kelas</label>
                    <select name="kelas" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Pilih Kelas</option>
                        <?php
                        foreach ($kelas as $row) :
                        ?>
                            <option value="<?php echo $row->id?>">
                            <?php echo $row->tingkat_kelas . ' ' . $row->jurusan_kelas?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>