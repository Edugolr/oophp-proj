<?php namespace Anax\View; ?>

<?php if ($app->session->get("valid")): ?>
    <div class="nav2">
        <a href="<?= "overview"?>">Overview</a>
    </div>
    <form action="" method="POST">
        <?php foreach ($res as $key => $value): ?>
            <p>
                <?=$key ?><input type="text" name="<?=$key ?>" readonly value="<?=$value ?>">
            </p>
        <?php endforeach; ?>

        <p>
            <input class="btn res" type="submit"  value="Delete">
        </p>
    </form>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
