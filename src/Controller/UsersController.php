<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;

/**
 * Homes controller
 * Author : Saurabh Pandey
 */
class UsersController extends AppController {
    /*
     * Home Page 
     * Description - Home Page Content
     * @params - none
     */

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Flash->usersuccess(__('We Will come back to you soon'));
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->usererror(__('Invalid username or password'));
            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        }
    }

    public function myAccount() {

        $title = "My Account";
        $this->set(compact('title'));
        $this->loadModel('Users');
        $userData = $this->request->Session()->read('Auth.User');

        $data = ($userData['id']) ? $this->Users->get($userData['id']) : [];
        if ($this->request->is('post')) {
//              pr($this->request->data);die;


            $users = $this->Users->patchEntity($data, $this->request->data);

//            pr($djEvent);die;
            if ($users->errors()) {
                $this->Flash->usererror(__('Unable to update User validation error.'));
            } else {

                if ($this->Users->save($users)) {
                    $this->Flash->usersuccess(__('User has been updated successfully.'));
                    return $this->redirect(['action' => 'myAccount']);
                }
                $this->Flash->usererror(__('Unable to save Event data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

    public function changeUserPassword() {
        $this->loadModel('Users');
//        pr($this->Auth->user('id'));
//        pr($this->request->data);die;

        if ($this->request->is('post')) {
            $user = $this->Users->get($this->Auth->user('id'));

            if (!empty($this->request->data)) {

                $password = new DefaultPasswordHasher();

                $user = $this->Users->patchEntity($user, [
                    'old_password' => $this->request->data['old_password'],
                    'password' => $password->hash($this->request->data['new_password']),
                    'new_password' => $this->request->data['new_password'],
                    'confirm_password' => $this->request->data['confirm_password']
                        ], ['validate' => 'password']);
            }
            if ($this->Users->save($user)) {
                $this->Flash->usersuccess('The password is successfully changed');
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->usererror('There was an error during changing password!');
                return $this->redirect(['action' => 'dashboard']);
            }
//            $this->set('user', $user);
        }
    }

    public function saveCard() {
        $title = "Save Card Detail";
        $this->set(compact('title'));
        $this->loadModel('Users');
        $userData = $this->request->Session()->read('Auth.User');

        $data = ($userData['id']) ? $this->Users->get($userData['id']) : [];
        if ($this->request->is('post')) {
            $usersCard = $this->Users->patchEntity($data, $this->request->data);
            if ($usersCard->errors()) {
                $this->Flash->usererror(__('Unable to update User Card validation error.'));
            } else {

                if ($this->Users->save($usersCard)) {
                    $this->Flash->usersuccess(__('User Card has been updated successfully.'));
                    return $this->redirect(['action' => 'myAccount']);
                }
                $this->Flash->usererror(__('Unable to save Event data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

    /*
     * User registration
     * @ created Date :- 21-05-2018
     */

    public function registration() {

        $this->viewBuilder()->layout(false);
        $this->autoRender = false;
        $title = "User - Registration page";
        $this->set(compact('title'));
        $this->loadModel('Users');
        $this->loadModel('Districts');
        $this->loadModel('EmailTemplates');

        

        $emailTemp = $this->EmailTemplates->find()
                        ->where(['alias' => 'account-activation-link'])
                        ->hydrate(false)->first();

        $user = $this->Users->newEntity();
        $password = new DefaultPasswordHasher();
        if ($this->request->is('post')) {
            $this->request->data['password'] = $password->hash($this->request->data['confirm_password']);
//           pr($this->request->data);die;

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($user->errors()) {
                $this->Flash->usererror(__('Unable to add user validation error.'));
            } else {
                if ($saveUser = $this->Users->save($user)) {
                    $emailContent = utf8_decode($emailTemp['description']);
                    $link = SITE_PATH . 'users/activateAccount/' . $saveUser->id;
                    $fullName = $this->request->data['first_name'] . ' ' . $this->request->data['last_name'];
                    $content = str_replace(array('{full_name}', '{link}'), array($fullName, $link), $emailContent);
                    $email = new Email('default');
                    $email->transport('defaultEmail');
                    $email->template("default", "default");
                    $email->from(EMAIL_FROM);
                    $email->to($this->request->data['email']);
                    $email->subject($emailTemp['subject']);
                    $email->emailFormat('html');
                    $email->viewVars(['content' => $content]);
                    $email->send();
                    $this->Flash->usersuccess(__('User has been created successfully.'));
                    return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                }
                $this->Flash->usererror(__('Unable to add user database error.'));
            }
        }
    }

    /*
     * User Account Activation 
     * @params :-  id 
     * @ created Date :- 22-05-2018
     */

    public function activateAccount($id = NULL) {

        $this->viewBuilder()->layout(false);
        $this->autoRender = false;
        $user = $this->Users->find()->where(['id' => $id, 'status' => Inactive])->first();
        if ($user) {
            $this->Users->updateAll(['status' => Active], ['id' => $id]);
            $this->Flash->usersuccess(__('User has been activated.'));
            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        } else {
            $this->Flash->usererror(__('Something went wrong'));
            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        }
    }

    /*
     * User logout
     * @ created Date :- 21-05-2018
     */

    public function logout() {
        $this->Flash->usersuccess('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function forgotPassword() {
        /*
         * User Forgot Password
         * @params - Email
         * @ created By:- Saurabh Pandey
         * @ created Date :- 21-05-2018
         */

        $this->viewBuilder()->layout(false);
        $this->autoRender = false;
        $this->loadModel('EmailTemplates');
        $this->loadModel('Users');

        $emailTemp = $this->EmailTemplates->find()
                        ->where(['alias' => 'forgot-password'])
                        ->hydrate(false)->first();
        $getUserData = $this->Users->find()->where(['Users.email' => $this->request->data['email']])->hydrate(false)->first();
        if (!empty($getUserData)) {
            $alphabet = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz123456789!@#$%^&*()_+-=~[]{}|\m";
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $reset_pass = implode($pass);
            $emailContent = utf8_decode($emailTemp['description']);
            $fullName = $getUserData['first_name'] . ' ' . $getUserData['last_name'];
            $userEmail = $getUserData['email'];
            $content = str_replace(array('{full_name}', '{password_key}'), array($fullName, $reset_pass), $emailContent);

            $email = new Email('default');
            $email->transport('defaultEmail');
            $email->template("default", "default");
            $email->from(EMAIL_FROM);
            $email->to($this->request->data['email']);
            $email->subject($emailTemp['subject']);
            $email->emailFormat('html');
            $email->viewVars(['content' => $content]);
            $email->send();
            if ($email->send()) {
                $password = new DefaultPasswordHasher();
                $data['password'] = $password->hash($reset_pass);
                $delResult = $this->Users->updateAll(['password' => $data['password']], ['email' => $this->request->data['email']]);
                $this->Flash->usersuccess(__('Password has been sent successfully.'));
                return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
            }
            $this->Flash->usererror(__('Unable to Forgot Password database error.'));
            return $this->redirect($this->Auth->logout());
        }
    }

}
