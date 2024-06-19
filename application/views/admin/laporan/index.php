<div class="mt-5">
    <div class="col-xl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5>Data Laporan</h4>
                    <h6>Tanggal : <?= date('d-m-Y', strtotime($start_date)) ?> - <?= date('d-m-Y', strtotime($end_date)) ?></h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pasien</th>
                                <th>Pemeriksaan</th>
                                <th>Parameter</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $total = 0;
                            foreach($data as $key) { 
                                $total += $key->tarif;
                        ?>
                                <tr>
                                    <td class="truncate-text"><?= $key->nama ?></td>
                                    <td class="truncate-text"><?= $key->jenis_pemeriksaan ?></td>
                                    <td><?= $key->parameter ?></td>
                                    <td><?= date('d-m-Y', strtotime($key->tanggal)) ?></td>
                                    <td><?= number_format($key->tarif, 0, ',', '.') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align: right;"><strong>Total :</strong></td>
                                <td><?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
      window.print();
    };
</script>