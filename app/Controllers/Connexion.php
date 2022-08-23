<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;

class Connexion extends BaseController{


    public function index(){
        if ($this->session->get('user') != null) {
            return redirect()->to('/home');
        } 
        $data = array(
            'title' => "Se connecter",
            'page'=>"connexion_admin",
            'content' => view('connexion')
        );
        return view('application', $data);
    }

    public function connect(){
        $postParam = $this->request->getPost();
        if (isset($postParam['email'])&&(isset($postParam['password']) && !empty($postParam['email'])&&!empty($postParam['password']))){//Here I check that my fillings are existing and are not empty otherwise I redirect towards my header.
            $email=htmlspecialchars($postParam['email']);//I configure my $email as $_post['email']
            $password=htmlspecialchars($postParam['password']);//I configure my $password as $_post['password']
            $userModel=new UserModel();
            $userToVerify = $userModel->getUser(null, array("email" => $email));
            if($userToVerify!=null && password_verify($password,$userToVerify->password_user)){//If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                $this->session = session();
                $user = new User();
                $user->setId($userToVerify->user_id);
                $user->setNom($userToVerify->nom);
                $user->setPrenom($userToVerify->prenom);
                $user->setEmail($userToVerify->email);
                $user->setAdmin($userToVerify->admin);

                $this->session->set('user', $user);
                return redirect()->to('/home');
            }
        }
        $this->index();
    }

    public function deconnect(){
        if($this->session->get("user") !=null){//I check if the user session doesn't allready exist
            $this->index();
            }
            
            $this->session->destroy();
            return redirect()->to('/home');
        }

}