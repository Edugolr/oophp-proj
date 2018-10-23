<?php
namespace Anax\View;

?>
<hr>
<h1>Nyheter</h1>
<hr>
<div class="grid-container" >
<?php foreach ($res as $row) : ?>
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
