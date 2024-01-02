<!DOCTYPE html>
<!-- // Diedit oleh fachri aditya rizky
// nim: 41522010120
// pada 28 Dec 2023 -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="container mt-5">
        <?php
        // Include file koneksi.php
        include 'koneksi.php';

        // Check if id is sent via GET request
        if (isset($_GET['id'])) {
            $id_film = $_GET['id'];

            // Query to select film data by id_film
            $query = "SELECT * FROM film WHERE id_film = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_film);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the film data is found
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <!-- Form -->
        <div class="formFile">
            <div class="formFile-header">
                <h5 class="formFile-title">Edit Film - <?= htmlspecialchars($row['judul_film']); ?></h5>
                <a href="index.php" class="btn-close"></a>
            </div>
            <div class="formFile-body">
                <!-- Form untuk mengedit data film -->
                <form action="proses/update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_film" value="<?= $id_film ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputjudul" class="form-label">Judul Film</label>
                            <input type="text" class="form-control" id="inputjudul" name="judul_film" value="<?= htmlspecialchars($row['judul_film']); ?>" placeholder="Judul Film">
                        </div>
                        <div class="col-md-4">
                            <label for="inputtahun" class="form-label">Tahun Rilis</label>
                            <input type="date" class="form-control" id="inputtahun" name="tahun_rilis" value="<?= htmlspecialchars($row['tahun_rilis']); ?>" placeholder="Tahun Rilis">
                        </div>
                        <div class="col-md-4">
                            <label for="inputgenre" class="form-label">Genre</label>
                            <select id="inputgenre" class="form-select" name="id_genre">
                                <option selected disabled>Pilih...</option>
                                <option value="1" <?= ($row['id_genre'] ?? '') == 1 ? 'selected' : ''; ?>>Drama</option>
                                <option value="2" <?= ($row['id_genre'] ?? '') == 2 ? 'selected' : ''; ?>>Komedi</option>
                                <option value="3" <?= ($row['id_genre'] ?? '') == 3 ? 'selected' : ''; ?>>Aksi</option>
                                <option value="4" <?= ($row['id_genre'] ?? '') == 4 ? 'selected' : ''; ?>>Romansa</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="inputdurasi" class="form-label">Durasi</label>
                            <input type="number" class="form-control" id="inputdurasi" name="durasi" placeholder="Satuan Menit" value="<?= htmlspecialchars($row['durasi']); ?>" placeholder="Durasi">
                        </div>
                        <!-- Tambah input untuk gambar -->
                        <div class="col-12">
                            <label for="inputgambar" class="form-label">Gambar Film</label>
                            <input type="file" class="form-control" id="inputgambar" name="gambar_film" onchange="previewImage(event)">
                            <img id="preview" src="gambar_film/<?= $row['gambar_film']; ?>" alt="Preview" style="max-width: 200px; max-height: 200px;">
                        </div>
                        <!-- Tambah input untuk deskripsi -->
                        <div class="col-12">
                            <label for="inputdeskripsi" class="form-label">Deskripsi Film (Maksimal 1000 Karakter)</label>
                            <textarea class="form-control" id="inputdeskripsi" name="deskripsi_film" maxlength="220" placeholder="Deskripsi Film"><?= htmlspecialchars($row['deskripsi_film']); ?></textarea>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="index.php" class="btn btn-secondary">Tutup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    } else {
        echo "Data film tidak ditemukan.";
    }
    $stmt->close(); // Close the statement
} else {
    echo "ID film tidak ditemukan.";
}
?>
</section>
<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
 <!-- Bootstrap Bundle with Popper -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
