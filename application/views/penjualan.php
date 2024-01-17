<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Penjualan</h3>
                <p class="text-subtitle text-muted">Data penjualan produk PT. NAKARAN PANGAN PERKASA GROUP</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addBelanjaModal">
                    Tambah Data Baru
                </button>
                <button class="btn btn-primary btn-sm" id="generatePDFBtn">Generate PDF</button>
            </div>
            <div class="card-body">
                <table class="table table-striped~" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Item/Produk</th>
                            <th>Jumlah Item</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>

                </table>
            </div>

        </div>

    </section>
</div>