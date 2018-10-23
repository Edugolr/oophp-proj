<?php namespace Anax\View; ?>
<hr>
<?php if ($app->session->get("valid")): ?>
<h1>Edit Content</h1>
<form class="" action="createContent" method="get">
    <input class="btn" type="submit" name="" value="Create Content">
</form>

<div style="overflow-x:auto;">
    <table>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Type</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Path</th>
            <th>Slug</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($content as $row) : ?>
          <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->title ?></td>
            <td><?= $row->type ?></td>
            <td><?= $row->published ?></td>
            <td><?= $row->created ?></td>
            <td><?= $row->updated ?></td>
            <td><?= $row->deleted ?></td>
            <td><?= $row->path ?></td>
            <td><?= $row->slug ?></td>
            <td><a href="<?= "updateContent/{$row->id}" ?>" ><i class="material-icons">edit</i></a></td>
            <td><a href="<?= "deleteContent/{$row->id}" ?>" ><i class="material-icons">delete</i></a></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>

<h1>Edit Products</h1>
<form class="" action="createProduct" method="get">
    <input class="btn" type="submit" name="" value="Create Product">
</form>
<div style="overflow-x:auto;">
    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Players</th>
            <th>Age</th>
            <th>Image</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($products as $row) : ?>
          <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->title ?></td>
            <td><?= $row->genre ?></td>
            <td><?= $row->price ?></td>
            <td><?= $row->players_min ?>-<?=$row->players_max ?></td>
            <td><?= $row->age ?></td>
            <td><?= $row->image ?></td>
            <td><?= $row->created ?></td>
            <td><?= $row->updated ?></td>
            <td><?= $row->deleted ?></td>
            <td><a href="<?= "updateProduct/{$row->id}" ?>" ><i class="material-icons">edit</i></a></td>
            <td><a href="<?= "deleteProduct/{$row->id}" ?>" ><i class="material-icons">delete</i></a></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>
<h1>Users</h1>

<div style="overflow-x:auto;">
    <table>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Created</th>
        </tr>
        <?php foreach ($users as $row) : ?>
          <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->username ?></td>
            <td><?= $row->created_at ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
