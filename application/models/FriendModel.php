<?php

    class FriendModel extends CI_Model {
        static $tableName = 'user_friends';
        static $id = 'id';
        static $userID = 'user_id';
        static $friendID = 'friend_id';

        /**
         * @param $userID
         * @param $friendID
         * @return mixed
         */
        public function insert($userID, $friendID) {
            $data = [
                FriendModel::$userID   => $userID,
                FriendModel::$friendID => $friendID
            ];
            $this->db->insert(FriendModel::$tableName, $data);

            return $this->db->insert_id();
        }

        /**
         * @param $userID
         * @param $friendID
         * @return mixed
         */
        public function delete($userID, $friendID) {
            $this->db->where('(' . FriendModel::$userID . ' = ' . $userID . ' and ' . FriendModel::$friendID . ' = ' . $friendID . ')');
            $query = $this->db->or_where('(' . FriendModel::$userID . ' = ' . $friendID . ' and ' . FriendModel::$friendID . ' = ' . $userID . ')');

            return $query->delete(FriendModel::$tableName);
        }

        /**
         * @param $userID
         * @return mixed
         */
        public function getAllFriendOf($userID) {
            $this->db->select(UserModel::$tableName . '.* ,' . BalanceModel::$tableName . '.' . BalanceModel::$balance . ', (CASE WHEN ' . FriendModel::$tableName . '.' . FriendModel::$id . ' IS NOT NULL THEN TRUE ELSE FALSE END) as `is_friend`');
            $this->db->join(FriendModel::$tableName,
                '(' . FriendModel::$tableName . '.' . FriendModel::$userID . ' = ' . UserModel::$tableName . '.' . UserModel::$id .
                ' OR ' . FriendModel::$tableName . '.' . FriendModel::$friendID . ' = ' . UserModel::$tableName . '.' . UserModel::$id . ')',
                'left');
            $this->db->join(BalanceModel::$tableName, BalanceModel::$tableName . '.' . BalanceModel::$userID . ' = ' . UserModel::$tableName . '.' . UserModel::$id);
            $this->db->from(UserModel::$tableName);
            $this->db->where(UserModel::$tableName . '.' . UserModel::$id . ' != ' . $userID);
            $this->db->where('(' . FriendModel::$tableName . '.' . FriendModel::$userID . ' = ' . $userID . ' OR ' . FriendModel::$tableName . '.' . FriendModel::$friendID . ' = ' . $userID . ')');
            $query = $this->db->get();

            return $query->result_array();
        }

        /**
         * @param $userID
         * @return mixed
         */
        public function getFriendDetailBy($userID) {
            $this->db->select('u.' . UserModel::$id . ',u.' . UserModel::$username . ',u.' . UserModel::$name . ',u.' . UserModel::$lastname . ',b.' . BalanceModel::$balance);
            $this->db->from(UserModel::$tableName . ' as u');
            $this->db->join(BalanceModel::$tableName . ' as b ', 'b.' . BalanceModel::$userID . ' = u.' . UserModel::$id);
            $this->db->where('u.' . UserModel::$id, $userID);
            $query = $this->db->get();

            return $query->result_array();
        }
    }