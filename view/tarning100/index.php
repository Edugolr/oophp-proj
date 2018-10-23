<?php

namespace Chai17\Dice;

include(__DIR__ . "/../../vendor/autoload.php");
$action = $action ?? null;
$method = $method ?? null;
?>
<hr>
<?php if ($app->session->get("validUser")) : ?>
<div class="welcome container">
    <h1>Välkommen till tärningsspelet Etthundra <?= $app->session->get("name") ?></h1>
    <h3>Vinn över Marvin, den geniala Ai:n för att få din bonuskod</h3>
    <p>TMålet med spelet är att först nå 100 poäng.
    Du rullar två tärningar och så länge du inte får en etta kan du fortsätta att rulla
    och addera värdet på alla slag.
    Om du slår en etta blir du genast av med allt du samlat under din tur. </p> <br><br>
    <p>Lycka till!</p>
</div>

<form action="<?=$action ?>"method="<?=$method ?>">
    <input type="hidden" readonly name="name" value="<?= $app->session->get("name") ?? "Player"?>">
    <input type="hidden" readonly min=1 name="dices" value="2">
    <input type="hidden" readonly min=2 max=6 name="sides" value="6">
    <input type="hidden" readonly  name="winpoint" value="100">
    <input class="btn" type="submit" name="" value="start">
</form>
<?php else : ?>
    <h1>Du måste vara inloggad för att nå denna sida.</h1>
<?php endif; ?>
