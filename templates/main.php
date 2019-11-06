<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">

            <?php foreach ($categorys as $value): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($value); ?></a>
            </li>
            <?php endforeach; ?>

        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">

            <?php foreach ($offers as $value): ?>
            <?php $price = rand(500,50000); ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= htmlspecialchars($value['category']); ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= htmlspecialchars($value['name']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?= format_numb(htmlspecialchars($value['price'])); ?></span>
                            <span class="lot__cost"><?= format_numb(htmlspecialchars($price)); ?></span>
                        </div>
                        <div 
                            <?php 
                                $a = lifetime($value['endtime']);
                                if ($a[0] == "00") {
                                    echo 'class="timer--finishing"';
                                }elseif ($a[0] !=="00") {
                                    echo 'class="lot__timer timer"';
                                }
                            ?>
                        >
                           <?php echo $a[0] . ":" . $a[1]; ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach ;?>
        </ul>
    </section>
</main>