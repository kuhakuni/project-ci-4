<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>
<div class="container d-flex justify-content-evenly align-items-center flex-column min-vh-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 mx-auto" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/images/<?= $movie[
                        	"IMAGE"
                        ] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8 my-auto">
                        <div class="card-body">
                            <h5 class="card-title"><?= $movie[
                            	"JUDUL"
                            ] ?> (<?= $movie["TAHUN"] ?>)</h5>
                            <p class="card-text">by <?= $movie[
                            	"SUTRADARA"
                            ] ?></p>
                            <p class="card-text">Distributed by <span class="fw-bold"><?= $movie[
                            	"PENERBIT"
                            ] ?></span></p>

                            <a href="#" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                            <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill text-dark"></i></a>

                            <div class="mt-5">
                                <a href="/movies" class="">Kembali</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>