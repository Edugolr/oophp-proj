<?php

namespace Chai17\Dice;

include(__DIR__ . "/../../vendor/autoload.php");

$action = $action ?? null;
$method = $method ?? null;
$disabled = "disabled";
$diceColor = "red";
if ($game->getTurnSums()) {
    $disabled = "";
    $diceColor = "green";
}

?>
<h1><?= $game->getActiveName() ?>'s turn</h1>


<?php if ($game->getActiveName() == $game->getPlayerName()) : ?>
    <div>
        <form class="" action=<?=$action ?> method=<?=$method ?>>
            <input class="btn" type="submit" name="roll" value="roll">
            <input class="btn orange" type="submit" <?=$disabled ?> name="save" value="save">
            <input class="btn red" type="submit" name="reset" value="reset">
        </form>
    </div>
<?php else : ?>
    <?php if ($game->getTurnSums()) : ?>
        <form class="" action=<?=$action ?> method=<?=$method ?>>
            <input class="btn" type="submit" name=<?= $game->computerTurn() ?> value=<?= $game->computerTurn() ?>>
            <input class="btn orange" type="submit" disabled name="" value="">
            <input class="btn red" type="submit" name="reset" value="reset">
        </form>
    <?php else : ?>
        <form class="" action=<?=$action ?> method=<?=$method ?>>
            <input class="btn" type="submit" name="roll" value="roll">
            <input class="btn orange" type="submit"disabled name="" value="">
            <input class="btn red" type="submit" name="reset" value="reset">
        </form>
        <p class="green"><?=$game->getComputerName() ?> wants to <?= $game->computerTurn() ?></p>
    <?php endif; ?>

<?php endif; ?>
<?php if ($game->checkOne()) : ?>
    <h4 class="red">You rolled 1, changed player </h4>
<?php endif; ?>
<h4>Turn total points: <?=$game->getTurnTotal() ?></h4>
<h4>Turn rounds:
<?php foreach ($game->getTurnSums() as $value) : ?>
    <?php echo $value ?>,
<?php endforeach; ?>
</h4>



<div class="histogram floatright">
    <h4>Histogram</h4>
    <pre><?= $game->printHistogram(1, 6) ?></pre>
</div>

<div class="diceroll">
    <p class="dice-utf8 <?=$diceColor ?>">
    <?php foreach ($game->values() as $value) : ?>
        <i class="dice-<?= $value ?>"></i>
    <?php endforeach; ?>
    </p>
</div>




<div class="score">
    <p><?=$game->getPlayerName() ?>'s score: <?=$game->getPlayerTotal() ?></p>
    <p><?=$game->getComputerName() ?>'s score: <?=$game->getComputerTotal() ?></p>
</div>
