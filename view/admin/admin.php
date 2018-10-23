<?php namespace Anax\View; ?>
<h1>Admin</h1>


<?php if ($app->session->get("valid")): ?>
    <div class="nav2">
        <a href="<?= "overview" ?>">Overview</a>
    </div>
    <h3>You are logged in</h1>
    <form class="" action="logout" method="post">
        <input class="btn red" type="submit" name="" value="Logout">
    </form>
<?php else: ?>
    <form action="login" method="post" >
      <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>


        <input class="btn" type="submit" name="" value="Login">
      </div>

    </form>
<?php endif; ?>
