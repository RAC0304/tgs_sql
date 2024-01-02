<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Film - CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datafilm').DataTable({});
    });
  </script>
</head>

<body>
  <div>
    <header>
      <h1>Kelompok II</h1>
    </header>
    <main class="container">
      <section>
        <h2>Tambah Film</h2>
        <form class="row g-3" action="proses/tambah.php" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <label for="inputjudul" class="form-label">Judul Film</label>
            <input type="text" class="form-control" id="inputjudul" name="judul_film">
          </div>
          <div class="col-md-4">
            <label for="inputtahun" class="form-label">Tahun Rilis</label>
            <input type="date" class="form-control" id="inputtahun" name="tahun_rilis">
          </div>
          <div class="col-md-4">
            <label for="inputgenre" class="form-label">Genre</label>
            <select id="inputgenre" class="form-select" name="id_genre">
              <option selected disabled>Pilih...</option>
              <option value="Drama">Drama</option>
              <option value="Komedi">Komedi</option>
              <option value="Aksi">Aksi</option>
              <option value="Romansa">Romansa</option>
              <!-- Isi dengan ID dari setiap genre -->
            </select>
          </div>
          <!-- Batas atas Diedit oleh fachri aditya rizky
          nim: 41522010120
          pada 28 Dec 2023 -->
          <div class="col-4">
            <label for="inputdurasi" class="form-label">Durasi</label>
            <input type="number" class="form-control" id="inputdurasi" name="durasi" placeholder="Satuan Menit">
          </div>
          <!-- Tambah input untuk gambar -->
          <div class="col-12">
            <label for="inputgambar" class="form-label">Gambar Film</label>
            <input type="file" class="form-control" id="inputgambar" name="gambar_film">
          </div>
          <!-- Tambah input untuk deskripsi -->
          <div class="col-12">
            <label for="inputdeskripsi" class="form-label">Deskripsi Film (Maksimal 1000 Karakter)</label>
            <input type="text" class="form-control" id="inputdeskripsi" name="deskripsi_film" maxlength="1000">
          </div>
          <!-- <div class="col-12">
              <div class="row align-items-center pemeran-input">
                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="pemeran" class="form-label">Pemeran</label>
                          <input type="text" class="form-control" name="inputpemeran[]" placeholder="Nama Pemeran">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="inputperan" class="form-label">Peran</label>
                          <select id="inputperan" class="form-select" name="inputperan[]">
                              <option selected disabled>Pilih Peran...</option>
                              <option value="Protagonis">Protagonis</option>
                              <option value="Antagonis">Antagonis</option>
                              <option value="Tritagonis">Tritagonis</option>
                              <option value="Deuteragonis">Deuteragonis</option>
                              <option value="Foil">Foil</option>
                              <option value="Figuran">Figuran</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="d-flex justify-content-end">
                  <button type="button" class="btn btn-success btn-sm tambah-pemeran">
                      <i class="bi bi-plus"></i> Tambah Pemeran
                  </button>
              </div>
          </div> -->
          <!-- Tombol submit -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </section>
      <section>
        <h2 class="text-center judul">Daftar Film</h2>
        <table class="table" id="datafilm">
          <thead>
            <tr>
              <th class="text-center" scope="col">No</th>
              <th class="text-center" scope="col">Poster</th>
              <th class="text-center" scope="col">Judul Film</th>
              <th class="text-center" scope="col">Genre</th>
              <th class="text-center" scope="col">Tahun Rilis</th>
              <th class="text-center" scope="col" style="text-align: center;">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include 'koneksi.php';
            $no = 1;
            $query = "SELECT Film.*, Genre.nama_genre
                                FROM Film
                                INNER JOIN Genre ON Film.id_genre = Genre.id_genre;
                                ";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
              // Output data dari setiap baris
              while ($row = $result->fetch_assoc()) {
                $judul_film = $row['judul_film'];
                $gambar_film = $row['gambar_film'];

                // Asumsikan gambar disimpan dalam folder 'gambar_film'
                $gambar_url = "gambar_film/{$row['gambar_film']}";
            ?>

                <tr class="text-center">
                  <th scope="row"><?php echo $no++; ?></th>
                  <td><img src="<?= $gambar_url; ?>" style="max-height: 40px;"></td>
                  <td><?= $row['judul_film']; ?></td>
                  <td><?= $row['nama_genre']; ?></td>
                  <td><?= $row['tahun_rilis']; ?></td>
                  <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#filmModal_<?= $row['id_film']; ?>">Lihat</button>
                    <a href="edit.php?id=<?= $row['id_film']; ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?= 'proses/hapus.php?id=' . $row['id_film']; ?>" class="btn btn-danger" role="button">Hapus</a>
                    <!-- <a href="edit.php" type="button" class="btn btn-warning">Edit</a> -->
                    <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editFilmModal_<?= $row['id_film']; ?>">Edit</button> -->
                  </td>
                </tr>
            <?php      }
            } else {
              echo '<tr><td colspan="5">Tidak ada data film.</td></tr>';
            } ?>
          </tbody>
        </table>
      </section>
      <section>
        <?php

        include 'koneksi.php';
        $no = 1;
        $query = "SELECT Film.*, Genre.nama_genre
                           FROM Film
                           INNER JOIN Genre ON Film.id_genre = Genre.id_genre;
                           ";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
          // Output data dari setiap baris
          while ($row = $result->fetch_assoc()) {
            $judul_film = $row['judul_film'];
            $gambar_film = $row['gambar_film'];

            // Asumsikan gambar disimpan dalam folder 'gambar_film'
            $gambar_url = "gambar_film/{$row['gambar_film']}";
        ?>


            <!-- Modal -->
            <div class="modal fade" id="<?= 'filmModal_' . $row['id_film']; ?>" tabindex="-1" role="dialog" aria-labelledby="filmModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="filmModal"><?= $row['judul_film']; ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="<?= $gambar_url; ?>" style="max-width: 200px; display: block; margin: auto;" alt="Poster Film">
                    <p><?= $row['deskripsi_film']; ?></p>
                    <p>Genre: <?= $row['nama_genre']; ?></p>
                    <p>Durasi: <?= $row['durasi']; ?></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </section>

      <!-- Batas atas Diedit oleh fachri aditya rizky
    nim: 41522010120
    pada 28 Dec 2023 -->

    </main>
    <!-- javascript buatan -->
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    const tambahPemeranBtn = document.querySelector('.btn-success');

    tambahPemeranBtn.addEventListener('click', function() {
        const daftarPemeran = document.querySelector('.col-12');

        const rowContainer = document.createElement('div');
        rowContainer.classList.add('row', 'align-items-center', 'mb-3');

        const colPemeran = document.createElement('div');
        colPemeran.classList.add('col-md-6');

        const colPeran = document.createElement('div');
        colPeran.classList.add('col-md-6');

        const inputPemeran = document.createElement('div');
        inputPemeran.classList.add('mb-3');

        inputPemeran.innerHTML = `
            <label for="pemeran" class="form-label">Pemeran</label>
            <input type="text" class="form-control" name="inputpemeran[]" placeholder="Nama Pemeran">
        `;
        colPemeran.appendChild(inputPemeran);

        const inputPeran = document.createElement('div');
        inputPeran.classList.add('mb-3');

        inputPeran.innerHTML = `
            <label for="inputperan" class="form-label">Peran</label>
            <select id="inputperan" class="form-select" name="inputperan[]">
                <option selected>Pilih Peran...</option>
                <option value="Protagonis">Protagonis</option>
                <option value="Antagonis">Antagonis</option>
                <option value="Tritagonis">Tritagonis</option>
                <option value="Deuteragonis">Deuteragonis</option>
                <option value="Foil">Foil</option>
                <option value="Figuran">Figuran</option>
            </select>
        `;
        colPeran.appendChild(inputPeran);

        const hapusBtn = document.createElement('button');
        hapusBtn.setAttribute('type', 'button');
        hapusBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'me-2');
        hapusBtn.innerHTML = '<i class="bi bi-trash"></i> Hapus';
        hapusBtn.addEventListener('click', function() {
            rowContainer.remove();
        });

        const btnContainer = document.createElement('div');
        btnContainer.classList.add('d-flex', 'justify-content-end');
        btnContainer.appendChild(hapusBtn);

        rowContainer.appendChild(colPemeran);
        rowContainer.appendChild(colPeran);
        rowContainer.appendChild(btnContainer);
        daftarPemeran.insertBefore(rowContainer, daftarPemeran.lastElementChild);
    });
});

</script> -->
    <!-- JS bootstrap Modal -->
    <!-- JavaScript -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi modals
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function(modal) {
          new bootstrap.Modal(modal);
        });

        // Inisialisasi DataTables
        $(document).ready(function() {
          // Pastikan tabel belum diinisialisasi sebelumnya sebelum menginisialisasi kembali
          if (!$.fn.DataTable.isDataTable('#datafilm')) {
            $('#datafilm').DataTable({});
          }
        });

        // Temukan tombol editFilm dan tambahkan event listener untuk menampilkan modal saat diklik
        var editFilmButton = document.querySelectorAll('[data-bs-target^="#editFilmModal_"]');
        editFilmButton.forEach(function(button) {
          button.addEventListener('click', function() {
            var targetModalId = button.getAttribute('data-bs-target');
            var editFilmModal = document.querySelector(targetModalId);
            if (editFilmModal) {
              var modal = new bootstrap.Modal(editFilmModal, {
                backdrop: 'static', // Atur backdrop modal menjadi statis
                keyboard: false // Nonaktifkan kemampuan menutup modal dengan tombol keyboard
              });
              modal.show();
            }
          });
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- end js -->
</body>

</html>