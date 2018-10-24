<?php

namespace Chai17\Products;

/**
 * kontroller klass för products
 */

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class ProductsController implements AppInjectableInterface
{
    use AppInjectableTrait;

    // filter text funktion (använder ramverkets)
    public function filterText($data, $filters)
    {
        $filtrera=["markdown", "shortcode"];
        $filter = new \Anax\TextFilter\TextFilter();
        return $filter->doFilter($data, $filtrera);

    }

    // rendera översikt över produkter
    public function produkterActionGet()
    {

        $this->app->db->connect();
        $sql = "SELECT id, title, SUBSTRING_INDEX(description, ' ', 20) AS description, image, published, updated, filter FROM products WHERE deleted IS NULL ORDER BY title;";
        $res = $this->app->db->executeFetchAll($sql);
        foreach ($res as $row) {
            $row->description = $this->filterText($row->description, $row->filter);
        }
        $title = "Produkter" ;
        $this->app->page->add("products/produkter", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    // rendera produkt sida
    public function viewProductActionGet($id)
    {
        $title = "View";
        $this->app->db->connect();

        $sql = "SELECT * FROM products WHERE id=?";
        $res = $this->app->db->executeFetch($sql, [$id]);
        $res->description = $this->filterText($res->description, $res->filter);
        $this->app->page->add('products/viewProduct', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
}
