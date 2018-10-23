<?php namespace Anax\View; ?>
<?php if ($app->session->get("valid")): ?>
    <form action="" method="post">
        Title: <input type="text" name="title"  value="title">
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
        Price: <input type="number" min="0"  name="price"  value="">
        Players min: <input type="number" min="1" max="50" name="players_min"  value="">
        Players max: <input type="number" min="1" max="50" name="players_max"  value="">
        Age: <input type="number"min="0" max="110" name="age"  value="">
        Image: <input type="text" name="image"  value="">
        <textarea name="description" rows="8" cols="80">Description</textarea>

        <input class="btn" type="submit" name="add" value="Create">
    </form>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
