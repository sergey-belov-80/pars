<?php

header('Content-type: text/html; charset=utf8');

require '../app/Pars.php';

$url = 'http://eurotrans.by/wp-admin/admin-ajax.php?action=get_calendar_events&noheader=true&start_date=1472688001&end_date=1475279999&show_expired=false&event_category_id=minsk_peterburg';
$ob = new \app\Pars();
$data = $ob->parsUrl($url);

?>
<link href="../css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="../index.php">Главная</a>
        </div>
        <div class="col-md-6" style="text-align: center">
            <h2>Сентябрь. Минск - Санкт-Петербург</h2>
        </div>
        <div class="col-md-3">
            <a href="/page/spm.php">Санкт-Петербург - Минск</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Дни</th>
                <th>Рейс</th>
                <th style="text-align: center">Свободные места</th>
                <th style="text-align: center">Колличество билетов</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($data as $item): ?>
                <tr>
                    <?php if(date('m', $item->start) == '09'):?>
                        <td><?= date('d/m', $item->start); ?></td>
                        <td><?= $item->title; ?></td>
                        <?php $seats = $ob::plainText($item->tooltip);?>
                        <td class="seats" style="text-align: center<?php if($seats[1]<5){echo'; color:red';};?>"><?= $seats[1]; ?></td>
                        <td style="text-align: center"><?= $seats[2]; ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>