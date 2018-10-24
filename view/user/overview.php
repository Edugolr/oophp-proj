<?php
namespace Anax\View;

?>
<hr>
<?php if ($app->session->get("validUser")) : ?>

    <h1>Välkommen <?= $res->firstname ?></h1>
    <div class="container">
        <img class="center" src="https://www.gravatar.com/avatar/<?=md5(strtolower(trim("$res->username")));?>"/>
    </div>
    <hr>
    <div class="grid-container">
        <?php if ($res->bonus) : ?>
            <form class="container" action="bonus" method="get">
                <input class="btn"  type="submit" name="" value="Visa min bonus">
            </form>
        <?php endif; ?>
        <form class="container" action="edit" method="get">
            <input class="btn"  type="submit" name="" value="Redigera">
        </form>
        <form class="container" action="logout" method="post">
            <input class="btn" type="submit" name="" value="Logga ut">
        </form>
    </div>
    <p><b>Förnamn:</b> <?= $res->firstname ?></p>
    <p><b>Efternamn:</b> <?= $res->lastname ?></p>
    <p><b>Telefon:</b> <?= $res->phoneNumber ?></p>
    <p><b>Email/användarnamn:</b> <?= $res->username ?></p>
</b>
<?php else : ?>
    <h1>Du måste vara inloggad för att nå denna sida.</h1>
<?php endif; ?>
