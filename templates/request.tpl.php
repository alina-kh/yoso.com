<div class="card">
    <form class="form" action="<?=$url?>" method="post">
        <select class="form__control form__select" name="login" id="login" required>
            <?php foreach ($users as $item): ?>
                <?php if (!empty($post['login'])):?>
                    <?php if($item['login'] === $post['login']) :?>
                        <option selected="selected" value="<?=$item['login']?>"><?=$item['name']?></option>
                    <?php endif;?>
                <?php else :?>
                    <option value="<?=$item['login']?>"><?=$item['name']?></option>
                <?php endif;?>
            <?php endforeach; ?>
        </select>
        <input required type="email" class="form__control form__input" name="email" id="email" placeholder="Email" value="<?= !empty($post['email']) ? $post['email'] : ''; ?>">
        <input required type="tel" class="form__control form__input" name="phone" id="phone" placeholder="Телефон: 00000000000" pattern="[0-9]{11}" value="<?= !empty($post['phone']) ? $post['phone'] : ''; ?>">
        <textarea required type="text" class="form__control form__textarea" name="address" id="address" placeholder="Адрес"><?= !empty($post['address']) ?$post['address'] : ''; ?></textarea>
        <textarea required type="text" class="form__control form__textarea" name="message" id="message" placeholder="Текст заявки"><?= !empty($post['message']) ? $post['message'] : ''; ?></textarea>
        <div class="wrapper">
            <button class="btn btn--primary" name="add_req_us" type="submit">Отправить</button>
            <button class="btn" name="del_req" type="reset">Очистить</button>
        </div>
    </form>
</div>