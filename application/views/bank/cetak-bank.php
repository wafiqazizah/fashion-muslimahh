<table border=1>
    <tr>
        <th style="text-align:center"><?= $judul; ?></th>
    </tr>
    <tr>
        <td>
            <div class="table-responsive">
                <table border=1 align="center">
                    <tr>
                        <th>No.</th>
                        <th>ID Bank</th>
                        <th>Nama Bank</th>
                        <th>No. Rekening</th>
                        <th>Atas Nama</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($bank as $b) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $b['id_bank']; ?></td>
                            <td><?= $b['nama_bank']; ?></td>
                            <td><?= $b['no_rek']; ?></td>
                            <td><?= $b['atas_nama_pemilik']; ?></td>

                        </tr>
                    <?php $no++;
                    } ?>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center">
            <?= (date('d M Y H:i:s')); ?>
        </td>
    </tr>
</table>