<?php
namespace Anax\View;

?>
<hr>
<?php if ($app->session->get("valid")) : ?>
<div class="nav2">
    <a href="<?= url("admin/overview")?>">Översikt</a>
</div>
<form action="" method="post">
    Titel: <input type="text" name="title"  value="title">
    Sökväg: <input type="text" name="path"  value="">
    Slug: <input type="text" name="slug"  value="">
    <textarea name="data" rows="8" cols="80">Data</textarea>
    <input class="btn" type="submit" name="add" value="Create">
</form>
<?php else : ?>
    <h1>Du måste vara inloggad som admin för åtkomst till denna sida</h1>
<?php endif; ?>
