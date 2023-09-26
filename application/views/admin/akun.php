<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <?php include('sidebar.php')?>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="card w-50 m-auto p-3 ">
            <?php foreach($user as $data_akun ): ?>
            <h3 class="text-center">Akun</h3>
            <form action="<?php echo base_url('admin/aksi_akun')?>" enctype="multipart/form-data" method="post" class="row">
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $data_akun->email?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"value="<?php echo $data_akun->username?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Password Baru</label>
                    <input type="text" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru">
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Konfirmasi Password</label>
                    <input type="text" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>