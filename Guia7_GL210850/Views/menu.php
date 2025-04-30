<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ejemplo MVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="autoresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Autores
          </a>
          <ul class="dropdown-menu" aria-labelledby="autoresDropdown">
            <li><a class="dropdown-item" href="<?= PATH ?>/Autores/create">Registrar autor</a></li>
            <li><a class="dropdown-item" href="<?= PATH ?>/Autores">Ver lista de autores</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="generosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Géneros
          </a>
          <ul class="dropdown-menu" aria-labelledby="generosDropdown">
            <li><a class="dropdown-item" href="#">Registrar género</a></li>
            <li><a class="dropdown-item" href="#">Ver lista de géneros</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="editorialesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Editoriales
          </a>
          <ul class="dropdown-menu" aria-labelledby="editorialesDropdown">
            <li><a class="dropdown-item" href="<?= PATH ?>/Editoriales/create">Registrar editorial</a></li>
            <li><a class="dropdown-item" href="<?= PATH ?>/Editoriales">Ver lista de editoriales</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="librosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Libros
          </a>
          <ul class="dropdown-menu" aria-labelledby="librosDropdown">
            <li><a class="dropdown-item" href="#">Registrar libro</a></li>
            <li><a class="dropdown-item" href="#">Ver lista de libros</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuario
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>