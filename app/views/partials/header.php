<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">🌍 MultiLang Site</a>

    <div class="d-flex align-items-center ms-auto">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="/assets/img/flags/<?php echo $_SESSION['lang'] ?? 'fr'; ?>.png" alt="Lang" width="24" height="16" class="me-2">
          <span class="fw-semibold text-uppercase"><?php echo $_SESSION['lang'] ?? 'FR'; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="langDropdown">
          <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=fr">
              <img src="/assets/img/flags/fr.png" alt="Français" width="24" height="16" class="me-2">
              Français
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=en">
              <img src="/assets/img/flags/en.png" alt="English" width="24" height="16" class="me-2">
              English
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
