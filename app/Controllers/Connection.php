<?php

namespace App\Controllers;

use App\Entities\Address;
use App\Entities\Customer;
use App\Entities\Privilege;
use App\Models\CustomerModel;
use App\Models\GenderModel;
use App\Models\PrivilegeModel;
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
            $login = htmlspecialchars($postParam['login']);
            $password = htmlspecialchars($postParam['password']);

            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $customerModel = new CustomerModel();
                $customerToVerify = $customerModel->getData(null, array("email" => $login))[0] ?? null;
                if ($customerToVerify != null && password_verify($password, $customerToVerify->password)) { //If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                    $this->ajax_response['success'] = $this->validateConnection(new Customer(), $customerToVerify);
                } else if ($customerToVerify != null && !password_verify($password, $customerToVerify->password)) {
                    $this->ajax_response['message'] = "Mot de passe érronée";
                } else if ($customerToVerify != null) {
                    $this->ajax_response['message'] = "Customer not found";
                } else {
                    $this->ajax_response['message'] = "Information érronée";
                }
            } else {
                $adminModel = new AdminModel();
                $adminToVerify = $adminModel->getData(null, array("nickname" => $login))[0] ?? null;
                if ($adminToVerify != null && password_verify($password, $adminToVerify->password)) { //If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
                    if (!$adminToVerify->actif) {
                        $this->ajax_response['message'] = "Compte désactivé, contactez le support";
                    } else {
                        $this->ajax_response['success'] = $this->validateConnection(new Admin(), $adminToVerify, true);
                    }
                } else {
                    $this->ajax_response['message'] = "Identifiant invalide";
                }
            }
        } else {
            $this->ajax_response['message'] = "Paramètres manquants";
        }
        echo json_encode($this->ajax_response);
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
                    $model = new CustomerModel();
                }
                if (!$model->update_password($this->user->getId(), password_hash($postParam['new_password'], PASSWORD_DEFAULT))) {
                    $this->ajax_response['message'] = "Une erreur lors de la sauvegarde du nouveau mot de passe est survenue, contactez le support";
                } else {
                    $this->ajax_response['success'] = true;
                    $this->ajax_response['data']['redirect'] = "/home";
                    if ($this->user->getPrivilege() != null && $this->user->getPrivilege()->getId() >= 3) {
                        $this->ajax_response['data']['redirect'] = "/dashboard";
                    }
                }
            } else {
                $this->ajax_response['message'] = "Le mot de passe n'est pas identique";
            }
        } else {
            $this->ajax_response['message'] = "Problème technique, contactez le support";
        }
        echo json_encode($this->ajax_response);
    }

    private function validateConnection($object, $user, $isAdmin = false) {
        $object->setId($user->id);
        $object->setName($user->name);
        $object->setSurname($user->surname);
        $object->setResetPassword($user->reset_password);
        if (isset($user->privileges_id) && !empty($user->privileges_id)) {
            $privilegeModel = new PrivilegeModel();
            if (($tmp = $privilegeModel->getData($user->privileges_id)) != null) {
                $privileges = new Privilege($tmp->id, $tmp->role);
                $object->setPrivilege($privileges);
            } else {
                $this->ajax_response['message'] = "Privilege inconnu, veuillez prendre contact avec le support";
                return false;
            }
        } else {
            $object->setPrivilege(null);
        }
        if ($isAdmin) {
            $object->setNickname($user->nickname);
            $object->setActif($user->actif);
        } else {
            $object->setEmail($user->email);
            $object->setPhone($user->phone);
            $object->setCompanyName($user->society_name);

            if (!empty($user->gender_id)) {
                helper('gender');
                $genderModel = new GenderModel();
                $object->setGender(transformItemToObject($genderModel->getData($user->gender_id)));
            }
            if (!empty($user->address)) {
                $address = new Address();
                $address->setAddress($user->address);
                $address->setAdditionalAddress($user->address_bis);
                $address->setZipcode($user->zipcode);
                $address->setCity($user->city);
                $object->setAddress($address);                
            }
        }
        $this->session->set('user', $object);
        if (!empty($object->getResetPassword())) {
            $this->ajax_response['data']['redirect'] = "/connection/reset_password";
        } else if ($object->getPrivilege() != null && $object->getPrivilege()->id >= 3) {
            $this->ajax_response['data']['redirect'] = "/dashboard";
        } else {
            $this->ajax_response['data']['redirect'] = "/home";
        }
        return true;
    }
          
}
