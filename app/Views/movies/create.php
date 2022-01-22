<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>
<div class="container d-flex justify-content-evenly align-items-center flex-column min-vh-100">
    <div class="text-center">
        <h1>Tambah Data Film</h1>
        <p>This is Movies controller index method</p>


    </div>
    <div class="col-8 mx-auto bg-light p-4 rounded-2">
        <form action="/movies/save" method="POST" id="insertData">
            <?= csrf_field() ?>
            <div class="row mb-3">
                <label for="judulFilm" class="col-sm-2 col-form-label">Judul Film</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judulFilm" name="judul" required autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun Rilis</label>
                <div class="col-sm-10">
                    <input type="number" min="0" max="2022" class="form-control" id="tahun" name="tahun" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="sutradara" class="col-sm-2 col-form-label">Sutradara</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sutradara" name="sutradara" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="poster" name="poster" required>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type=" submit" class="fw-bold btn btn-primary"><i class="bi bi-plus"></i> Tambahkan
                    data</button>
                <a href="/movies" class="text-muted btn">Kembali</a>
            </div>
        </form>
    </div>

</div>
<?= $this->endSection() ?>