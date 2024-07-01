<div class="container pt-5">

    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jadwal</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('/add'); ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php

                if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;
                            </span>
                        </button>
                    </div>;
                <?php endif;
                ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tableMahasiswa">
                            <thead>
                                <tr class="table-primary">
                                    <th></th>
                                    <th>Hari</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_jadwal as $row) :
                                ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('edit/' . $row['id']); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="javascript:void(0);" data="<?= $row['id'] ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td><?= $row['hari'] ?></td>
                                        <td><?= $row['kegiatan'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['jam'] ?></td>
                                        <td><?= $row['lokasi'] ?></td>
                                        <td><?= $row['keterangan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal dialog hapus data-->

<div class="modal fade" id="myModalDelete" tabindex="-1" aria- labelledby="myModalDeleteLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data- dismiss="modal">Tutup</button>

                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableMahasiswa').DataTable();
    //menampilkan modal dialog saat tombol hapus ditekan
    $('#tableMahasiswa').on('click', '.item-delete', function() {
        //ambil data dari atribute data
        var id = $(this).attr('data');
        $('#myModalDelete').modal('show');
        //ketika tombol lanjutkan ditekan, data id akan dikirim ke method
        delete
        //pada controller mahasiswa
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'delete',
                async: false,
                url: '<?php echo base_url() ?>delete/' + id,
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>