<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/pages">CI Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if (uri_string() == "pages") {
                    	echo "active";
                    } ?>" href="/pages">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (
                    	uri_string() == "pages/about"
                    ) {
                    	echo "active";
                    } ?>" href="/pages/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (
                    	uri_string() == "pages/contact"
                    ) {
                    	echo "active";
                    } ?>" href="/pages/contact">Contact</a>
                </li>
            </ul>
        </div>

    </div>
</nav>