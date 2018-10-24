<?php

namespace Chai17\User;

/**
 *
 */

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class UserController implements AppInjectableInterface
{
    use AppInjectableTrait;

    // rendera login för user
    public function userActionGet()
    {
        $title = "Användare";
        $this->app->page->add("user/user");

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    // logga ut användare
    public function logoutActionPost()
    {

        $this->app->session->delete("userpsw");
        $this->app->session->delete("validUser");
        $this->app->session->delete("useruname");

        return $this->app->response->redirect("user/user");
    }
    // logga in användare och rendera översikt
    public function loginActionPost()
    {
        $title = "Översikt";
        $this->app->db->connect();

        $this->app->session->set("userpsw", $this->app->request->getPost('psw'));
        $this->app->session->set("useruname", $this->app->request->getPost('uname'));


        $params = [$this->app->session->get("userpsw"), $this->app->session->get("useruname")];
        $sql = "SELECT * FROM users WHERE password=? AND username=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        if (!$res) {
            $this->app->session->getOnce("message", "failed to login");
            $this->app->session->set("validUser", false);
            $this->app->response->redirect('user/registerUser');
        } else {
            $this->app->session->set("validUser", true);
            $this->app->session->set("name", $res->firstname);
        }

        $this->app->page->add('user/overview', [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    // rendera registrerings sidan
    public function registerUserActionGet()
    {
        $title = "Registrera" ;
        $this->app->page->add("user/registerUser");

        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    // registrera ny användare
    public function registerUserActionPost()
    {
        $this->app->session->set("userpsw", $this->app->request->getPost('psw'));
        $this->app->session->set("useruname", $this->app->request->getPost('uname'));

        $params = [$this->app->session->get("useruname"), $this->app->session->get("userpsw")];
        $this->app->db->connect();
        $sql = "INSERT INTO users (username, password) VALUES (?, ?);";

        $this->app->db->execute($sql, $params);
        return  $this->app->response->redirect("user/user");
    }
    // rendera översikts sidan
    public function overviewActionGet()
    {
        $title = "Översikt";
        $this->app->db->connect();


        $params = [$this->app->session->get("userpsw"), $this->app->session->get("useruname")];
        $sql = "SELECT * FROM users WHERE password=? AND username=?;";
        $res = $this->app->db->executeFetch($sql, $params);

        $this->app->page->add('user/overview', [
            "res" => $res
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    // rendera redigera sidan
    public function editActionGet()
    {
        $title = "Redigera";
        $this->app->db->connect();


        $params = [$this->app->session->get("userpsw"), $this->app->session->get("useruname")];
        $sql = "SELECT * FROM users WHERE password=? AND username=?;";
        $res = $this->app->db->executeFetch($sql, $params);

        $this->app->page->add('user/edit', [
            "res" => $res
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    // redigera användar info
    public function editActionPost()
    {
        $firstname = $this->app->request->getPost('firstname');
        $lastname = $this->app->request->getPost('lastname');
        $gender = $this->app->request->getPost('gender');
        $phoneNumber = $this->app->request->getPost('phoneNumber');

        $params = [$firstname, $lastname, $gender, $phoneNumber, $this->app->session->get("useruname")];
        $this->app->db->connect();
        $sql =  "UPDATE users SET firstname=?, lastname=?, gender=?, phoneNumber=? WHERE username=?;";

        $this->app->db->execute($sql, $params);
        return  $this->app->response->redirect("user/overview");
    }
    // rendera bonus sidan samt lägg in bonus på användaren
    public function bonusActionPost()
    {
        $title = "Bonus";
        $bonus = $this->app->request->getPost('bonus');
        $params = [$bonus, $this->app->session->get("useruname")];
        $this->app->db->connect();
        $sql =  "UPDATE users SET bonus=? WHERE username=?;";
        $this->app->db->execute($sql, $params);
        $params = [$this->app->session->get("userpsw"), $this->app->session->get("useruname")];
        $sql = "SELECT * FROM users WHERE password=? AND username=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        $this->app->page->add('user/bonus', [
            "res" => $res
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function bonusActionGet()
    {
        $title = "Bonus";
        $this->app->db->connect();
        $params = [$this->app->session->get("userpsw"), $this->app->session->get("useruname")];
        $sql = "SELECT * FROM users WHERE password=? AND username=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        $this->app->page->add('user/bonus', [
            "res" => $res
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    // uppdatera så användaren använt sin bonus och återgå till översikt
    public function claimbonusActionPost()
    {
        $bonus = $this->app->request->getPost('bonus');
        $params = [$bonus, $this->app->session->get("useruname")];
        $this->app->db->connect();
        $sql =  "UPDATE users SET bonus=? WHERE username=?;";
        $this->app->db->execute($sql, $params);

        return  $this->app->response->redirect("user/overview");
    }
}
