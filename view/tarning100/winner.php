<?php

namespace Chai17\Dice;

// include(__DIR__ . "/../../vendor/autoload.php");

$action = $action ?? null;
$method = $method ?? null;
?>

<h4>Congratulations <?=$game->getActiveName() ?> you won the Dice pig game</h4>
<?php if ($game->getActiveName() != $game->getComputerName()) : ?>
    <form class="" action="../user/bonus" method="post" >
        <input type="hidden" name="bonus" value="1">
        <input class="btn green" type="submit" name="reset" value="Hämta min Bonus">
    </form>
<?php else : ?>
    <form class="" action=<?=$action ?> method=<?=$method ?> >
        <input class="btn red" type="submit" name="reset" value="reset">
    </form>
<?php endif; ?>
