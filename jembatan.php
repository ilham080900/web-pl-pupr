<?php 
require 'function.php';

$result = mysqli_query($conn, "SELECT * FROM datajembatan");


if (isset($_POST["simpan_jembatan"])) {
  
  if(tambahjembatan ($_POST) > 0){
    echo "
    <script>
    alert('data berhasil ditambahkan');
    document.location.href = 'jembatan.php';
    </script>";
  } else {
    $berhasil = false;
  }

  $berhasil = false;
}


include('include/header.php');
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Jembatan</h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahjembatan"><i class="fas fa-plus fa-sm text-white-50"></i> Jembatan</a> </button>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data Tabel</h6> <hr>

        <a class="pdf justify-content-lg-center" href="cetakjembatan.php" target="_blank" alt="" title="PDF"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="22" fill="#1cc88a" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
          <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
          <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
        </svg>PDF</a>
        <a class="print justify-content-center" href="javascript:printDiv('print');" alt="" title="Print"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="22" fill="#1cc88a" class="bi bi-printer-fill" viewBox="0 0 16 16">
          <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
          <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        </svg>Print</a>

      </div>
      <div class="card-body" id="print">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">           
              <tr>
                <th>No</th>
                <th>Nomor Ruas & Nama Ruas</th>
                <th>Nama Jembatan</th>
                <th>STA</th>
                <th>Tahun Pembuatan Jembatan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row["noruas_namaruas"] ?></td>
                <td><?php echo $row["namajembatan"] ?></td>
                <td><?php echo $row["sta"] ?></td>
                <td><?php echo $row["tahunpembuatan"] ?></td>
                <td>
                <a href="hapusjembatan.php?id=<?= $row["id"]; ?>" title="Hapus Data" class="btn btn-danger btn-sm mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambahjembatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahjembatanLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="tambahjembatanLabel">Tambah Data</h5>
                        </div>
                        <form action="" method="post">
                          <div class="modal-body d-flex justify-content-between">
                            <div class="col-xl-6 m-auto">
                              <label for="noruas_namaruas" class="form-label">No Ruas dan Nama Ruas</label>
                              <input name="noruas_namaruas" type="text" class="form-control" id="noruas_namaruas">
                            </div>
                            <div class="col-xl-6 m-auto">
                              <label for="namajembatan" class="form-label">Nama Jembatan</label>
                              <input name="namajembatan" type="text" class="form-control" id="namajembatan">
                            </div>
                          </div>
                          <div class="modal-body d-flex justify-content-between">
                            <div class="col-xl-6 m-auto">
                              <label for="sta" class="form-label">Stasioning</label>
                              <input name="sta" type="text" class="form-control" id="sta">
                            </div>
                            <div class="col-xl-6 m-auto">
                              <label for="tahunpembuatan" class="form-label">Tahun Pembuatan</label>
                              <input name="tahunpembuatan" type="text" class="form-control" id="tahunpembuatan">
                            </div>
                          </div>
                          
                          <div class="modal-footer">
                            <button type="submit" name="simpan_jembatan" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
    </div>
  </div>

  <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>

<?php
include('include/footer.php');
?>