<?php

// $app->router->addController("content", "Chai17\Content\ContentController");

// function filterText($data, $filters)
// {
//      $filter = new \Anax\TextFilter\TextFilter();
//
//     if (is_array($filter)) {
//         return $filter->doFilter($data, explode(",", $filters));
//     } else {
//         $filters=[$filters, "shortcode"];
//         return $filter->doFilter($data, $filters);
//     }
// }

$app->router->get("", function () use ($app) {
    $route = new Chai17\Content\ContentController();
    $route->setApp($app);
    return $route->indexActionGet();
});
$app->router->get("content", function () use ($app) {
    $route = new Chai17\Content\ContentController();
    $route->setApp($app);
    return $route->indexActionGet();
});
$app->router->get("content/blogg", function () use ($app) {
    $route = new Chai17\Content\ContentController();
    $route->setApp($app);
    return $route->bloggActionGet();
});
$app->router->get("content/om", function () use ($app) {
    $route = new Chai17\Content\ContentController();
    $route->setApp($app);
    return $route->omActionGet();
});
$app->router->get("content/viewContent/{id}", function ($id) use ($app) {
    $route = new Chai17\Content\ContentController();
    $route->setApp($app);
    return $route->viewContentActionGet($id);
});


// $app->db->connect();
// $sql = "SELECT * FROM content WHERE type='post' ORDER BY published LIMIT 3;";
// $posts = $app->db->executeFetchAll($sql);
// foreach ($posts as $row) {
//     $row->data = filterText($row->data, $row->filter);
// }
// $sql = "SELECT * FROM products ORDER BY published LIMIT 3;";
// $produkts =  $app->db->executeFetchAll($sql);
// $sql = "SELECT * FROM content WHERE featured= TRUE;";
// $featured =  $app->db->executeFetch($sql);
// $featured->data = filterText($featured->data, $featured->filter);
// $title = "Nyheter" ;
// $app->page->add("content/index", [
//     "posts" => $posts,
//     "featured" => $featured,
//     "produkts" => $produkts,
// ]);
//
// return $app->page->render([
//     "title" => $title,
// ]);
