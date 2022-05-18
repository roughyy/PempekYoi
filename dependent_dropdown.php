<?php
include('connection.php');


if (isset($_POST['provinsiID']) && !empty($_POST['provinsiID'])) {

    // Fetch nama kota dari provinsi
    $query = "SELECT * FROM tb_regencies WHERE index_provinsi = " . $_POST['provinsiID'];
    $result = $db->query($query);

    if ($result->rowCount() > 0) {
        echo '<option value="">Pilih Kota</option>';
        while ($row = $result->fetch()) {
            echo '<option value="' . $row['index_regencies'] . '">' . $row['nama_regencies'] . '</option>';
        }
    } else {
        echo '<option value="">Kota Tidak Tersedia</option>';
    }
} elseif (isset($_POST['kotaID']) && !empty($_POST['kotaID'])) {
    // Fetch nama kecamatan dari kota
    $query = "SELECT * FROM tb_kecamatan WHERE index_regencies = " . $_POST['kotaID'];
    $result = $db->query($query);

    if ($result->rowCount() > 0) {
        echo '<option value="">Select kecamatan</option>';
        while ($row = $result->fetch()) {
            echo '<option value="' . $row['index_kecamatan'] . '">' . $row['nama_kecamatan'] . '</option>';
        }
    } else {
        echo '<option value="">Kecamatan tidak tersedia</option>';
    }
} elseif (isset($_POST['kecamatanID']) && !empty($_POST['kecamatanID'])) {
    // Fetch nama kelurahan dari kecamatan
    $query = "SELECT * FROM tb_kelurahan WHERE index_kecamatan = " . $_POST['kecamatanID'];
    $result = $db->query($query);

    if ($result->rowCount() > 0) {
        echo '<option value="">Pilih kelurahan</option>';
        while ($row = $result->fetch()) {
            echo '<option value="' . $row['index_kelurahan'] . '">' . $row['nama_kelurahan'] . '</option>';
        }
    } else {
        echo '<option value="">Kelurahan tidak tersedia</option>';
    }
}
