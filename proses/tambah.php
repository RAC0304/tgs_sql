<?php
// Diedit oleh fachri aditya rizky
// nim: 41522010120
// pada 28 Dec 2023

// Include file koneksi.php
include '../koneksi.php';

// Check if all required data is present
if (
    isset($_POST['judul_film'], $_POST['tahun_rilis'], $_POST['durasi'], $_POST['id_genre'], $_POST['deskripsi_film'])
    && isset($_FILES['gambar_film']) && $_FILES['gambar_film']['error'] === UPLOAD_ERR_OK
) {
    $judul_film = $_POST['judul_film'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $durasi = $_POST['durasi'];
    
    // Mendapatkan ID genre berdasarkan nama genre yang dipilih
    $nama_genre = $_POST['id_genre'];
    $query_genre = "SELECT id_genre FROM genre WHERE nama_genre = ?";
    $stmt_genre = $conn->prepare($query_genre);
    $stmt_genre->bind_param("s", $nama_genre);
    $stmt_genre->execute();
    $result_genre = $stmt_genre->get_result();
    
    // Pastikan data genre tersedia
    if($result_genre->num_rows > 0) {
        $row_genre = $result_genre->fetch_assoc();
        $id_genre = $row_genre['id_genre'];
        
        $deskripsi_film = $_POST['deskripsi_film'];

        // Capture the uploaded image file
        $nama_file = $_FILES['gambar_film']['name'];
        $ukuran_file = $_FILES['gambar_film']['size'];
        $tmp_file = $_FILES['gambar_film']['tmp_name'];

        // Set the destination folder for storing the image
        $folder_gambar = '../gambar_film/';

        // Set a new name for the image file (using a timestamp or other unique name)
        $nama_file_baru = substr(uniqid(), 0, 3) . '_' . $nama_file;

        if (move_uploaded_file($tmp_file, $folder_gambar . $nama_file_baru)) {
            // Use a prepared statement to prevent SQL Injection
            $query = "INSERT INTO film (judul_film, tahun_rilis, durasi, id_genre, gambar_film, deskripsi_film) 
                      VALUES (?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssisss", $judul_film, $tahun_rilis, $durasi, $id_genre, $nama_file_baru, $deskripsi_film);
        
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
            echo "Upload gambar gagal.";
        }
    } else {
        echo "Genre tidak valid.";
    }
} else {
    echo "Data yang diperlukan tidak lengkap atau gambar tidak diunggah.";
}
?>
