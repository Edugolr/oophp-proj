<?php
namespace Anax\View;

?>
<hr>
<?php if ($app->session->get("validUser")) : ?>
    <?php if ($res->bonus) : ?>
        <h1>Grattis du har vunnit ett paket gummibjörnar</h1>
        <p style="text-align:center">Klicka på knappen för att lösa ut din bonus och få den hemskickad</p>
        <div class="container">
            <img class="center" src="<?= url("image/gummybears.jpg") ?>?h=300&crop-to-fit" alt="">
        </div>
        <form class="" action="claimbonus" method="post">
            <input type="hidden" name="bonus" value="0">
            <input class="btn green" type="submit" name="" value="Skicka mina gummibjörnar">
        </form>
    <?php else : ?>
        <h1>Du har ingen bonus, prova vårat tärningsspel!</h1>
    <?php endif; ?>
<?php else : ?>
    <h1>Du måste vara inloggad för att nå denna sida.</h1>
<?php endif; ?>
