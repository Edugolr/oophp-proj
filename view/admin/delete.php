<?php
namespace Anax\View;

?>
<hr>
<?php if ($app->session->get("valid")) : ?>
    <div class="nav2">
        <a href="<?= url("admin/overview")?>"><i class="fas fa-arrow-left fa-3x"></i></a>Tillbaka
        <h1>Radera</h1>
    </div>
    <hr>
    <form action="" method="POST">
        <?php foreach ($res as $key => $value) : ?>
            <p>
                <?=$key ?><input type="text" name="<?=$key ?>" readonly value="<?=$value ?>">
            </p>
        <?php endforeach; ?>
        <p>
            <input class="btn red" type="submit"  value="Radera">
        </p>
    </form>
<?php else : ?>
    <h1>Du måste vara inloggad som admin för åtkomst till denna sida</h1>
<?php endif; ?>
