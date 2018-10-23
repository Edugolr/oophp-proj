<?php
namespace Anax\View;

?>
<hr>
<?php if ($app->session->get("validUser")) : ?>
    <?php if ($res->bonus) : ?>
        <form class="" action="claimbonus" method="get">
            <input type="submit" name="" value="Show my bonus">
        </form>
    <?php endif; ?>
    <h1>Välkommen <?= $res->firstname ?>
        <hr>
        <img src="https://www.gravatar.com/avatar/<?=md5(strtolower(trim("$res->username")));?>"/>
    <p>Förnamn: <?= $res->firstname ?></p>
    <p>Efternamn: <?= $res->lastname ?></p>
    <p>Telefon: <?= $res->phoneNumber ?></p>
    <p>Email/användarnamn: <?= $res->username ?></p>
    <form class="" action="edit" method="get">
        <input type="submit" name="" value="Redigera">
    </form>
    <form class="" action="logout" method="post">
        <input type="submit" name="" value="Logga ut">
    </form>
<?php else : ?>
    <h1>Du måste vara inloggad för att nå denna sida.</h1>
<?php endif; ?>
