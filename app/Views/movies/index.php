<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>
<div class="container d-flex justify-content-evenly align-items-center flex-column min-vh-100">
    <div class="text-center">
        <h1>Movies Page</h1>
        <p>This is Movies controller index method</p>
    </div>
    <table class="table" id="movie-table" style="clear: none;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Tahun</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <th scope="row"><?= $movie["ID"] ?></th>
                <td><?= $movie["JUDUL"] ?></td>
                <td><?= $movie["TAHUN"] ?></td>
                <td><a href="#" class="btn btn-success">Detail</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>