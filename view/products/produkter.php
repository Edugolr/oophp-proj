<?php namespace Anax\View; ?>
<hr>
<h1>Produkter</h1>
<hr>
<div class="grid-container" >
<?php foreach ($res as $row) : ?>
    <div class="card">
        <div class="container">
          <h3 class="text-center"> <a class="link underline" href="<?= url("products/viewProduct/$row->id")?>"><?= $row->title ?></a> </h3>
          <a href="<?= url("products/viewProduct/$row->id")?>"> <img src="<?= url("image/$row->image") ?>?w=500&h=200&crop-to-fit" alt="<?=$row->image ?>"></a>
          <a href="<?= url("")?>" class="button">Köp</a>
          <?= $row->description ?>
          <div class="articlefoot">
              Published: <?= $row->published ?><br>
              Updated: <?= $row->updated ?>
          </div>
        </div>
      </div>
<?php endforeach; ?>
</div>
