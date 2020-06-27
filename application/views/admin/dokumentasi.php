<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Main content -->
    <section class="content p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahDokumentasi">Tambah Data</span>
                                <span class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahVideo">Tambah video</span>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="tbl_campaign" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo Dokumentasi</th>
                                        <th>Detail Dokumentasi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($dokumentasi as $dt) { ?>
                                        <tr>
                                            <td width="20px"><?= $no++ ?></td>
                                            <td class="text-center" style="width: 20%;"><img class="img-fluid img-thumbnail" style="cursor: pointer;" src="<?= base_url('assets/mockup/core/img/dokumentasi/') . $dt['file_dok'] ?>" alt="<?= $dt['pr_title'] ?>" width="100px" height="50px">
                                            </td>
                                            <td>
                                                <?= $dt['pr_title'] ?>
                                                <div class="dropdown-divider"></div>
                                                <?= $dt['pr_desc'] ?>
                                            </td>
                                            <td width="100px" class="text-center">

                                                <p class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDokumentasi<?= $dt['id_dokumentasi'] ?>">Hapus</p>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="hapusDokumentasi<?= $dt['id_dokumentasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Dokumentasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= site_url('admin/dokumentasi/hapus') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <input type="hidden" name="id" value="<?= $dt['id_dokumentasi'] ?>">
                                                                <input type="hidden" name="filephoto" value="<?= $dt['photo_dok'] ?>">
                                                                <div class="col-sm">
                                                                    <img style="width: 100%;" src="<?= base_url('assets/mockup/core/img/dokumentasi/') . $dt['photo_dok'] ?>">
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm text-center">
                                                                    Anda Yakin Ingin Menghapus Dokumentasi ini??
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade in" id="photoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahDokumentasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/dokumentasi/add') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Gambar</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" name="xfile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Masukan Title" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="deskripsi"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Video-->
<div class="modal fade" id="tambahVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/dokumentasi/addVideo') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Thumbnail Video</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" name="xfile">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Video</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" name="xvideo">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Masukan Title" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="deskripsi"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin/layout/footer'); ?>

<script>
    $('#tbl_campaign').DataTable({
        'responsive': true,
        'autoWidth': false,
        'searching': true,
        'ordering': false
    });

    $('img').on('click', function() {
        $('#photoModal').modal('show');
        $('.modal-title').text($(this).attr('alt'));
        $('.modal-body').html('<img src="' + $(this).attr('src') + '" style="width: 100%">');
    });
</script>