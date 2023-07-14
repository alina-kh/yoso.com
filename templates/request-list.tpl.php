<div class="card">
    <?php if (!empty($items) && is_array($items)):?>
        <ul class="list">
            <?php foreach ($items as $item): ?>
                <li class="list__item request">
                    <h2 class="request__title">Заявка от пользователя login: <?=$item['login']?></h2>
                    <h3 class="request__subtitle">Контактная информация:</h3>
                    <ul class="request__list list">
                        <li class="request__text"><b>email: </b><?=$item['email']?></li>
                        <li class="request__text"><b>телефон: </b><?=$item['phone']?></li>
                        <li class="request__text"><b>адрес доставки: </b><?=$item['address']?></li>
                    </ul>
                    <p class="request__text">
                        <b>Текст сообщения: </b><?=$item['message']?>
                    </p>
                </li><hr>				
            <?php endforeach; ?>
        </ul>
        <?php if ($navigation) :?>	
            <nav class="pagination">
                <ul class="pagination__list">

                    <?php if (!empty($navigation['first'])) :?>
                        <li class="pagination__item first">
                            <a class="pagination__link" href="<?=$app->urlFor('request-list')?>">&lt;&lt;</a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if (!empty($navigation['last_page'])) :?>
                        <li class="pagination__item">
                            <a class="pagination__link" href="<?=$app->urlFor('request-list', array('page' => $navigation['last_page']))?>">&lt;</a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if (!empty($navigation['previous'])) :?>
                        <?php foreach($navigation['previous'] as $val) :?>
                            <li class="pagination__item">
                                <a class="pagination__link" href="<?=$app->urlFor('request-list', array('page' => $val))?>"><?=$val?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
            
                    <?php if (!empty($navigation['current'])) :?>
                        <li class="pagination__item active">
                            <span class="pagination__link"><?=$navigation['current']?></span>
                        </li>
                    <?php endif; ?>
                        
                    <?php if (!empty($navigation['next'])) :?>
                        <?php foreach($navigation['next'] as $v) :?>
                            <li class="pagination__item">
                                <a class="pagination__link" href="<?=$app->urlFor('request-list', array('page' => $v))?>"><?=$v?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($navigation['next_pages'])) :?>
                        <li class="pagination__item">
                            <a class="pagination__link" href="<?=$app->urlFor('request-list', array('page'=>$navigation['next_pages']))?>">&gt;</a>
                        </li>
                    <?php endif; ?>	
                        
                    <?php if (!empty($navigation['end'])) :?>
                        <li class="pagination__item last">
                            <a class="pagination__link" href="<?=$app->urlFor('request-list', array('page'=>$navigation['end']))?>">&gt;&gt;</a>
                        </li>
                    <?php endif; ?>		
                </ul>
            </nav>
        <?php endif;?>
    <?php else :?>
        <h3>Запросов нет</h3>
    <?php endif;?>
</div>