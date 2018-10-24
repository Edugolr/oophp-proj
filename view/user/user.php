<?php
namespace Anax\View;

?>
<hr>
<h1>Användare</h1>
<?php if ($app->session->get("validUser")) : ?>
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
        <label for="uname"><b>Användarnamn</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="psw"><b>Lösenord</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <input class="btn floatleft" type="submit" name="" value="Logga in">
      </div>
    </form>
    <form action="registerUser" method="get" >
        <input class="btn orange" type="submit" name="" value="Registrera">
    </form>
<?php endif; ?>
