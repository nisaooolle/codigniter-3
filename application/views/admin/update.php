<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="card w-50 m-auto p-3 ">
            <h3 class="text-center">Ubah Siswa</h3>
            <?php foreach($siswa as $data_siswa ): ?>
            <form action="<?php echo base_url('admin/aksi_ubah_siswa')?>" enctype="multipart/form-data" method="post" class="row">
                <input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id_siswa?>">
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama" value="<?php echo $data_siswa->nama_siswa?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nisn</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data_siswa->nisn?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option selected value="<?php echo $data_siswa->gender?>"><?php echo $data_siswa->gender?></option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Tingkat Kelas</label>
                    <select name="kelas" id="kelas" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected value="<?php echo $data_siswa->id_kelas?>"><?php echo tampil_full_kelas_byid($data_siswa->id_kelas)?></option>
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
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>