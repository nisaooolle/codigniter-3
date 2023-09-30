<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

        :root {
            --main-color: rgba(9, 81, 121, 1);
            --color-dark: #1D2231;
            --text-grey: #8390A2;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            width: 345px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            z-index: 100;
            background: var(--main-color);
            transition: width 300ms;

        }

        .sidebar-brand {
            height: 90px;
            padding: 1rem 0rem 1rem 2rem;
            color: #fff;
        }

        .sidebar-brand span {
            display: inline-block;
            padding-right: 1rem;
        }

        .sidebar-menu li {
            width: 100%;
            margin-bottom: 1.7rem;
            padding-left: 1rem;

        }

        .sidebar-menu {
            margin-top: 1rem;
        }

        .sidebar-menu a {
            padding-left: 2rem;
            display: block;
            color: #fff;
            font-size: 1.1rem;
        }

        #nav-toggle:checked+.sidebar {
            width: 70px;

        }

        #nav-toggle:checked+.sidebar .sidebar-brand,
        #nav-toggle:checked+.sidebar li {
            padding-left: 1rem;
            text-align: center;
        }

        #nav-toggle:checked+.sidebar li a {
            padding-left: 0rem;
        }

        #nav-toggle:checked+.sidebar .sidebar-brand h1 span:last-child,
        #nav-toggle:checked+.sidebar li a span:last-child {
            display: none;

        }

        .sidebar-menu a span:first-child {
            font-size: 1.5rem;
            padding-right: 1rem;
        }

        .sidebar-menu a.active {
            background: #fff;
            padding-top: 1rem;
            padding-bottom: 1rem;
            color: var(--main-color);
            border-radius: 30px 0px 0px 30px;

        }

        #nav-toggle:checked~.main-content {
            margin-left: 70px;

        }

        #nav-toggle:checked~.main-content header {
            width: calc(100% - 70px);
            left: 70px;

        }

        .main-content {
            transition: margin-left 300ms;
            margin-left: 345px;
        }

        header {
            background: #fff;
            display: flex;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            left: 345px;
            top: 0;
            z-index: 100;
            width: calc(100% - 345px);
            transition: left 300ms;
        }

        #nav-toggle {
            display: none;
        }

        header h2 {
            color: #222;
        }

        header label span {
            font-size: 1.7rem;
            padding-right: 1rem;
        }

        .search-wrapper {
            border: solid 1px #ccc;
            border-radius: 30px;
            height: 50px;
            display: flex;
            align-items: center;
            overflow-x: hidden;
        }

        .search-wrapper span {
            display: inline-block;
            padding: 0rem 1rem;
            font-size: 1.5rem;
        }

        .search-wrapper input {
            height: 100%;
            padding: .5rem;
            border: none;
            outline: none;

        }

        .user-wrapper {
            display: flex;
            align-items: center;
        }

        .user-wrapper img {
            border-radius: 50%;
            margin-right: .5rem;
        }

        .user-wrapper small {
            display: inline-block;
            color: var(--text-grey);
            margin-top: -1px !important;

        }

        main {
            margin-top: 85px;
            padding: 2rem 1.5rem;
            background: #f1f5f9;
            min-height: calc(100vh - 90px);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 1rem;
            margin-top: 1rem;
        }

        .card-single {
            display: flex;
            justify-content: space-between;
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgba(154, 160, 185, .05), 0 15px 40px rgba(166, 173, 201, .2);
        }

        .card-single div:last-child span {
            color: var(--main-color);
            font-size: 3rem;

        }

        .card-single div:first-child span {
            color: var(--text-grey);


        }

        .card-single:last-child {
            background: var(--main-color);
        }

        .card-single:last-child h1,
        .card-single:last-child div:first-child span,
        .card-single:last-child div:last-child span {
            color: #fff;
        }

        .recent-grid {
            margin-top: 3.5rem;
            display: grid;
            grid-gap: 2rem;
            grid-template-columns: 65% auto;

        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgba(154, 160, 185, .05), 0 15px 40px rgba(166, 173, 201, .2);
            padding: 1rem;
        }

        .card-header {
            padding: 1rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-header button {
            background: var(--main-color);
            border-radius: 10px;
            color: #fff;
            font-size: .8rem;
            padding: .5rem 1rem;
            border: 1px solid var(--main-color);
        }

        table {
            border-collapse: collapse;
        }

        thead tr {
            border-top: 1px solid #f0f0f0;
            border-bottom: 2px solid #f0f0f0;

        }

        thead td {
            font-weight: 700;
        }

        td {
            padding: .5rem 1rem;
            font-size: .9rem;
            color: #222;

        }

        tr td:last-child {
            display: flex;
            align-items: center;


        }

        td .status {
            display: inline-block;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .status.purple {
            background: rebeccapurple;
        }

        .status.pink {
            background: deeppink;
        }

        .status.orange {
            background: orangered;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .customer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: .5rem .7rem;
        }

        .info {
            display: flex;
            align-items: center;
        }

        .info img {
            border-radius: 50%;
            margin-right: 1rem;
        }

        .info h4 {
            font-size: .8rem;
            font-weight: 700;
            color: #222;
        }

        .info small {
            font-weight: 600;
            color: var(--text-grey);
        }

        .contact span {
            font-size: 1.2rem;
            display: inline-block;
            margin-left: .5rem;
            color: var(--main-color);

        }

        @media only screen and (max-width: 1200px) {

            .sidebar {
                width: 70px;
            }

            .sidebar .sidebar-brand,
            .sidebar li {
                padding-left: 1rem;
                text-align: center;
            }

            #nav-toggle:checked+.sidebar li a {
                padding-left: 0rem;
            }

            .sidebar .sidebar-brand h1 span:last-child,
            .sidebar li a span:last-child {
                display: none;

            }

            .main-content {
                margin-left: 70px;

            }

            .main-content header {
                width: calc(100% - 70px);
                left: 70px;

            }
        }

        @media only screen and (max-width: 960px) {
            .cards {
                grid-template-columns: repeat(3, 1fr);
            }

            .recent-grid {
                grid-template-columns: 60% 40%;
            }
        }

        @media only screen and (max-width: 768px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .recent-grid {
                grid-template-columns: 100%;
            }

            .search-wrapper {
                display: none;
            }

            .sidebar {

                left: -100% !important;
            }

            header h2 {
                display: flex;
                align-items: center;
            }

            header h2 label {
                display: inline-block;
                text-align: center;
                background: var(--main-color);
                padding-right: 0rem;
                margin-right: 1rem;
                height: 40px;
                width: 40px;
                border-radius: 50%;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center !important;
            }

            header h2 span {
                text-align: center;
                padding-right: 0rem;
            }

            header h2 {
                font-size: 1.1rem;
            }

            .main-content {
                width: 100%;
                margin-left: 0rem;
            }

            header {
                width: 100% !important;
                left: 0 !important;
            }

            #nav-toggle:checked+.sidebar {
                left: 0 !important;
                z-index: 100;
                width: 345px;
            }

            #nav-toggle:checked .sidebar .sidebar-brand,
            #nav-toggle:checked+.sidebar li {
                padding-left: 2rem;
                text-align: left;
            }

            #nav-toggle:checked+.sidebar li a {
                padding-left: 1rem;
            }

            #nav-toggle:checked+.sidebar .sidebar-brand h1 span:last-child,
            #nav-toggle:checked+.sidebar li a span:last-child {
                display: inline;

            }

            #nav-toggle:checked~.main-content {
                margin-left: 0rem !important;
            }
        }

        @media only screen and (max-width: 560px) {
            .cards {
                grid-template-columns: 100%;
            }
        }

        .tasis {
            margin-left: 40%;
            font-family: 'Times New Roman', Times, serif;
            color: white;
            font-weight: bold;
        }


        .app-main__outer {
            margin: 3rem 2rem 6rem;
            width: 65%;
            margin-left: 30%;
            margin-top: 10%;
            background-color: rgba(9, 81, 121, 1);
            padding: 20px;
            border-radius: 20px;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
            /* Ganti warna latar belakang sesuai keinginan Anda */
        }

        tbody tr:nth-child(odd) {
            /* Ganti warna latar belakang sesuai keinginan Anda */
            color: white;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1> <span class="fab fa-asymmetrik"> </span> <span style="font-family: 'Times New Roman', Times, serif;">School</span>
            </h1>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/codeigniter-3/keuangan">
                        <span class="fas fa-tachometer-alt"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="keuangan/pembayaran" class="active">
                        <span class="fas fa-users"></span>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="admin/akun">
                        <span class="fa-solid fa-chalkboard-user"></span>
                        <span>akun</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('auth/logout'); ?>">
                        <span class="fa-solid fa-right-from-bracket"></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <header>
            <h2 style="color: rgba(9, 81, 121, 1); font-family: 'Times New Roman', Times, serif;">
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
                Dashboard Keuangan
            </h2>
        </header>
    <div class="app-main">
        <div class="app-main__outer">
            <h2 class="tasis">Tabel Pembayaran</h2>
            <table class="table table-striped">
                <thead>
                    <tr style="color:black; background: white">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama Siswa</th>
                        <th scope="col" class="text-center">Jenis Pembayaran</th>
                        <th scope="col" class="text-center">Total Pembayaran</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($pembayaran as $row) : $no++ ?>
                        <tr>
                            <th data-cell="No" class="text-center" scope="row">
                                <?php echo $no ?>
                            </th>
                            <th data-cell="nama" class="text-center">
                                <?php echo $row->nama_siswa; ?>
                            </th>
                            <th data-cell="jenis_pembayaran" class="text-center">
                                <?php echo $row->jenis_pembayaran; ?>
                            </th>
                            <th data-cell="total_pembayaran" class="text-center">
                                <?php echo convRupiah($row->total_pembayaran) ?>
                            </th>
                            <th data-cell="Aksi" class="text-center aksi">
                                <a href="<?php echo base_url('keuangan/update_pembayaran/') . $row->id ?>" type="button" id="PopoverCustomT-1" class="btn btn-success btn-sm edit">Edit</a>
                                <button onclick="hapus(<?php echo $row->id ?>)" type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm hapus">Hapus</button>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?php echo base_url('keuangan/tambah_pembayaran/') ?>" type="button" id="PopoverCustomT-1" class="btn btn-info btn-sm create">create</a>
        </div>
    </div>
    <script>
        function hapus(id) {
            var yes = confirm('Yakin di hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('keuangan/hapus_pembayaran/') ?>" + id
            }
        }
    </script>
</body>

</html>