<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Contacts App</title>
    <!-- Adicione aqui links para CSS externos ou internos, como Bootstrap se necessário -->
</head>
<body>
    <div class="container">
        <button class="hamburger">&#9776;</button> <!-- Botão Hambúrguer -->
        <div class="sidebar">
            <div class="sidebar-logo">
              <img src="{{ asset('imgs/alfasoft.png') }}" alt="Alfasoft Logo">
            </div>
            <nav>
                <ul class="list-menu">
                    <li class="item"><a href="{{ route('contacts.index') }}">Home</a></li>
                    <li class="item"><a href="{{ route('contacts.create') }}">Add Contact</a></li>
                    <!-- Adicione mais links conforme necessário -->
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <!-- Conteúdo Principal -->
            @yield('content')
        </div>
    </div>

    <!-- Scripts JS -->
</body>
</html>
<style>
    .container {
        display: flex;
    }

    /* Estilo do botão hambúrguer */
.hamburger {
  display: none; /* Inicialmente oculto */
  font-size: 24px;
  cursor: pointer;
}

/* Sidebar - inicialmente visível */
.sidebar {
    width: 250px;
    position: fixed;
    z-index: 99;
    height: 100vh;
    overflow-y: auto;
    background-color: #0081AF;
    transition: 0.3s; /* Suaviza a transição */
}

/* Estilos para dispositivos móveis */
@media (max-width: 768px) {
    .hamburger {
        display: block;
    position: fixed;
    top: 15px;
    left: 15px;
    background: #318fff;
    border: none;
    z-index: 1001;
    border-radius: 10px;
    color: #fff;
    }

    .sidebar {
        width: 60%; /* Largura da sidebar em dispositivos móveis */
        left: -100%; /* Esconde a sidebar fora da tela */
    }

    .sidebar.active {
        left: 0; /* Exibe a sidebar quando ativa */
    }

    .sidebar-logo img {
    width: 50%;
}

.main-content {
        margin: 0 auto !important;
        padding: 100px 0 50px 0 !important;
        width: auto !important;
    }
}


    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
    }

    .sidebar-logo {
        text-align: center;
    }

    .sidebar-logo img {
        width: 70%;
    }

    .list-menu {
        padding: 0 6px;
    }

    .list-menu .item a{
        height: 40px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-weight: 600;
        color: #0081AF;
        margin-top: 10px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var hamburger = document.querySelector('.hamburger');
    var sidebar = document.querySelector('.sidebar');

    hamburger.addEventListener('click', function () {
        sidebar.classList.toggle('active'); // Alterna a classe "active" do sidebar
    });
});

</script>