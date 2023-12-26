<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Film - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div>
        <header>
            <h1>Kelompok II</h1>
        </header>
        <main class="container">
            <section>
                <h2 class="text-center">Daftar Film</h2>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Tahun Rilis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <?php

                    ?>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>The Batman</td>
                            <td>Aksi</td>
                            <td>2022</td>
                            <td>
                                <a href="#">Lihat</a>
                                <a href="#">Edit</a>
                                <a href="#">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section>
                <h2>Tambah Film</h2>
                <form action="#">
                    <input type="text" name="judul" placeholder="Judul">
                    <input type="text" name="genre" placeholder="Genre">
                    <input type="date" name="tahun_rilis" placeholder="Tahun Rilis">
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
    <!-- end js -->
</body>

</html>