<?php
namespace Anax\View;

?>
<hr>
<?php if ($posts) : ?>
<h1> Senaste Nytt</h1>
<hr>
    <div class="grid-container" >
    <?php foreach ($posts as $row) : ?>
        <div class="card">
          <div class="container">
            <h4> <a  class="link underline" href="<?= url("content/viewContent/{$row->id}") ?>"><?= $row->title ?></a> </h4>
            <div class="">
                <?= $row->data ?>
            </div>

            <div class="articlefoot">
                Published: <?= $row->published ?><br>
                Updated: <?= $row->updated ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<hr>
<?php if ($featured) : ?>
<h1>Featured</h1>
<hr>
<div class="grid-container">
    <div class="card grid-center">
      <div class="container">
        <h4> <a  class="link underline" href="<?= url("content/viewContent/{$featured->id}") ?>"><?= $featured->title ?></a> </h4>
        <div class="">
            <?= $featured->data ?>
        </div>

        <div class="articlefoot">
            Published: <?= $featured->published ?><br>
            Updated: <?= $featured->updated ?>
        </div>
      </div>
    </div>
</div>
<?php endif; ?>
<hr>
<?php if ($produkts) : ?>
<h1>Senaste inkomna produkter</h1>
<hr>
<div class="grid-container " >
<?php foreach ($produkts as $row) : ?>
    <div class="card">
        <div class="container">
            <h3 class="text-center"> <a class="link underline" href="<?= url("products/viewProduct/$row->id")?>"><?= $row->title ?></a> </h3>
            <a href="<?= url("products/viewProduct/$row->id")?>"> <img src="<?= url("img/$row->image") ?>" alt="<?=$row->image ?>"></a>
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
<?php endif; ?>
<hr>
<?php if ($sale) : ?>
<h1> Veckans erbjudande</h1>
<hr>
<div class="grid-container">
    <div class="card grid-1-2 grid-center">
        <div class="container">
            <h3 class="text-center"> <a class="link underline" href="<?= url("products/viewProduct/$sale->id")?>"><?= $sale->title ?></a> </h3>
            <a href="<?= url("products/viewProduct/$sale->id")?>"> <img src="<?= url("image/$sale->image") ?>?w=500&h=200&crop-to-fit" alt="<?=$sale->image ?>"></a>
            <a href="<?= url("")?>" class="button">Köp</a>
            <?= $sale->description ?>
            <div class="articlefoot">
                Published: <?= $sale->published ?><br>
                Updated: <?= $sale->updated ?>
            </div>
        </div>
     </div>
 </div>
<?php endif; ?>
<hr>
<?php if ($recomended) : ?>
<h1> Rekommenderad produkt</h1>
<hr>
<div class="grid-container" >
<?php foreach ($recomended as $row) : ?>
    <div class="card grid-center">
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
<?php endif; ?>
