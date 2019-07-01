<?php
declare(strict_types=1);

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$APPLICATION->SetPageProperty('title', 'Список проектов');
?>


<section class='grid lead'>
    <h1 class='title title--one-level lead__title'>
        <?php $APPLICATION->ShowTitle(false); ?>
        Запускаем качественные <span>веб-проекты</span>
    </h1>
    <p class='text lead__description'>Мы 12 лет разрабатываем сайты, внедряем корпоративные продукты,
        интегрируем с 1С и настраиваем Битрикс 24</p>
    <a class='lead__link btn btn--lg anchor-link--feedback' href='#'>Обсудить задачу</a>
    <div class='lead__project'>
        <svg class='lead__project-logo' width='168' height='90' role='presentation' aria-hidden='true'>
            <use xlink:href='#logo--retail'></use>
        </svg>
        <div class='lead__project-title'>Новый проект</div>
        <a class='text lead__project-link' href='#'>
            Сервис бронирования тренировок для спортивного бренда Adidas
        </a>
    </div>
    <button class='lead__anchor' type='button'>
        <svg class='lead__project-link-icon lead__project-link-icon--anchor' width='24' height='24'
             role='presentation' aria-hidden='true'>
            <use xlink:href='#arrow'></use>
        </svg>
        к проектам
    </button>
</section>
