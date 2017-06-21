<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends MY_Controller {
        public function index() {
            $this->load->helper('number');
            $userID = $this->AuthUser->getUserID();
            $balance = $this->BalanceModel->getBalanceAt($userID);
            $data = [
                'pageTitle'   => 'Home',
                'userBalance' => $balance
            ];

            $styleSheets = [
                'public/css/home.css'
            ];
            $this->viewutils->loadView('homes/home', $data, $styleSheets);
        }
    }
