<?php

    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/7/17
     * Time: 1:28 PM
     */
    Class MY_Controller extends CI_Controller {
        protected $pageData;
        protected $links;
        protected $tabLinks;

        public function __construct() {
            parent::__construct();
            $this->config->load('links', TRUE);
            $this->config->load('tabs', TRUE);
            $this->links = $this->config->item('links');
            $this->tabLinks = $this->config->item('tabs');
            $this->verifyLoggedin();
        }

        private function verifyLoggedin() {
            if (!$this->session->userdata('is_logged_in')) {
                if ($this->router->method != 'login' && $this->router->method != 'register') {
                    redirect($this->links['Login'], 'refresh');
                }
            } else {
                $this->AuthUser = unserialize($this->session->userdata('authenticated_user'));
            }
        }
    }