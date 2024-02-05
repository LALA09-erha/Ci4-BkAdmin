<?= $this->extend('pages\temp') ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="page-heading">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="justify-content-center text-center">
                            <h4 class="card-title">Date & Time</h4>
                            <span class="m-0 font-weight-bold text-primary" id="time"></span> 
                            <span class="m-0 font-weight-bold text-primary" id="day"></span>    
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <form action="/tambahlogsiswa" method="post">
                                    <?= csrf_field() ?>
                                    <button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal"
                                        data-target="#inlineForm">
                                        Tambah Log Siswa
                                    </button>
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                                        Tambah Log Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                        <div class="form-group has-icon-left" style="width: 100%">
                                            <label for="password-id-icon">ID Siswa</label>
                                            <div class="position-relative">
                                                <input type="number" class="form-control" name="idsiswa"
                                                    placeholder="Silahkan Check Di Data Siswa" id="password-id-icon" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-book"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- {{-- make selection input , value pelanggaran atau kebaikan --}} -->

                                        <div class="form-group has-icon-left" style="width: 100%">
                                            <label for="password-id-icon">Jenis</label>
                                            <div class="position-relative">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                                <select name="jenis" id="jenis" class="form-control" required onchange="valjenis()">
                                                    <option value="">Pilih Jenis:</option>
                                                    <option value="1">Pelanggaran</option>
                                                    <option value="2">Kebaikan</option>
                                                </select>
                                            </div>
                                        </div>
                                        


                                        <div class="form-group has-icon-left" style="width: 100% ; display:none"  id='pelanggaran'>
                                            <label for="mobile-id-icon">Detail Pelanggaran</label>
                                            <div class="position-relative">
                                                <select name="pelanggaran" id="pelanggaran" class="form-control" required>
                                                <?php foreach ($pelanggaran as $data): ?>
                                                        <option value="<?=$data[1] ?> - <?=$data[2] ?>"><?=$data[1] ?> - <?=$data[2] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-check"></i>
                                                </div>
                                            </div>
                                        </div>        

                                        <div class="form-group has-icon-left" style="width: 100% ; display:none"  id='kebaikan'>
                                            <label for="mobile-id-icon">Detail Kebaikan</label>
                                            <div class="position-relative">
                                                <select name="kebaikan" id="kebaikan" class="form-control" required>
                                                    <?php foreach ($kebaikan as $data): ?>
                                                        <option value="<?=$data[1] ?> + <?=$data[2] ?>"><?=$data[1] ?> + <?=$data[2] ?></option>
                                                    <?php endforeach; ?>
                                                                                                                                                
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-check"></i>
                                                </div>
                                            </div>
                                        </div>              
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary ml-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-secondary ml-1 mb-1">Reset</button>
                                            <button type="close" data-dismiss="modal"
                                            aria-label="Close"
                                                class="btn btn-danger ml-1 mb-1">Kembali</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                </form>
                            </div>
                            
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>