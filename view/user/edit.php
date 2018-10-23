<?php namespace Anax\View; ?>
<?php if ($app->session->get("validUser")): ?>
    <form class="" action="edit" method="post">
        First name: <input type="text" name="firstname" value="<?= $res->firstname ?>">
        Last Name:  <input type="text" name="lastname" value="<?= $res->lastname ?>"><br>
        Gender: <br>
            <select class="" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select> <br><br>
        Phone: <input type="tel" name="phoneNumber" value="<?= $res->phoneNumber ?>">
        <input type="submit" name="" value="Update">
    </form>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
