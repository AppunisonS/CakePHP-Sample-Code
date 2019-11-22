<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/*
 * Testimonials  Controller
 * Author : Appunison Solution Pvt Ltd
 */

class TestimonialsController extends AppController {
    /*
     * Testimonial Listing
     * Description - Testimonial Listing
     * @params - none
     */

    public function testimonialListing() {
        $title = "Admin -Testimonial Listing";
        $this->set(compact('title'));
        $conditions = array('Testimonials.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Testimonials.author LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Testimonials.designation LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Testimonials->find('All'));
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'testimonials');
            $this->render('index');
        }
    }

    /*
     * Testimonial add and edit
     * Description - Add new /Edit  Testimonial
     * @params - id (will pass only in case of edit form)
     */

    public function saveTestimonial($id = NULL) {
        $this->set(compact('type'));
        $title = ($id) ? "Admin - Edit New Testimonial" : "Admin - Add New Testimonial";
        $this->set(compact('title'));
        $data = ($id) ? $this->Testimonials->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        $adminInfo = $this->request->Session()->read('Auth.Admin');
        if ($this->request->is('post')) {

            if (!empty($_FILES['testimonial_image'])) {
                if (!$_FILES['testimonial_image']['error']) {
                    $imageArray = $_FILES['testimonial_image'];
                    $testimonialImage = $this->Common->uploadFile(TESTIMONIAL_IMG_PATH, $imageArray);
                    if ($testimonialImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(TESTIMONIAL_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $testimonialImage;
                    }
                }
            }

            if (empty($id)) {
                $testimonial = $this->Testimonials->newEntity();
                $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
            } else if (!empty($id)) {
                $testimonial = $this->Testimonials->patchEntity($data, $this->request->data);
            }
            if ($testimonial->errors()) {
                $this->Flash->error(__('Unable to add your testimonial validation error.'));
            } else {
                if ($this->Testimonials->save($testimonial)) {
                    $this->Flash->success(__('Testimonials has been saved successfully.'));
                    return $this->redirect(['action' => 'testimonialListing']);
                }
                $this->Flash->error(__('Unable to save testimonial data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
