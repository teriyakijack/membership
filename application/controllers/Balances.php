<?php

    class Balances extends MY_Controller {
        private $userID;
        private $currentBalance;

        public function __construct() {
            parent::__construct();
            $this->userID = $this->AuthUser->getUserID();
            $this->currentBalance = $this->BalanceModel->getBalanceAt($this->userID);
        }

        public function transaction() {
            $data = [
                'pageTitle'      => 'Wallet',
                'currentBalance' => $this->currentBalance
            ];
            $transactionType = $this->input->post('submit');

            if ($transactionType == 'deposit' || $transactionType == 'withdraw') {
                $this->load->library('form_validation');

                if ($this->form_validation->run('transaction_' . $transactionType)) {
                    $transactionAmount = $this->input->post('transaction_amount');
                    $newBalance = $this->_getNewBalance($transactionType, $transactionAmount);

                    if ($this->BalanceModel->updateBalanceAt($this->userID, $newBalance)) {
                        redirect($this->links['transaction'], 'location');
                    } else {
                        $data['errors'] = [
                            'transaction' => 'There was an error while we update your balance.'
                        ];
                    }
                } else {
                    $data['errors'] = $this->form_validation->error_array();
                }
            }

            $this->viewutils->loadView('balances/wallet', $data);
        }

        /**
         * Function to calculate new Balance
         *
         * @param $type Transaction's type (deposit/withdraw)
         * @param $amount Transaction's amount
         * @return float New Balance
         */
        private function _getNewBalance($type, $amount) {
            if ($type == 'deposit') {
                return $this->currentBalance + $amount;
            } else if ($type == 'withdraw') {
                return $this->currentBalance - $amount;
            } else {
                return $this->currentBalance;
            }
        }

        /**
         * Validation callback method for transfers_amount field
         *
         * @param $amount money that will be transferred
         * @return bool
         */
        public function _withdraw_constraint($amount) {
            if ($amount > $this->currentBalance) {
                return FALSE;
            } else {
                return TRUE;
            }
        }

    }