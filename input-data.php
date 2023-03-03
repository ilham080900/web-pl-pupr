<?php

require 'function.php';

if (isset($_POST["simpan"])) {
  
  if(tambah ($_POST) > 0){
    $berhasil = true;
  } else {
    $berhasil = false;
  }

  $berhasil = false;
}

include('include/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Input Kondisi Jalan</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success">Data Tabel</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>STA Awal</th>
              <th>STA Akhir</th>
              <th>Data Kondisi Jalan</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>0+000</td>
              <td>0+100</td>
              <td>
                <div class="d-flex justify-content-center m-auto">
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data Kondisi
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h5>
                        </div>
                        <form action="" method="post">
                          <div class="modal-body d-flex justify-content-between">
                            <div class="col-xl-6 m-auto">
                              <label for="noruas" class="form-label">No Ruas</label>
                              <input name="noruas" type="text" class="form-control" id="noruas">
                            </div>
                            <div class="col-xl-6 m-auto">
                              <label for="namaruas" class="form-label">Nama Ruas</label>
                              <input name="namaruas" type="text" class="form-control" id="namaruas">
                            </div>
                          </div>
                          <div class="modal-body d-flex justify-content-between">
                            <div class="col-xl-6 m-auto">
                              <label for="stasioningawal" class="form-label">Stasioning Awal</label>
                              <input name="stasioningawal" type="text" class="form-control" id="stasioningawal">
                            </div>
                            <div class="col-xl-6 m-auto">
                              <label for="stasioningakhir" class="form-label">Stasioning Akhir</label>
                              <input name="stasioningakhir" type="text" class="form-control" id="stasioningakhir">
                            </div>
                          </div>
                          <div class="modal-body d-flex justify-content-between">
                            <div class="col-xl-6 mb-1">
                              <label for="lebarjalan" class="form-label">Lebar Jalan (M)</label>
                              <input name="lebarjalan" type="text" class="form-control" id="lebarjalan">
                            </div>
                            <div class="col-xl-6 mb-1">
                              <label for="panjangjalan" class="form-label">Panjang Jalan (M)</label>
                              <input name="panjangjalan" type="text" class="form-control" id="panjangjalan">
                            </div>
                          </div>
                          <div class="container text-center mr-8 pr-8">
                            <table class="table table-bordered border-primary">
                              <tbody>
                                <tr>
                                  <td colspan="4">Kondisi Drainese</td>
                                  <td colspan="4">Kondisi Bahu</td>
                                  <td colspan="4">Kondisi Perkerasan Jalan</td>
                                  <td rowspan="3" style="padding-top: 8rem;">Keterangan</td>
                                  <td rowspan="3" style="padding-top: 8rem;">Action</td>
                                </tr>
                                <tr>
                                  <td colspan="2">Kiri</td>
                                  <td colspan="2">Kanan</td>
                                  <td colspan="2">Kiri</td>
                                  <td colspan="2">Kanan</td>
                                  <td rowspan="2" style="padding-top: 5rem;">Idx</td>
                                  <td colspan="3">Dimensi Kerusakan</td>
                                </tr>
                                <tr>
                                  <td style="padding-top: 2rem;">Index</td>
                                  <td style="padding-top: 2rem;">Panjang (M)</td>
                                  <td style="padding-top: 2rem;">Index</td>
                                  <td style="padding-top: 2rem;">Panjang (M)</td>
                                  <td style="padding-top: 2rem;">Index</td>
                                  <td style="padding-top: 2rem;">Panjang (M)</td>
                                  <td style="padding-top: 2rem;">Index</td>
                                  <td style="padding-top: 2rem;">Panjang (M)</td>
                                  <td style="padding-top: 2rem;">Panjang (M)</td>
                                  <td style="padding-top: 2rem;">Lebar (M)</td>
                                  <td style="padding-top: 2rem;">Dalam (M)</td>
                                </tr>
                                <td>
                                  <div style="text-align: center;">
                                    <select name="idx_1" style="width: 53px; height: 36px;">
                                      <option selected>Pilih</option>
                                      <option value="0">0 - Tidak ada & Tidak perlu</option>
                                      <option value="1">1 - Baik</option>
                                      <option value="2">2 - Sedang (Pembersihan Saja)</option>
                                      <option value="3">3 - Rusak (Perbaiki)</option>
                                      <option value="4">4 - Rusak Berat</option>
                                      <option value="5">5 - Tidak Ada, Perlu</option>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input1" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div style="text-align: center;">
                                    <select name="idx_2" style="width: 53px; height: 36px;">
                                      <option selected>Pilih</option>
                                      <option value="0">0 - Tidak ada & Tidak perlu</option>
                                      <option value="1">1 - Baik</option>
                                      <option value="2">2 - Sedang (Pembersihan Saja)</option>
                                      <option value="3">3 - Rusak (Perbaiki)</option>
                                      <option value="4">4 - Rusak Berat</option>
                                      <option value="5">5 - Tidak Ada, Perlu</option>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input2" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div style="text-align: center;">
                                    <select name="idx_3" style="width: 53px; height: 36px;">
                                      <option selected>Pilih</option>
                                      <option value="1">1 - Bentuk & Kemiringan Baik</option>
                                      <option value="2">2 - Kemiringan Buruk (Gali/Timbun)</option>
                                      <option value="3">3 - Tinggi/Rendah < 10 cm (Gali/Timbun)</option>
                                      <option value="4">4 - > 10 cm /Tidak Ada</option>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input3" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div style="text-align: center;">
                                    <select name="idx_4" style="width: 53px; height: 36px;">
                                      <option selected>Pilih</option>
                                      <option value="1">1 - Bentuk & Kemiringan Baik</option>
                                      <option value="2">2 - Kemiringan Buruk (Gali/Timbun)</option>
                                      <option value="3">3 - Tinggi/Rendah < 10 cm (Gali/Timbun)</option>
                                      <option value="4">4 - > 10 cm /Tidak Ada</option>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input4" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div style="text-align: center;">
                                    <select name="idx_5" style="width: 32px; height: 36px;">
                                      <option selected>Tidak ada kerusakan</option>
                                      <option value="1">1 - Lubang</option>
                                      <option value="2">2 - Legok/Amblas</option>
                                      <option value="3">3 - Retak</option>
                                      <option value="4">4 - Alur</option>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input5" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input6" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input7" type="text" class="form-control">
                                  </div>
                                </td>
                                <td>
                                  <div>
                                    <input name="text_input8" type="text" class="form-control">
                                  </div>
                                </td>
                                <td><a type="button" class="text-delete" style="color: red;" disabled aria-label="Delete">Hapus</a></td>
                              </tbody>
                            </table>
                          </div>
                          <br><br><br><br><br><br>
                          <div class="modal-footer">
                            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center m-auto">
                  <?php if (isset($berhasil)) : ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#rekap_data"> Lihat Data Kondisi
                  </button>
                  <?php else : ?>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#"> Lihat Data Kondisi
                  </button>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('include/footer.php');
?>