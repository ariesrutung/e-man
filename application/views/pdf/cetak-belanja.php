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
        $jumlah_modal = 0;

        foreach ($details as $row) :
            $jumlah_modal += $row->harga_total;
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td class="text-left"><?= $row->nama_item; ?></td>
                <td><?= $row->jumlah_item; ?></td>
                <td><?= $row->satuan; ?></td>
                </td>
                <td><?= format_rupiah($row->harga_satuan); ?></td>
                <td><?= format_rupiah($row->harga_total); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="total-row">
            <td></td>
            <td class="text-bold text-left" colspan="4">Total Modal</td>
            <td class="text-bold"><?= format_rupiah($jumlah_modal); ?></td>
        </tr>
    </tbody>
</table>