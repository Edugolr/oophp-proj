<?php
namespace Anax\View;

?>
<hr>

<?php if ($app->session->get("valid")) : ?>
    <div class="nav2">
        <a href="<?= url("admin/overview") ?>"><i class="fas fa-arrow-left fa-3x"></i></a>Tillbaka
        <h1>Skapa produkt</h1>
    </div>
    <hr>
    <form action="" method="post">
        Titel: <input type="text" name="title"  value="title">
        Genre:
        <br><select class="round" name="genre">
           <option value="sällskapsspel">Sällskapsspel</option>
           <option value="Barnspel">Barnspel</option>
           <option value="Familjespel">Familjespel</option>
           <option value="Kortspel">Kortspel</option>
           <option value="Krigsspel">Krigsspel</option>
           <option value="Rollspel">Rollspel</option>
           <option value="Strategispel">Strategispel</option>
           <option value="Vuxen/partyspel">Vuxen/partyspel</option>
       </select> <br>
        Pris: <input type="number" min="0"  name="price"  value="">
        Spelare minn: <input type="number" min="1" max="50" name="players_min"  value="">
        Spelare max: <input type="number" min="1" max="50" name="players_max"  value="">
        Ålder: <input type="number"min="0" max="110" name="age"  value="">
        Bild: <input type="text" name="image"  value="">
        <textarea name="description" rows="8" cols="80">Description</textarea>

        <input class="btn" type="submit" name="add" value="Create">
    </form>
<?php else : ?>
    <h1>Du måste vara inloggad som admin för åtkomst till denna sida</h1>
<?php endif; ?>
