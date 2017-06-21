<?php

    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/20/17
     * Time: 5:04 PM
     */
    class DatabaseUtils {
        private $CI;

        public function __construct() {
            $this->CI =& get_instance();
        }

        public function test() {
            echo 'test';
        }

        /**
         * function to Execute Database transaction
         *
         * @param Mixed $refObj Object reference
         * @param String $functionName method name of $refObj to be called
         * @param Array $params parameter array
         * @return bool return true if success otherwise false
         */
        public function runTransaction(&$refObj, $functionName = '', &$params = []) {
            if (method_exists($refObj, $functionName)) {
                $this->CI->db->trans_begin();
                call_user_func_array([$refObj, $functionName], $params);
                $this->CI->db->trans_complete();

                if ($this->CI->db->trans_status() === FALSE) {
                    $this->CI->db->trans_rollback();

                    return FALSE;
                } else {
                    $this->CI->db->trans_commit();

                    return TRUE;
                }
            }
        }
    }