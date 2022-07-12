<table border=1>
    <tr>
        <th style="text-align:center;"><?= $judul; ?></th>
    </tr>
    <tr>
        <td>
            <div class="table-responsive">
                <table border=1 align="center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($kategori as $k) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $k['kategori']; ?></td>
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