<?php

namespace Chai17\Content;

/**
 *kontroller klass för content
 */

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class ContentController implements AppInjectableInterface
{
    use AppInjectableTrait;

    // filter text funktion (använder ramverkets)
    public function filterText($data, $filters)
    {
        $filtrera=["markdown", "shortcode"];
        $filter = new \Anax\TextFilter\TextFilter();
        return $filter->doFilter($data, $filtrera);

    }

    // rendera startsidan inuti content
    public function indexActionGet()
    {
        $this->app->db->connect();
        // substring på data för att hålla nere textlöngden
        $sql = "SELECT id, SUBSTRING_INDEX(data, ' ', 20) AS data, title, published, updated, filter FROM content WHERE type='post' AND deleted IS NULL ORDER BY published DESC LIMIT 3;";
        $posts = $this->app->db->executeFetchAll($sql);
        // filtrera texten genom markdown och shortcode
        foreach ($posts as $row) {
            $row->data = $this->filterText($row->data, $row->filter);
        }

        $sql = "SELECT id, title, SUBSTRING_INDEX(description, ' ', 20) AS description, image, published, updated, filter FROM products ORDER BY published DESC  LIMIT 3;";
        $produkts =  $this->app->db->executeFetchAll($sql);
        foreach ($produkts as $row) {
            $row->description = $this->filterText($row->description, $row->filter);
        }

        $sql = "SELECT id, SUBSTRING_INDEX(data, ' ', 20) AS data, title, published, updated, filter FROM content WHERE featured= TRUE LIMIT 1;";
        $featured =  $this->app->db->executeFetch($sql);
        if ($featured) {
            $featured->data = $this->filterText($featured->data, $featured->filter);
        }

        $sql = "SELECT id, title, SUBSTRING_INDEX(description, ' ', 20) AS description, image, published, updated, filter FROM products WHERE sale= TRUE LIMIT 1;";
        $sale =  $this->app->db->executeFetch($sql);
        if ($sale) {
            $sale->description = $this->filterText($sale->description, $sale->filter);
        }

        $sql = "SELECT id, title, SUBSTRING_INDEX(description, ' ', 20) AS description, image, published, updated, filter FROM products WHERE recomended = TRUE  ORDER BY published DESC LIMIT 3;";
        $recomended =  $this->app->db->executeFetchAll($sql);
        foreach ($recomended as $row) {
            $row->description = $this->filterText($row->description, $row->filter);
        }
        $title = "Hem" ;
        $this->app->page->add("content/index", [
            "posts" => $posts,
            "featured" => $featured,
            "produkts" => $produkts,
            "recomended" => $recomended,
            "sale" => $sale,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    // rendera nyhets sidan
    public function bloggActionGet()
    {

        $this->app->db->connect();
        $sql = "SELECT id, SUBSTRING_INDEX(data, ' ', 20) AS data, title, published, updated, filter FROM content WHERE type='post' ORDER BY published DESC;";
        $res = $this->app->db->executeFetchAll($sql);

        foreach ($res as $row) {
            $row->data = $this->filterText($row->data, $row->filter);
        }

        $title = "Nyheter";
        $this->app->page->add("content/blogg", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    // rendera om sidan
    public function omActionGet()
    {

        $this->app->db->connect();
        $sql = "SELECT * FROM content WHERE title='Om';";
        $res = $this->app->db->executeFetch($sql);
        $res->data = $this->filterText($res->data, $res->filter);
        $title = $res->title ;
        $this->app->page->add("$res->path", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    // rendera visa content sidan
    public function viewContentActionGet($id)
    {
        $title = "View";
        $this->app->db->connect();

        $sql = "SELECT * FROM content WHERE id=?";
        $res = $this->app->db->executeFetch($sql, [$id]);
        $res->data = $this->filterText($res->data, $res->filter);
        $this->app->page->add('content/viewContent', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
}
