<?php namespace Anax\View; ?>
<h1><?=$res->title ?></h1>
<img src="<?=url("image/$res->image") ?>?w=1800&h=400&crop-to-fit" alt="<?=$res->image ?>">
<h4>Beskrivning</h4>
<?= $res->description ?>
<a href="" class="button">Köp</a>
