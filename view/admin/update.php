<?php
namespace Anax\View;

?>
<hr>
<?php $readonlys = ["id", "created", "updated", "deleted", "published"] ?>
<?php if ($app->session->get("valid")) : ?>
    <div class="nav2">
        <a href="<?= "overview" ?>">Overview</a>
    </div>
    <form action="" method="POST">
        <?php foreach ($res as $key => $value) : ?>
            <p>
                <?php $readonly="" ?>
                <?php if (in_array($key, $readonlys)) : ?>
                    <?php $readonly="readonly" ?>
                <?php endif; ?>
                <?php if ($key == "data" || $key == "description") : ?>
                        <?=$key ?>
                    <p><textarea name="<?=$key ?>" rows="8" cols="80"><?=$value ?></textarea> </p>

                <?php else : ?>
                    <p><?=$key ?><input type="text" name="<?=$key ?>" <?=$readonly ?> value="<?=$value ?>"></p>
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
        <p>
            <input class="btn" type="submit"  value="Save">
        </p>
    </form>
<?php else : ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
