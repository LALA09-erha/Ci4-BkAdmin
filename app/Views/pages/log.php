<?= $this->extend('pages\temp') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
                <?php if (session()->get('role') == 'Admin') { ?>
                <button type="button" class="btn btn-outline-primary m-3" data-toggle="modal"
                    data-target="#inlineForm">
                    Custom Data Log Perilaku
                </button>
                <?php } ?>

                <!-- modal  -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                    Custom Data Log Perilaku</h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p>Harap yang Mengakses Hanya Admin Atau Petugas Yang terkait</p>    
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex justify-content-end">
                                        <a href="https://docs.google.com/spreadsheets/d/1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU/edit#gid=0" target="_blank"  class="btn btn-primary me-1 mb-1">Submit</a>                                        
                                        <button class="btn btn-secondary ml-1 mb-1" data-dismiss="modal"
                                        aria-label="Close"
                                            >Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Log Perilaku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>ID Siswa</th>
                            <th>Jenis</th>
                            <th>Detail</th>
                            <th>ID Admin</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        if (empty($log)) {
                            echo '<div class="alert alert-warning text-center" role="alert">Data not Result</div>';
                        } else {
                            foreach ($log as $lg) {
                                echo "<tr>";
                                echo "<td>" . $lg[0] . "</td>";
                                echo "<td>" . $lg[1] . "</td>";
                                echo "<td>" . $lg[2] . "</td>";
                                echo "<td>" . $lg[3] . "</td>";
                                echo "<td>" . $lg[4] . "</td>";                          
                                echo "<td>" . $lg[5] . "</td>";                          
                                #button edit and delete
                                // echo "<td>";
                                // echo "<a href='edituser.php?iduser=" . $usr['idUser'] . "' class='btn btn-primary m-1'>Edit</a>";
                                // echo "<a href='../proses/delete.php?iduser=" . $usr['idUser'] . "'  class='btn btn-danger' onclick='return confirm(\"Really delete?\")'>Delate</a>";
                                // echo "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>