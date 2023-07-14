<div class="card">    
    <ul class="list">
        <?php if(!empty($users) && is_array($users)):?>
            <?php foreach ($users as $item): ?>
                <li class="list__item"><a class="list__link" href="/user/<?=$item['login']?>"><?=$item['name']?></a></li>
            <?php endforeach; ?>
        <?php endif;?>
    </ul>
</div>