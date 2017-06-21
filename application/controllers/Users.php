<?php

    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/7/17
     * Time: 1:40 PM
     */
    Class Users extends MY_Controller {
        public function index() {
            $users = $this->UserModel->getAllUserWithOut($this->AuthUser->getUserID());
            $data = [
                'pageTitle' => 'User List',
                'users'     => $users
            ];

            $this->viewutils->loadView('users/user_list', $data);
        }

        /**
         * @param $authUser
         */
        private function _initSession($authUser) {
            $this->session->set_userdata('is_logged_in', TRUE);
            $this->AuthUser->setUserID($authUser->id);
            $this->AuthUser->setUsername($authUser->username);
            $this->AuthUser->setName($authUser->name);
            $this->AuthUser->setLastname($authUser->lastname);
            $this->session->set_userdata('authenticated_user', serialize($this->AuthUser));
        }

        public function register() {
            $data = [
                'pageTitle'  => 'Register',
                'pageHeader' => 'Register New User'
            ];

            if ($this->input->post('submit')) {
                $this->load->library('form_validation');

                if ($this->form_validation->run('register')) {
                    $this->load->library('databaseutils');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $name = $this->input->post('name');
                    $lastname = $this->input->post('lastname');

                    if ($this->databaseutils->runTransaction($this, '_createNewUser', [$username, $password, $name, $lastname])) {
                        redirect($this->links['Login'], 'location');
                    } else {
                        $data['errors'] = ['registering' => 'Something went wrong when try to register, please try again.'];
                    }
                } else {
                    $data['errors'] = $this->form_validation->error_array();
                }
            }

            $styleSheets = ['public/css/register.css'];
            $this->viewutils->loadView('users/register', $data, $styleSheets, NULL, FALSE);
        }

        public function login() {
            $data = [
                'pageTitle' => 'Login'
            ];

            if ($this->input->post('submit')) {
                $this->load->library('form_validation');

                if ($this->form_validation->run('login')) {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $authUsers = $this->UserModel->selectUserBy($username, $password);

                    if (sizeof($authUsers) > 0) {
                        $this->_initSession($authUsers[0]);
                        redirect(base_url($this->links['Home']), 'location');
                    } else {
                        $data['errors'] = [
                            'login_fail' => 'Username/Password was incorrect!'
                        ];
                    }
                } else {
                    $data['errors'] = $this->form_validation->error_array();
                }
            }

            $styleSheets = ['public/css/login.css'];
            $this->viewutils->loadView('users/login', $data, $styleSheets, NULL, FALSE);
        }

        public function logout() {
            $this->session->unset_userdata('is_logged_in');
            session_destroy();
            redirect(base_url($this->links['Login']), 'refresh');
        }

        public function _createNewUser($username, $password, $name, $lastname) {
            $newUserID = $this->UserModel->insertUser($username, $password, $name, $lastname);
            $this->BalanceModel->insertBalanceOf($newUserID);
        }
    }