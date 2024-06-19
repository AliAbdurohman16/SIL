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
                                    Laporan
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row my-4">
        <div class="col-xl-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url() ?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/prosess" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Mulai Dari Tanggal</label>
                                    <input type="date" class="form-control" id="start_date" placeholder="Mulai Dari" name="start_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="end_date" placeholder="Sampai Tanggal" name="end_date" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn bg-gradient-info btn-lg w-100">Proses</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>