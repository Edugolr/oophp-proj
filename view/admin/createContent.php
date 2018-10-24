<?php
namespace Anax\View;

?>
<hr>
<?php if ($app->session->get("valid")) : ?>
<div class="nav2">
    <a href="<?= url("admin/overview")?>"><i class="fas fa-arrow-left fa-3x"></i></a>Tillbaka
    <h1>Skapa Nyhet</h1>
</div>
<hr>
<form action="" method="post">
    <input type="hidden" name="type" value="post">
    Titel: <input type="text" name="title"  value="title">
    <textarea name="data" rows="8" cols="80">Data</textarea>
    <input class="btn" type="submit" name="add" value="Create">
</form>
<?php else : ?>
    <h1>Du måste vara inloggad som admin för åtkomst till denna sida</h1>
<?php endif; ?>
