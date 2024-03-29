<?php

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;
use App\Controllers\Controller;

class UserController extends Controller
{
    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        // $validator = new Validator($_POST);
        // $errors = $validator->validate([
        //     'username' => ['required', 'min:3'],
        //     'password' => ['required']
        // ]);

        // if($errors) {
        //     $_SESSION['errors'][] = $errors;
        //     header('Location: /login');
        //     exit;
        // }


        $user = (new User($this->getDB()))->getByMail($_POST['mail']);

        if(password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int)$user->admin;
            return header('Location: /admin/orders');
        } else {
            return header('Location: /login');
        }
    }

    public function logout()
    {
        session_destroy();
        return header('Location: /');
    }
}