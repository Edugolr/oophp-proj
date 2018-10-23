<?php
namespace Anax\View;

?>
<hr>
<h1>User</h1>
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
      <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Användarnamn</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Lösenord</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>


        <input class="btn" type="submit" name="" value="Logga in">
      </div>
    </form>
    <form action="registerUser" method="get" >
        <input class="btn" type="submit" name="" value="Registrera">
    </form>
<?php endif; ?>
