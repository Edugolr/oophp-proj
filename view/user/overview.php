<?php namespace Anax\View; ?>
<?php if ($app->session->get("validUser")): ?>
    <h1>Välkommen <?= $res->firstname ?>
        <hr>
        <img src="https://www.gravatar.com/avatar/<?=md5( strtolower( trim( "$res->username" ) ) ); ?>" />
    <p>Förnamn: <?= $res->firstname ?></p>
    <p>Efternamn: <?= $res->lastname ?></p>
    <p>Telefon: <?= $res->phoneNumber ?></p>
    <p>Email/användarnamn: <?= $res->username ?></p>
    <form class="" action="edit" method="get">
        <input type="submit" name="" value="Edit">
    </form>
    <form class="" action="logout" method="post">
        <input type="submit" name="" value="Logout">
    </form>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
