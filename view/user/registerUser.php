<?php namespace Anax\View; ?>
<h1>Register</h1>
<form  action="registerUser" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="email" placeholder="Enter email" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <input class="btn" type="submit" name="" value="Register">
      </div>
</form>
