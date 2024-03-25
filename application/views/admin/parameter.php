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
                                    Data Parameter
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 col-md-4 col-sm-6 text-end">
                            <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#largeModal">
                                Tambah Admin
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row my-4">
        <div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Tambah Parameter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir -->
                        <form action="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/prosesadd" method="post">
                            <div class="row">
                                
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <div class="mb-3">
                                        <label for="jenisPem" class="form-label">Jenis Pemeriksaan</label>
                                        <select name="jenis_pemeriksaan" class="form-control" id="jenisPem" required>
                                            <?php foreach ($this->M_jenis_pemeriksaan->select()->result() as $key) { ?>
                                            <option value="<?=$key->nama?>"><?=$key->kode?> - <?=$key->nama?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="kode" placeholder="Kode" name="kode">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noRM" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="noRM" placeholder="Nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <input type="text" class="form-control" id="satuan" placeholder="Satuan" name="satuan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nominal" class="form-label">Nominal</label>
                                        <input type="text" class="form-control" id="nominal" placeholder="Nominal" name="nominal">
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
        

        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Jenis Pemeriksaan</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Nominal</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key) { ?>
                                <tr>
                                <td><?= $key->jenis_pemeriksaan ?></td>
                                <td><?= $key->kode ?></td>
                                <td><?= $key->nama ?></td>
                                <td><?= $key->satuan ?></td>
                                <td><?= number_format($key->nominal, 0, ',', '.') ?></td>
                                <td>

                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal<?=$key->id?>">
                                        <i class=" fa fa-edit"></i> Edit
                                    </button>

                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$key->id?>">
                                        <i class=" fa fa-trash"></i> delete
                                    </button>


                                </td>
                                <td>

                                </td>
                            </tr>
                                <div class="modal fade " id="deleteModal<?=$key->id?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="largeModalLabel">Hapus Parameter</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulir -->
                                                <form action="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/delete/<?= $key->id ?>" method="get">
                                                    Apakah Anda Yakin ingin menghapus Data?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg" id="editModal<?=$key->id?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="largeModalLabel">Edit Parameter</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulir -->
                                                <form action="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/editProccess/<?=$key->id?>" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="kode" class="form-label">Kode</label>
                                                                <input type="text" class="form-control" id="kode" placeholder="Kode" name="kode" value="<?=$key->kode?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?=$key->nama?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="satuan" class="form-label">Satuan</label>
                                                                <input type="text" class="form-control" id="satuan" placeholder="satuan" name="Satuan" value="<?=$key->satuan?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nominal" class="form-label">Nominal</label>
                                                                <input type="text" class="form-control" id="nominal" placeholder="Nominal" name="nominal" value="<?=$key->nominal?>">
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
                            <?php
                            }
                            ?>
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
        $('#myTable').DataTable();
    });
</script>