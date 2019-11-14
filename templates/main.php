<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">

            <?php foreach ($categorys as $value): ?>
            <li class=<?php echo "promo__item promo__item--" .$value['name']; ?>>
                <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($value['name']); ?></a>
            </li>
            <?php endforeach; ?>

        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">

            <?php foreach ($new_lots as $value): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= htmlspecialchars($value['picture']); ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= htmlspecialchars($value['c_name']); ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= htmlspecialchars($value['name']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?= format_numb(htmlspecialchars($value['cost_start'])); ?></span>
                            <span class="lot__cost">
                                
                                <?php
                                    
                                    //$m_price = db_price($db_connect, $value["id"],$value["cost_start"]);
                                    //print_r ($m_price);
                                    //echo format_numb(htmlspecialchars($m_price));
                                ?>        
                            </span>
                        </div>
                        <div 
                            <?php 
                                //print_r($value);

                                $a = lifetime($value['data_end']);
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