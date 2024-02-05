<?= $this->extend('pages\temp') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- <p class="mb-4">The data here is data about student absentee.</p> -->

   
    <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <!-- <a href="/absent"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">

                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Siswa</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalsiswa?> Siswa</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <!-- <a href="/user"> -->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Aktivitas Siswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totallog?> Aktivitas</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            <!-- </a> -->
                        </div>
                    </div>

                <!-- Buatkan kotak satunya Berisikan List penjelasan dan Satunya Gambar Sekolah SMKN 3 Bangkalan -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                       <!-- List Kalimat -->
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">

                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Penjelasan Terkait Website Ini</div>
                                    <p >Guru Hanya Dapat Menambah Log Siswa, Melihat Data Siswa</p>
                                    <p >Jika Berkaitan Dengan Data Baik Data Siswa, Guru, Dan Lainnya . Harap Menggubungi Admin Terkait 😁</p>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Anda Masuk Sebagai <?= session('role')?></div>
                                    <img src="https://www.smkn3-bangkalan.sch.id/media_library/image_sliders/b67c7258f03411a50f88eaa4e3fc7067.jpeg" class="card-img-top" alt="...">
                                </div>                                                            
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Gambar Sekolah SMKN 3 Bangkalan -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="col mr-2">

                        <img src="https://www.smkn3-bangkalan.sch.id/media_library/images/69a1cf0bcacd80c16157b53065528f1f.png" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title
                            ">SMKN 3 Bangkalan</h5>
                            <p class="card-text">Jl. Mertajasah No.70, Blandungan, Mertajasah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur
Fax : (031) 3062126</p>
                            <a href="https://www.smkn3-bangkalan.sch.id/" target="_blank" class="btn btn-primary">Go to Website</a>
                            
                        </div>
                    </div>
                    </div>
                
                
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>