<?php


$app->router->get("tarning100", function () use ($app) {
    $data = [
        "title" => "Tärning 100",
        "action" => "tarning100/reset",
        "method" => "post"
    ];

    $app->view->add("tarning100/index", $data);
    return $app->page->render($data);
});

$app->router->post("tarning100/reset", function () use ($app) {
    $dices = $app->request->getPost('dices');
    $sides = $app->request->getPost('sides');
    $winningPoint = $app->request->getPost('winpoint');
    $playerName = $app->request->getPost('name');
    $game = new Chai17\Dice\DiceGame($dices, $sides);
    $game->setPlayerName($playerName);
    $game->setWinningPoint($winningPoint);
    $app->session->set("Game", $game);
    $app->response->redirect('tarning100/player');
});

$app->router->any('GET|POST', 'tarning100/player', function () use ($app) {
    $data = [
        'title' => 'Your turn',
        'action' => 'player',
        'method' => 'post',
    ];
    $game = $app->session->get('Game');
    if ($app->request->getPost('roll')) {
        $game->roll();
        $game->setHistogramSerie($game->values());
        if ($game->checkOne()) {
            $game->changePlayer();
            $game->resetTurnsSums();
        } else {
            $game->turnSums();
        }
    } elseif ($app->request->getPost('save')) {
        $game->save();
        if ($game->checkWinner()) {
            return $app->response->redirect("tarning100/winner");
        } else {
            $game->changePlayer();
            $game->resetTurnsSums();
        }
    } elseif ($app->request->getPost('reset')) {
        return $app->response->redirect("tarning100");
    }
    $data['game'] = $game;
    $app->view->add("tarning100/player", $data);
    return $app->page->render($data);
//
});

$app->router->any('GET|POST', "tarning100/winner", function () use ($app) {
    $data = [
        "title" => "Tärning 100",
        "action" => "winner",
        "method" => "post"
    ];
    if ($app->request->getPost('reset')) {
        return $app->response->redirect("tarning100");
    }
    $data['game'] = $app->session->get('Game');
    $app->view->add("tarning100/winner", $data);
    return $app->page->render($data);
});
