<?php
namespace Anax\View;

?>
<hr>
<?php $readonlys = ["id", "path", "created", "updated", "deleted", "published"] ?>
<?php if ($app->session->get("valid")) : ?>
    <div class="nav2">
        <a href="<?= url("admin/overview") ?>">Översikt</a>
    </div>
    <form action="" method="POST">
        <?php foreach ($res as $key => $value) : ?>
            <p>
                <?php $readonly="" ?>
                <?php if (in_array($key, $readonlys)) : ?>
                    <?php $readonly="readonly" ?>
                <?php endif; ?>
                <?php if ($key == "featured") : ?>
                    <?= $key ?>
                    <select class="" name="<?=$key ?>">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                <?php else : ?>

                <?php if ($key == "data" || $key == "description") : ?>
                        <?=$key ?>
                    <p><textarea name="<?=$key ?>" rows="8" cols="80"><?=$value ?></textarea> </p>

                <?php else : ?>
                    <p><?=$key ?><input type="text" name="<?=$key ?>" <?=$readonly ?> value="<?=$value ?>"></p>
                <?php endif; ?>
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
        <p>
            <input class="btn" type="submit"  value="Save">
        </p>
    </form>
<?php else : ?>
    <h1>Du måste vara inloggad som admin för åtkomst till denna sida</h1>
<?php endif; ?>
