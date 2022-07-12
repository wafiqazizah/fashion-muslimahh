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
                        <th>Nama Kecamatan</th>
                        <th>Ongkos Kirim</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($kecamatan as $kc) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $kc['nama_kecamatan']; ?></td>
                            <td><?= $kc['ongkos_kirim']; ?></td>
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