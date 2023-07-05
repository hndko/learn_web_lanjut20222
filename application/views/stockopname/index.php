<main>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-transparent d-flex justify-content-between">
                List StockOpname
                <a href="<?= base_url('stockopname/create') ?>" class="btn btn-outline-primary btn-sm">
                    <i class="fa-solid fa-square-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body table-responsive">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('message') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NoLine</th>
                            <th scope="col">NoTransaksi</th>
                            <th scope="col">KodeItem</th>
                            <th scope="col">RealStock</th>
                            <th scope="col">IdLokasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $res) : ?>
                            <tr>
                                <td><?= $res->noline ?></td>
                                <td><?= $res->notransaksi ?></td>
                                <td><?= $res->kodeitem ?></td>
                                <td><?= $res->realstock ?></td>
                                <td><?= $res->idlokasi ?></td>
                                <td>
                                    <a href="<?= base_url('stockopname/edit/' . $res->noline) ?>" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="<?= base_url('stockopname/delete/' . $res->noline) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>