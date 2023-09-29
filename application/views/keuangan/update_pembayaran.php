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
            <h3 class="text-center">Ubah Pembayaran</h3>
            <?php foreach ($pembayaran as $data) : ?>
                <form action="<?php echo base_url('keuangan/aksi_update_pembayaran') ?>" enctype="multipart/form-data" method="post" class="row">
                    <input type="hidden" name="id" value="<?php echo $data->id ?>">
                    <div class="mb-3 col-6">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <select name="nama_siswa" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected value="<?php echo $data->id_siswa?>"><?php echo tampil_full_pembayaran_byid($data->id_siswa)?></option>
                            <?php
                            foreach ($siswa as $row) :
                            ?>
                                <option value="<?php echo $row->id_siswa ?>">
                                    <?php echo $row->nama_siswa ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="nama" class="form-label">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" class="form-select">
                            <option selected value="<?php echo $data->jenis_pembayaran?>"><?php echo $data->jenis_pembayaran?></option>
                            <option value="pembayaran spp">pembayaran spp</option>
                            <option value="pembayaran uang gedung"> pembayaran uang gedung</option>
                            <option value="pembayaran uang seragam"> pembayaran uang seragam</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Total Pembayaran</label>
                    <input type="nomor" class="form-control" id="total_pembayaran" name="total_pembayaran" value="<?php echo $data->total_pembayaran?>">
                </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
    <?php endforeach; ?>
    </div>
    </div>
</body>

</html>