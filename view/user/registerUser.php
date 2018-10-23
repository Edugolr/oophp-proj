<?php
namespace Anax\View;

?>
<hr>
<h1>Registrera ny användare</h1>
<form  action="registerUser" method="post">
      <div class="container">
        <label for="uname"><b>Användarnamn</b></label>
        <input type="email" placeholder="Enter email" name="uname" required>

        <label for="psw"><b>Lösenord</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <input class="btn" type="submit" name="" value="Registrera">
      </div>
</form>
