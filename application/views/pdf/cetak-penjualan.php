<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Item/Produk</th>
            <th>Jumlah Item</th>
            <th>Satuan</th>
            <th>Harga Satuan</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($details as $detailItem) : ?>
            <tr>
                <td class="align-middle"><?= $no++; ?></td>
                <td class="align-middle"><?= $detailItem->nama_item; ?></td>
                <td class="align-middle"><?= $detailItem->tanggal_transaksi; ?></td>
                <td class="align-middle"><?= $detailItem->jumlah_item; ?> <?= $detailItem->satuan; ?></td>
                <td class="align-middle"><?= format_rupiah($detailItem->harga_satuan); ?></td>
                <td class="align-middle"><?= format_rupiah($detailItem->harga_total); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="total-row">
            <td></td>
            <td class="text-bold text-left" colspan="4">Total Transaksi</td>
            <th><?= format_rupiah($total_grand_total); ?></th>
        </tr>
    </tbody>
</table>