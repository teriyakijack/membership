<?php

class BalanceModel extends CI_Model {
    static $tableName = 'user_balance';
    static $id = 'id';
    static $userID = 'user_id';
    static $balance = 'balance_amount';

    /**
     * @param $userID
     * @param int $balanceAmount
     * @return mixed
     */
    function insertBalanceOf($userID, $balanceAmount = 5000) {
        $data = array(
            BalanceModel::$userID  => $userID,
            BalanceModel::$balance => $balanceAmount
        );
        $this->db->insert(BalanceModel::$tableName, $data);
        return $this->db->insert_id();
    }

    /**
     * @param $userId
     * @return int
     */
    function getBalanceAt($userId) {
        $where = array(
            BalanceModel::$userID => $userId
        );
        $query = $this->db->get_where(BalanceModel::$tableName, $where);
        $balance = $query->result();

        if (sizeof($balance) > 0) {
            $balance = $balance[0]->balance_amount;
        } else {
            $balance = 0;
        }

        return $balance;
    }

    /**
     * @param $userID
     * @param $newBalance
     * @return Bool
     */
    function updateBalanceAt($userID, $newBalance) {
        $this->db->set(BalanceModel::$balance, $newBalance);
        $this->db->where(BalanceModel::$userID, $userID);
        return $this->db->update(BalanceModel::$tableName);
    }
}