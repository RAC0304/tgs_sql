<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Film - CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
</head>

<body>
  <div>
    <header>
      <h1>Kelompok II</h1>
    </header>
    <main class="container">
      <section>
        <h2 class="text-center judul">Daftar Film</h2>
        <table id="myTable" class="display">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul Film</th>
              <th>Genre</th>
              <th>Tahun Rilis</th>
              <th>Aksi</th>
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
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $row['judul_film']; ?></td>
                  <td><?= $row['nama_genre']; ?></td>
                  <td><?= $row['tahun_rilis']; ?></td>
                  <td>
                    <a href="#">Lihat</a>
                    <a href="#">Edit</a>
                    <a href="#">Hapus</a>
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
        <h2>Tambah Film</h2>
        <form action="#">
          <input type="text" name="judul" placeholder="Judul" />
          <input type="text" name="genre" placeholder="Genre" />
          <input type="date" name="tahun_rilis" placeholder="Tahun Rilis" />
          <button type="submit">Tambah</button>
        </form>
      </section>
    </main>
    <footer>
      <p>Copyright &copy; 2023</p>
    </footer>
  </div>
  <!-- javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <!-- end js -->
</body>

</html>