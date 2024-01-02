<?php
// Diedit oleh fachri aditya rizky
// nim: 41522010120
// pada 28 Dec 2023
// Include file koneksi.php
include '../koneksi.php';

// Check if all required data is present
if (
    isset($_POST['id_film'], $_POST['judul_film'], $_POST['tahun_rilis'], $_POST['durasi'], $_POST['id_genre'], $_POST['deskripsi_film'])
) {
    $id_film = $_POST['id_film'];
    $judul_film = $_POST['judul_film'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $durasi = $_POST['durasi'];

    // Mendapatkan ID genre berdasarkan nama genre yang dipilih
    $nama_genre = $_POST['id_genre'];
    $query_genre = "SELECT id_genre FROM genre WHERE id_genre = ?";
    $stmt_genre = $conn->prepare($query_genre);
    $stmt_genre->bind_param("i", $nama_genre);
    $stmt_genre->execute();
    $result_genre = $stmt_genre->get_result();

    // Pastikan data genre tersedia
    if ($result_genre->num_rows > 0) {
        $row_genre = $result_genre->fetch_assoc();
        $id_genre = $row_genre['id_genre'];

        $deskripsi_film = $_POST['deskripsi_film'];

        // Check if a new image is uploaded
        if (isset($_FILES['gambar_film']) && $_FILES['gambar_film']['error'] === UPLOAD_ERR_OK) {
            // Capture the uploaded image file
            $nama_file = $_FILES['gambar_film']['name'];
            $ukuran_file = $_FILES['gambar_film']['size'];
            $tmp_file = $_FILES['gambar_film']['tmp_name'];

            // Set the destination folder for storing the image
            $folder_gambar = '../gambar_film/';

            // Set a new name for the image file (using a timestamp or other unique name)
            $nama_file_baru = substr(uniqid(), 0, 3) . '_' . $nama_file;
            $nama_file = $nama_file_baru;

            if (isset($_FILES['gambar_film']['tmp_name']) && !empty($_FILES['gambar_film']['tmp_name'])) {
                // Melakukan move_uploaded_file hanya jika file sementara (temporary file) tidak kosong
                if (move_uploaded_file($tmp_file, $folder_gambar . $nama_file)) {
                    // Update query if a new image is uploaded
                    $query = "UPDATE film SET judul_film = ?, tahun_rilis = ?, durasi = ?, id_genre = ?, gambar_film = ?, deskripsi_film = ? WHERE id_film = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssisssi", $judul_film, $tahun_rilis, $durasi, $id_genre, $nama_file, $deskripsi_film, $id_film);
                } else {
                    echo "Gagal memindahkan file.";
                    exit();
                }
            } else {
                echo "File gambar tidak valid.";
                exit();
            }
        } else {
            // Update query if no new image is uploaded
            $query = "UPDATE film SET judul_film = ?, tahun_rilis = ?, durasi = ?, id_genre = ?, deskripsi_film = ? WHERE id_film = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssissi", $judul_film, $tahun_rilis, $durasi, $id_genre, $deskripsi_film, $id_film);
        }

        // Execute the update query
        if ($stmt->execute()) {
            $stmt->close(); // Close the statement after successful execution
            $conn->close(); // Close the database connection
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close(); // Close the statement after an error occurs
        }
    } else {
        echo "Genre tidak valid.";
    }
} else {
    echo "Data yang diperlukan tidak lengkap.";
}
