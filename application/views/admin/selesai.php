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
                                    Data <?=@$title?> Pemeriksaan Klinik
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
                                <!-- <th>Pemeriksaan</th> -->
                                <!-- <th>Jenis Sample</th> -->
                                <th>Jenis Pemeriksaan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key) { ?>
                                <tr class="<?=($key->isCito)?"bg bg-danger text-white":""?>">
                                    <td><?= $key->kode_registrasi ?></td>
                                    <td><?= $key->nama ?></td>
                                    <td><?= $key->jenis_pemeriksaan ?></td>
                                    <td><?= $key->status_nama ?></td>
                                    <td><?= $key->tanggal ?></td>
                                    <td>

                                        <button class="btn <?=($key->isCito)?"btn-success":"btn-success"?>" data-bs-toggle="modal" data-bs-target="#hasilModal<?=$key->id?>">
                                            <i class="fa fa-edit"></i> HASIL
                                        </button>
                                        <?php if ($key->status == "AKTIF") { ?>
                                        <button class="btn <?=($key->isCito)?"btn-info":"btn-info"?>" data-bs-toggle="modal" data-bs-target="#verifModal<?=$key->id?>">
                                            <i class="fa fa-check"></i> VERIFIKASI
                                        </button>
                                        <?php } ?>
                                        <div class="modal fade " id="verifModal<?=$key->id?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="largeModalLabel">Verifikasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulir -->
                                                        <form action="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/verifnow/<?= $key->id ?>" method="post">
                                                            Apakah Anda Yakin ingin memverifikasi Data?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-info">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade bd-example-modal-lg" id="hasilModal<?=$key->id?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="largeModalLabel">Hasil Pemeriksaan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulir -->
                                                        <form action="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/editProccess/<?=$key->id?>" method="post">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label for="noRM" class="form-label">Nama</label>
                                                                        <input type="text" class="form-control" id="noRM" placeholder="Nama" name="nama" value="<?=$key->nama?>" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="jenis_pemeriksaan" class="form-label">Jenis Pemeriksaan</label>
                                                                        <input type="text" class="form-control" id="jenis_pemeriksaan" placeholder="jenis_pemeriksaan" required name="jenis_pemeriksaan" value="<?=$key->jenis_pemeriksaan?>" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <table class="display" width="100%">
                                                                            <thead>
                                                                                <tr class="text-dark">
                                                                                    <th>Parameter</th>
                                                                                    <th>Hasil</th>
                                                                                    <th>Tgl Pengujian</th>
                                                                                    <th>Tgl Selesai</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($this->M_hasil_pemeriksaan->select('', ['kode_registrasi' => $key->kode_registrasi])->result() as $value) { ?>
                                                                                    <tr>
                                                                                        <td><input type="text" class="form-control" name="parameter[]" value="<?=$value->parameter ?? null?>" readonly></td>
                                                                                        <td><input type="text" class="form-control" name="hasil[]" value="<?=$value->hasil ?? 0?>" <?=($key->status == "VALID")?' readonly':''?>></td>
                                                                                        <td><input type="date" class="form-control" name="tgl_pengujian[]" value="<?=($value->tgl_pengujian != "") ? date_format(date_create($value->tgl_pengujian), "Y-m-d") : null?>" <?=($key->status == "VALID")?' readonly':''?>></td>
                                                                                        <td><input type="date" class="form-control" name="tgl_selesai[]" value="<?=($value->tgl_selesai != "") ? date_format(date_create($value->tgl_selesai), "Y-m-d") : null?>" <?=($key->status == "VALID")?' readonly':''?>></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-info">Simpan</button>
                                                    </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
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