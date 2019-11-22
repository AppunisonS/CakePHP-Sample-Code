<?php

namespace App\Controller\admin;

use App\Controller\AppController;
use Cake\Mailer\Email;

/*
 * Author : Hemant Chuphal
 */

class ContactUsController extends AppController {
    /*
     * ContactUs
     */

    public function contactUs() {

        $title = "Admin -Contact Listing";
        $this->set(compact('title'));

        $this->loadModel('ContactUs');
        $conditions = array('ContactUs.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['ContactUs.email LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['ContactUs.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->ContactUs->find('All'));
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'contactus');
            $this->render('index');
        }
    }

    public function sendEmail($id) {
        $title = "Send Mail";
        $this->set(compact('title'));
        $Query = $this->ContactUs->find('All')->where(['ContactUs.id' => $id])->first();
        $this->set('Results', $Query);
        $that = $this->request->is('post');
        if ($that) {

            $this->loadModel('EmailTemplates');
            $emailTemp = $this->EmailTemplates->find()->where(['alias' => 're-send-mail'])->hydrate(false)->first();
            $sendingemail = $this->request->data['email'];
            $subject = $emailTemp['subject'];
            $message = $this->request->data['message'];
            $emailContent = utf8_decode($emailTemp['description']);
            $content = str_replace(array('{email}', '{message}'), array($sendingemail, $message), $emailContent);
//                       pr($content);die;
            $email = new Email();
            $email->transport('defaultEmail');
            $email->template("default");
            $email->from(EMAIL_FROM);
            $email->to($sendingemail);
            $email->subject($subject);
            $email->emailFormat('html');
            $email->viewVars(['content' => $content]);
            if ($email->send()) {
                $Query['status'] = 0;
                $this->ContactUs->save($Query);
                $this->Flash->success(__('Email has been sent successfully.'));
                return $this->redirect(['action' => 'contactUs']);
            }
        }
    }

}
