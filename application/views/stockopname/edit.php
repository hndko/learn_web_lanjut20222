<main>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-transparent d-flex justify-content-between">
                Edit StockOpname
                <a href="#" class="btn btn-outline-info btn-sm" onclick="history.back()">
                    <i class="fa-solid fa-backward"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="no_line" class="col-sm-2 col-form-label">No Line</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="no_line" id="no_line" autocomplete="off" value="<?= $res->noline ?>" readonly>
                            <small id="alert" class="form-text text-danger"><?= form_error('no_line') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_transaksi" class="col-sm-2 col-form-label">No Transaksi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" autocomplete="off" value="<?= $res->notransaksi ?>">
                            <small id="alert" class="form-text text-danger"><?= form_error('no_transaksi') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode_item" class="col-sm-2 col-form-label">Kode Item</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_item" id="kode_item" autocomplete="off" value="<?= $res->kodeitem ?>">
                            <small id="alert" class="form-text text-danger"><?= form_error('kode_item') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="real_stock" class="col-sm-2 col-form-label">Real Stock</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="real_stock" id="real_stock" autocomplete="off" value="<?= $res->realstock ?>">
                            <small id="alert" class="form-text text-danger"><?= form_error('real_stock') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_lokasi" class="col-sm-2 col-form-label">ID Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_lokasi" id="id_lokasi" autocomplete="off" value="<?= $res->idlokasi ?>">
                            <small id="alert" class="form-text text-danger"><?= form_error('id_lokasi') ?></small>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Ubah Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>