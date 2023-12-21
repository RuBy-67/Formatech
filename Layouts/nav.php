<nav class="w-[90%]">
    <?php
        $menuItems = [
        ['name' => 'Accueil', 'url' => '/Pages/home_page.php'],
        ['name' => 'Se connecter', 'url' => '/Pages/login/choix.php'],
        ];
    ?>
    <ul class="flex mr-4 justify-center">
    <?php foreach ($menuItems as $item): ?>
        <li>
            <a href="<?= $item['url']; ?>" class="text-black mx-1.5">
            <?= $item['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
</nav>