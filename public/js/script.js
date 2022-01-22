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
});
