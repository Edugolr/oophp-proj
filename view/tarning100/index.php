<?php

namespace Chai17\Dice;


include(__DIR__ . "/../../vendor/autoload.php");
$action = $action ?? null;
$method = $method ?? null;
?>
<hr>
<?php if ($app->session->get("validUser")) : ?>
<div class="welcome container">
    <h1>Welcome to dicepig <?= $app->session->get("name") ?></h1>
    <h3>Beat the computer Marvin and get your bonuscode</h3>
    <p>The goal is to reach a 100 points.
    You roll X dices then you can choose to roll again or save the score and end your turn.
    If you roll a 1 you loose your turn and the points you have accumulated. </p> <br><br>
</div>

<form action="<?=$action ?>"method="<?=$method ?>">
    <input type="hidden" readonly name="name" value="<?= $app->session->get("name")?>">
    <input type="hidden" readonly min=1 name="dices" value="2">
    <input type="hidden" readonly min=2 max=6 name="sides" value="6">
    <input type="hidden" readonly  name="winpoint" value="100">
    <input class="btn" type="submit" name="" value="start">
</form>
<?php else : ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
