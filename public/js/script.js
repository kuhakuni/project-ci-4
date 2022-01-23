$(document).ready(() => {
	let navLink = document.querySelectorAll(".nav-item .nav-link");
	navLink.forEach(function (link) {
		if (link.href == window.location.href) {
			link.classList.add("active");
			link.setAttribute("aria-current", "page");
		}
	});
	let hrefs = document.querySelectorAll('a[href^="#"]');
	hrefs.forEach((element) => {
		element.addEventListener("click", function (event) {
			event.preventDefault();
			Swal.fire({
				title: "Loading..",
				html: "Tunggu hingga <b></b> milliseconds.",
				timer: 3000,
				timerProgressBar: true,
				allowOutsideClick: false,
				didOpen: () => {
					Swal.showLoading();
					const b = Swal.getHtmlContainer().querySelector("b");
					timerInterval = setInterval(() => {
						b.textContent = Swal.getTimerLeft();
					}, 50);
				},
				willClose: () => {
					clearInterval(timerInterval);
				},
			}).then((result) => {
				Swal.fire({
					title: "Welcome!",
					html: "To our little kingdom!",
					icon: "success",
				});
			});
		});
	});
	$("#movie-table").DataTable();
	$("#insertData").submit(function (event) {
		event.preventDefault();
		let form = $(this);
		let url = form.attr("action");
		let data = form.serialize();
		$.ajax({
			method: "POST",
			url: url,
			data: data,
			dataType: "JSON",
			success: (response) => {
				if (response.status == true) {
					Swal.fire({
						title: "Success!",
						text: "Data has been added",
						icon: "success",
					}).then((result) => {
						if (result.value) {
							window.location.href = "/movies";
						}
					});
				} else {
					if (response.judul) {
						$("#judulFilm").addClass("is-invalid");
						$("#judulFilm").next().html(response.judul);
					} else {
						$("#judulFilm").removeClass("is-invalid");
						$("#judulFilm").next().html("");
					}
					if (response.tahun) {
						$("#tahun").addClass("is-invalid");
						$("#tahun").next().html(response.tahun);
					} else {
						$("#tahun").removeClass("is-invalid");
						$("#tahun").next().html("");
					}
					if (response.sutradara) {
						$("#sutradara").addClass("is-invalid");
						$("#sutradara").next().html(response.sutradara);
					} else {
						$("#sutradara").removeClass("is-invalid");
						$("#sutradara").next().html("");
					}
					if (response.penerbit) {
						$("#penerbit").addClass("is-invalid");
						$("#penerbit").next().html(response.penerbit);
					} else {
						$("#penerbit").removeClass("is-invalid");
						$("#penerbit").next().html("");
					}
					if (response.poster) {
						$("#poster").addClass("is-invalid");
						$("#poster").next().html(response.poster);
					} else {
						$("#poster").removeClass("is-invalid");
						$("#poster").next().html("");
					}
				}
			},
			error: (response) => {
				Swal.fire({
					title: "Failed!",
					text: "Data failed to add",
					icon: "error",
				});
			},
		});
	});
});
