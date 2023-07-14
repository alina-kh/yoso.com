<header>
    <nav class="nav">
        <div class="container">
            <ul class="nav__menu">
                <?php foreach ($menu as $item): ?>
                    <li class="nav__item">
                        <?php if (empty($item['link'])):?>
                            <span class="nav__link active"><?=$item['name']?></span>
                        <?php else: ?>
                            <a class="nav__link" href="<?=$item['link']?>"><?=$item['name']?></a>
                        <?php endif;?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>