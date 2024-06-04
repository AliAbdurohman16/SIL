<?=$this->session->flashdata('msg')?>
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sistem Informasi Laboratorium</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                    Data Hasil Laboratorium
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row my-4">
        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Parameter</th>
                                <th>Hasil</th>
                                <th>Tgl Pengujian</th>
                                <th>Tgl Selesai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key) { ?>
                                <tr>
                                    <td><?= $key->kode_registrasi ?></td>
                                    <td><?= $key->nama ?></td>
                                    <td><?= $key->parameter ?></td>
                                    <td><?= $key->hasil ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($key->tgl_pengujian) ) ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($key->tgl_selesai) ) ?></td>
                                    <td>
                                        <a href="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/delete/<?= $key->hasil_id ?>">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i> delete
                                            </button>
                                        </a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "ordering": false,
        });
    });
</script>