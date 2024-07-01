<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jadwal</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mahasiswa'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="<?= base_url(); ?>update" id="FrmAddMahasiswa" method="post" autocomplete="off" accept-charset="utf-8">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?=$data_jadwal['id']?>">

                        <div class="form-group row">

                            <label for="Hari" class="col-sm-2 col-form-label">Hari</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= (validation_show_error('hari')) ? 'is-invalid' : ''; ?>" id="hari" name="hari" autofocus value="<?=$data_jadwal['hari']?>">
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('hari') ?>
                                </small>
                            </div>
                        </div> <div class="form-group row">

                            <label for="Kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= (validation_show_error('kegiatan')) ? 'is-invalid' : ''; ?>" id="kegiatan" name="kegiatan" autofocus value="<?=$data_jadwal['kegiatan']?>" >
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('kegiatan') ?>
                                </small>
                            </div>
                        </div>
                        
                        <div class="form-group row">

                            <label for="Tanggal" class="col-sm-2 col-form-label">Tanggal</label>

                            <div class="col-sm-10">
                                <input type="date" class="form-control <?= (validation_show_error('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?=$data_jadwal['tanggal']?>">
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('tanggal') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="Jam" class="col-sm-2 col-form-label">Jam</label>

                            <div class="col-sm-10">
                                <input type="time" class="form-control <?= (validation_show_error('jam')) ? 'is-invalid' : ''; ?>" id="jam" name="jam" value="<?=$data_jadwal['jam']?>">
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('jam') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="Lokasi" class="col-sm-2 col-form-label">Lokasi</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= (validation_show_error('lokasi')) ? 'is-invalid' : ''; ?>" id="lokasi" name="lokasi" value="<?=$data_jadwal['lokasi']?>">
                                <small class="text-danger">
                                    <?= validation_show_error('lokasi') ?>
                                </small>
                            </div>
                        </div>
                       <div class="form-group row">

                            <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>

                            <div class="col-sm-10">
                                <textarea class="form-control <?= (validation_show_error('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="3"><?=$data_jadwal['keterangan']?></textarea>
                                <small class="text-danger">
                                    <?= validation_show_error('keterangan') ?>
                                </small>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>

                                <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>