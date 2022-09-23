<?php

namespace App\Controllers;

use App\Entities\Customer;
use App\Entities\Privilege;
use App\Models\GenderModel;
use App\Models\PrivilegeModel;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Entities\Admin;

class Connection extends BaseController
{

    public function index()
    {
        if ($this->data['connected']) {
            return redirect()->to('/home');
        }
        $this->data['title'] = "Se connecter";
        $this->data['page'] = "connexion_admin";
        $this->data['content'] = view('connection');
        return view('application', $this->data);
    }

    public function connect()
    {
        $postParam = $this->request->getPost();
        if (isset($postParam['login']) && (isset($postParam['password']) && !empty($postParam['login']) && !empty($postParam['password']))) { //Here I check that my fillings are existing and are not empty otherwise I redirect towards my header.
            $login = htmlspecialchars($postParam['login']); //I configure my $email as $_post['email']
            $password = htmlspecialchars($postParam['password']); //I configure my $password as $_post['password']
            
            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $userModel = new UserModel();
                $userToVerify = $userModel->getUser(null, array("email" => $login))[0] ?? null;
                if ($userToVerify != null && password_verify($password, $userToVerify->password_user)) { //If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                    return $this->connection_succeed(new Customer(), $userToVerify);
                }
            } else {
                $adminModel = new AdminModel();
                $adminToVerify = $adminModel->getAdmin(null, array("nickname" => $login))[0] ?? null;
                if ($adminToVerify != null && password_verify($password, $adminToVerify->password)) { //If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                    if (!$adminToVerify->actif) {
                        // Account not actif
                        return redirect()->to("/connection");
                    }
                    return $this->connection_succeed(new Admin(), $adminToVerify, true);
                }
            }
        }
        return redirect()->to("/connection");
    }

    public function deconnect()
    {
        $this->session->destroy();
        return redirect()->to('/home');
    }

    public function reset_password()
    {
        if (!$this->data['connected']) {
            return redirect()->to('/connection');
        }
        $this->data['title'] = "Se connecter";
        $this->data['page'] = "connexion_admin";
        $this->data['content'] = view('reset_password');
        return view('application', $this->data);
    }

    public function change_password() {
        if (!$this->data['connected']) {
            return redirect()->to('/connection');
        }
        $postParam = $this->request->getPost();
        if (isset($postParam['new_password']) && (isset($postParam['confirm_password']) && !empty($postParam['new_password']) && !empty($postParam['confirm_password']))) {
            if ($postParam['new_password'] === $postParam['confirm_password']) {
                if ($this->user->getPrivilege() != null && $this->user->getPrivilege()->getId() >= 3) {
                    $model = new AdminModel();
                } else {
                    $model = new UserModel();
                }
                if (!$model->update_password($this->user->getId(), password_hash($postParam['new_password'], PASSWORD_DEFAULT))) {
                    return redirect()->to('/connection/reset_password');
                } else if ($this->user->getPrivilege() != null && $this->user->getPrivilege()->getId() >= 3) {
                    return redirect()->to('/dashboard');
                }
                return redirect()->to('/home');
            }
        }
        return redirect()->to('/connection/');
    }

    public function sign_up() {
        if ($this->data['connected']) {
            return redirect()->to('/home');
        }
        $this->data['title'] = "S'inscrire";
        $this->data['page'] = "sign_up";
        $this->data['content'] = view('sign_up');
        return view('application', $this->data);
    }

    private function connection_succeed($object, $user, $isAdmin = false) {
        $object->setId($user->id);
        $object->setName($user->name);
        $object->setSurname($user->surname);
        $object->setResetPassword($user->reset_password);
        if (!empty($user->privileges_id)) {
            $privilegeModel = new PrivilegeModel();
            if (($tmp = $privilegeModel->getPrivilege($user->privileges_id)) != null) {
                $privileges = new Privilege($tmp->id, $tmp->role);
                $object->setPrivilege($privileges);
            } else {
                // Error Privileges unknow
                return redirect()->to('/connection');
            }
        } else {
            $object->setPrivilege(null);
        }
        if ($isAdmin) {
            $object->setNickname($user->nickname);
            $object->setActif($user->actif);
        } else {
            $genderModel = new GenderModel();
            $object->setGender($genderModel->getGender($user->gender_id));
            $object->setEmail($user->email);
            $object->setPhone($user->phone);
            $object->setAddress($user->address);
            $object->setAddressBis($user->address_bis);
            $object->setZipcode($user->zipcode);
            $object->setCity($user->city);
        }
        $this->session->set('user', $object);
        $privileges = $object->getPrivilege();
        if ($object->isResetPassword()) {
            return redirect()->to('/connection/reset_password');
        } else if ($privileges != null && $privileges->id >= 3) {
            return redirect()->to('/dashboard');
        }
        return redirect()->to('/home');
    }
          
}
