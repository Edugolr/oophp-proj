<?php

namespace Chai17\Admin;

/**
 *
 */

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class AdminController implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function adminActionGet()
    {
        $title = "Admin" ;
        $this->app->page->add("admin/admin");

        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function loginActionPost()
    {
        $title = "login";
        $this->app->db->connect();

        $this->app->session->set("adminpsw", $this->app->request->getPost('psw'));
        $this->app->session->set("adminuname", $this->app->request->getPost('uname'));


        $params = [$this->app->session->get("adminpsw"), $this->app->session->get("adminuname")];
        $sql = "SELECT * FROM users WHERE password=? AND username=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        if ($res->username != "admin") {
            $this->app->session->getOnce("message", "failed to login");
            $this->app->session->set("valid", False);
            $this->app->response->redirect('admin/admin');
        }else {
            $this->app->session->set("valid", True);
        }

        $sql = "SELECT * FROM products;";
        $products = $this->app->db->executeFetchAll($sql);
        $sql = "SELECT * FROM users;";
        $users = $this->app->db->executeFetchAll($sql);
        $sql = "SELECT * FROM content;";
        $content = $this->app->db->executeFetchAll($sql);
        $this->app->page->add('admin/overview', [
            "products" => $products,
            "content" => $content,
            "users" => $users,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function logoutActionPost()
    {

        $this->app->session->delete("adminpsw");
        $this->app->session->delete("valid");
        $this->app->session->delete("adminuname");

        return $this->app->response->redirect("admin/admin");
    }
    public function overviewActionGet()
    {
        $title = "overview";
        $this->app->db->connect();

        $sql = "SELECT * FROM products;";
        $products = $this->app->db->executeFetchAll($sql);
        $sql = "SELECT * FROM users;";
        $users = $this->app->db->executeFetchAll($sql);
        $sql = "SELECT * FROM content;";
        $content = $this->app->db->executeFetchAll($sql);
        $this->app->page->add('admin/overview', [
            "products" => $products,
            "content" => $content,
            "users" => $users,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function updateProductActionGet($id)
    {
        $title = "Update";
        $this->app->db->connect();

        $sql = "SELECT * FROM products WHERE id=?";
        $res = $this->app->db->executeFetch($sql, [$id]);
        if (!$res) {
            $this->app->response->redirect('admin');
        }
        $this->app->page->add('admin/update', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function updateProductActionPost($id)
    {
        $title = $this->app->request->getPost('title');
        $genre = $this->app->request->getPost('genre');
        $price = $this->app->request->getPost('price');
        $playersMin = $this->app->request->getPost('playersMin');
        $playersMax = $this->app->request->getPost('playersMax');
        $age = $this->app->request->getPost('age');
        $image = $this->app->request->getPost('image');
        $description = $this->app->request->getPost('description');
        $recomended = $this->app->request->getPost('recomended');
        $sale = $this->app->request->getPost('sale');
        $params = [$title, $genre, $price, $playersMin, $playersMax, $age, $image, $description, $recomended, $sale, $id];
        $this->app->db->connect();
        $sql =  "UPDATE products SET title=?, genre=?, price=?, players_min=?, players_max=?, age=?, image=?, description=?, recomended=?, sale=? WHERE id=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        if (!$res) {
            $this->app->response->redirect('admin');
        }

        return  $this->app->response->redirect("admin/updateProduct/{$id}");
    }
    public function deleteProductActionGet($id)
    {
        $title = "Delete";
        $this->app->db->connect();

        $sql = "SELECT * FROM products WHERE id=?";
        $res = $this->app->db->executeFetch($sql, [$id]);
        if (!$res) {
            $this->app->response->redirect('admin');
        }
        $this->app->page->add('admin/delete', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function deleteProductActionPost($id)
    {
        $this->app->db->connect();
        $params = [$id];
        $sql = "UPDATE products SET deleted = current_timestamp  WHERE id=?";
        $this->app->db->execute($sql, $params);
        $res = $this->app->db->executeFetch($sql, $params);
        if (!$res) {
            $this->app->response->redirect('admin');
        }

        return  $this->app->response->redirect("admin/overview");
    }
    public function createProductActionGet()
    {
        $title = "Create";

        $this->app->page->add('admin/createProduct');
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function createProductActionPost()
    {
        $title = $this->app->request->getPost('title');
        $genre = $this->app->request->getPost('genre');
        $price = $this->app->request->getPost('price');
        $playersMin = $this->app->request->getPost('playersMin');
        $playersMax = $this->app->request->getPost('playersMax');
        $age = $this->app->request->getPost('age');
        $image = $this->app->request->getPost('image');
        $description = $this->app->request->getPost('description');
        $params = [$title, $genre, $price, $playersMin, $playersMax, $age, $image, $description];
        $this->app->db->connect();
        $sql = "INSERT INTO products (title, genre, price, players_min, players_max, age, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $this->app->db->execute($sql, $params);

        return  $this->app->response->redirect("admin/overview");
    }

    public function updateContentActionGet($id)
    {
        $title = "Update";
        $this->app->db->connect();

        $sql = "SELECT * FROM content WHERE id=?";
        $res = $this->app->db->executeFetch($sql, [$id]);

        $this->app->page->add('admin/update', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function updateContentActionPost($id)
    {
        $path = $this->app->request->getPost('path');
        $slug = $this->app->request->getPost('slug');
        $type = $this->app->request->getPost('type');
        $title = $this->app->request->getPost('title');
        $data = $this->app->request->getPost('data');
        $filter = $this->app->request->getPost('filter');
        $featured = $this->app->request->getPost('featured');


        $params = [$path, $slug, $type, $title, $data, $filter, $featured, $id];
        $this->app->db->connect();
        $sql =  "UPDATE content SET path=?, slug=?, type=?, title=?, data=?, filter=?, featured=? WHERE id=?;";
        $this->app->db->executeFetch($sql, $params);

        return  $this->app->response->redirect("admin/overview");
    }

    public function deleteContentActionGet($id)
    {
        $title = "Delete";
        $this->app->db->connect();

        $sql = "SELECT * FROM content WHERE id=?";
        $res = $this->app->db->executeFetch($sql, [$id]);
        if (!$res) {
            $this->app->response->redirect('admin');
        }
        $this->app->page->add('admin/delete', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function deleteContentActionPost($id)
    {
        $this->app->db->connect();
        $params = [$id];
        $sql = "UPDATE content SET deleted = current_timestamp  WHERE id=?";
        $this->app->db->execute($sql, $params);
        $res = $this->app->db->executeFetch($sql, $params);
        if (!$res) {
            $this->app->response->redirect('admin');
        }

        return  $this->app->response->redirect("admin/overview");
    }
    public function createContentActionGet()
    {
        $title = "Create";

        $this->app->page->add('admin/createContent');
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function createContentActionPost()
    {
        $path = $this->app->request->getPost('path');
        $slug = $this->app->request->getPost('slug');
        $type = $this->app->request->getPost('type');
        $title = $this->app->request->getPost('title');
        $data = $this->app->request->getPost('data');
        $filter = $this->app->request->getPost('filter');
        $params = [$path, $slug, $type, $title, $data, $filter];

        $this->app->db->connect();
        $sql = "INSERT INTO content (path, slug, type, title, data, filter) VALUES (?, ?, ?, ?, ?, ?);";

        $this->app->db->execute($sql, $params);

        return  $this->app->response->redirect("admin/overview");
    }
}
