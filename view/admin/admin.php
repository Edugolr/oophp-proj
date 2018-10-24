<?php
namespace Anax\View;

?>
<hr>
<h1>Admin</h1>

<?php if ($app->session->get("valid")) : ?>
    <div class="nav2">
        <a href="<?= "overview" ?>">Översikt</a>
    </div>
    <h3>Du är redan inloggad</h1>
    <form class="" action="logout" method="post">
        <input class="btn red" type="submit" name="" value="Logga ut">
    </form>
<?php else : ?>
    <form action="login" method="post" >

      <div class="container">
        <input type="text" placeholder="Användarnamn" name="uname" required>
        <input type="password" placeholder="Lösenord" name="psw" required>
        <input class="btn" type="submit" name="" value="Logga in">
      </div>

    </form>
<?php endif; ?>
