<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AdminModel;
use App\Entities\User;

class Connexion extends BaseController
{


    public function index()
    {
        if ($this->data['connected']) {
            return redirect()->to('/home');
        }
        $this->data['title'] = "Se connecter";
        $this->data['page'] = "connexion_admin";
        $this->data['content'] = view('connexion');
        return view('application', $this->data);
    }

    public function connect()
    {
        $postParam = $this->request->getPost();
        if (isset($postParam['email']) && (isset($postParam['password']) && !empty($postParam['email']) && !empty($postParam['password']))) { //Here I check that my fillings are existing and are not empty otherwise I redirect towards my header.
            $email = htmlspecialchars($postParam['email']); //I configure my $email as $_post['email']
            $password = htmlspecialchars($postParam['password']); //I configure my $password as $_post['password']
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $userModel = new UserModel();
                $userToVerify = $userModel->getUser(null, array("email" => $email))[0] ?? null;
                if ($userToVerify != null && password_verify($password, $userToVerify->password_user)) { //If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                    $this->session = session();
                    $user = new User();
                    $user->setId($userToVerify->user_id);
                    $user->setNom($userToVerify->nom);
                    $user->setPrenom($userToVerify->prenom);
                    $user->setEmail($userToVerify->email);
                    $user->setAdmin($userToVerify->admin);
    
                    $this->session->set('user', $user);
                    if ($userToVerify->reset_password) {
                        return redirect()->to('/connexion/reset_password');
                    }
                    return redirect()->to('/home');
                }
            } else {
                $adminModel = new AdminModel();
                $adminToVerify = $adminModel->getAdmin(null, array("nickname" => $email))[0] ?? null;
                if ($adminToVerify != null && password_verify($password, $adminToVerify->password)) { //If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                    $this->session = session();
                    $this->session->set('admin', null);
                    if ($adminToVerify->reset_password) {
                        return redirect()->to('/connexion/reset_password');
                    }
                    return redirect()->to('/dashboard');
                }
            }
        }
        $this->index();
    }

    public function deconnect()
    {
        if ($this->session->get("user") != null) { //I check if the user session doesn't allready exist
            $this->session->destroy();
        }
        return redirect()->to('/home');
    }

    public function reset_password()
    {
        /*if (!$this->data['connected']) {
            return redirect()->to('/connexion');
        }*/
        $this->data['title'] = "Se connecter";
        $this->data['page'] = "connexion_admin";
        $this->data['content'] = view('reset_password');
        return view('application', $this->data);
    }
          
}
