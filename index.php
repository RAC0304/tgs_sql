<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Film - CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

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
        <form>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </form>
      </section>

      <section>
        <h2 class="text-center judul">Daftar Film</h2>
        <table class="table" id="datafilm">
          <thead>
            <tr>
              <th class="text-center" scope="col">No</th>
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
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr class="text-center">
                  <th scope="row"><?php echo $no++; ?></th>
                  <td><?= $row['judul_film']; ?></td>
                  <td><?= $row['nama_genre']; ?></td>
                  <td><?= $row['tahun_rilis']; ?></td>

                  <td>
                    <a href="#" type="button" class="btn btn-secondary">Lihat</a>
                    <a href="#" type="button" class="btn btn-warning">Edit</a>
                    <a href="#" type="button" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
            <?php      }
            } else {
              echo '<tr><td colspan="5">Tidak ada data film.</td></tr>';
            } ?>
          </tbody>
        </table>
      </section>
    </main>
    <!-- <footer>
      <p>Copyright &copy; 2023</p>
    </footer> -->
  </div>
  <!-- javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <!-- end js -->
</body>

</html>