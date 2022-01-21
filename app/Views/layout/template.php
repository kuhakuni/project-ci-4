<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <?= $this->include("layout/navbar") ?>
    <?= $this->renderSection("content") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="/js/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(() => {
        let navLink = document.querySelectorAll('.nav-item .nav-link');
        navLink.forEach(function(link) {
            if (link.href == window.location.href) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            }
        });
        let hrefs = document.querySelectorAll('a[href^="#"]');
        hrefs.forEach((element) => {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Loading..',
                    html: 'Tunggu hingga <b></b> milliseconds.',
                    timer: 3000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 50)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    Swal.fire({
                        title: 'Welcome!',
                        html: 'To our little kingdom!',
                        icon: 'success'
                    })
                });
            })
        })
        $("#movie-table").DataTable();
    })
    </script>
</body>

</html>