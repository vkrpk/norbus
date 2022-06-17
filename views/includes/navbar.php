<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="/">
                <img src="https://zupimages.net/up/22/22/zude.png" alt="logo">
            </a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <li><a href="/admin/orders">Réservations</a></li>
                <li><a href="/admin/order/create">Réservez</a></li>
                <?php if(isset($_SESSION['auth'])):?>
                    <li><a href="/logout">Se déconnecter</a></li>
                <?php else:?>
                    <li><a href="">Inscription</a></li>
                    <li><a href="">Connexion</a></li>
                <?php endif;?>
                <form action="" method="POST" id="form-logout">
                    <!-- <li><a href="" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Deconnexion</a></li> -->
                </form>
            </ul>
        </div>
        <span class="navTrigger">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </div>
</nav>
