<?php

namespace Chai17\Products;

/**
 *
 */

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class ProductsController implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function filterText($data, $filters)
    {
         $filter = new \Anax\TextFilter\TextFilter();

        if (is_array($filter)) {
            return $filter->doFilter($data, explode(",", $filters));
        } else {
            $filters=[$filters, "shortcode"];
            return $filter->doFilter($data, $filters);
        }
    }
    public function produkterActionGet()
    {

        $this->app->db->connect();
        $sql = "SELECT id, title, SUBSTRING_INDEX(description, ' ', 20) AS description, image, published, updated, filter FROM products WHERE deleted IS NULL ORDER BY published;";
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
