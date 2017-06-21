<?php
    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/14/17
     * Time: 2:34 PM
     */
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ViewUtils {
        private $CI;
        private $tabLinks;
        private $links;

        public function __construct() {
            $this->CI =& get_instance();
            $this->CI->config->load('links', TRUE);
            $this->CI->config->load('tabs', TRUE);
            $this->links = $this->CI->config->item('links');
            $this->tabLinks = $this->CI->config->item('tabs');
        }

        /**
         * @param       $path
         * @param       $data
         * @param bool  $includedNav
         * @param array $styleSheets
         * @param array $javaScripts
         */
        public function loadView($path, $data = [], $styleSheets = [], $javaScripts = [], $includedNav = TRUE) {
            $styleSheets = ['styleSheets' => $styleSheets];
            $javaScripts = ['javaScripts' => $javaScripts];
            $data = $this->genViewData($data);

            $this->CI->load->view('templates/header', array_merge($data, $styleSheets));
            if ($includedNav) {
                $this->CI->load->view('templates/navbar', $data);
            }
            $this->CI->load->view($path, array_merge($data, $javaScripts));
            $this->CI->load->view('templates/footer');
        }

        /**
         * @param $data
         * @return array
         */
        public function genViewData($data) {
            $defaultPageData = [
                'pageTitle'   => 'Page Title',
                'links'       => $this->links,
                'tabLinks'    => $this->tabLinks,
                'AuthUser'    => $this->CI->AuthUser,
                'styleSheets' => [],
                'javascripts' => [],
                'errors'      => []
            ];

            return array_merge($defaultPageData, $data);
        }
    }