<nav class="w-[90%]">
    <?php
        $menuItems = [
        ['name' => 'Accueil', 'url' => '/Pages/home_page.php'],
        ['name' => 'Se connecter', 'url' => '/Pages/login/choix.php'],
        ];
    ?>
    <ul class="flex mr-4 justify-center items-center">
        <li>
            <a href="/Pages/home_page.php" class="text-black mx-1.5">Accueil</a>
        </li>
        <?php if (isset($_SESSION['user_type']) || isset($_SESSION['user_type'] )) :?>
            <li>
                <a href="/Actions/disconection.php" class="text-black mx-1.5 button">Se déconnecter</a>
            </li>
        <?php else :?>
            <li>
                <a href="/Actions/disconection.php" class="text-black mx-1.5 button-nav">Se Connecter</a>
            </li>
        <?php endif;?>
        <?php if (isset($_SESSION['user_type']) || isset($_SESSION['user_type'] )) :?>
            <li>
                <a href="/Pages/login/dashboard.php" class="text-black mx-1.5">Mes données</a>
            </li>
        <?php endif;?>
    </ul>
</nav>