<?php
// Diedit oleh fachri aditya rizky
// nim: 41522010120
// pada 28 Dec 2023
if (isset($_GET['id'])) {
    // Include file koneksi.php
    include '../koneksi.php';
    
    $id_film = $_GET['id'];
    
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        // Proses penghapusan setelah konfirmasi
        $query = "DELETE FROM film WHERE id_film = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_film);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
        }
    } else {
        // Tampilkan konfirmasi penghapusan
        echo "<script>
            const confirmation = confirm('Anda yakin ingin menghapus data ini?');
            if (confirmation) {
                window.location.href = 'hapus.php?id=$id_film&confirm=true';
            } else {
                window.location.href = '../index.php';
            }
        </script>";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
