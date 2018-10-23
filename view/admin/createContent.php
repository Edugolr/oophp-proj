<?php namespace Anax\View; ?>
<form action="" method="post">
    Title: <input type="text" name="title"  value="title">
    Path: <input type="text" name="path"  value="">
    Slug: <input type="text" name="slug"  value="">
    <textarea name="data" rows="8" cols="80">Data</textarea>
     <select class="round" name="type">
        <option value="page">Page</option>
        <option value="post">Post</option>
    </select>

    <input class="btn" type="submit" name="add" value="Create">
</form>
