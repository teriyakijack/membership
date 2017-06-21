<?php

    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/7/17
     * Time: 2:54 PM
     */
    Class UserModel extends CI_Model {
        static $tableName = 'users';
        static $id = 'id';
        static $username = 'username';
        static $password = 'password';
        static $name = 'name';
        static $lastname = 'lastname';

        /**
         * @param $username
         * @param $password
         * @return mixed
         */
        public function selectUserBy($username, $password) {
            $where = [
                UserModel::$username => $username,
                UserModel::$password => $password
            ];
            $query = $this->db->get_where(UserModel::$tableName, $where);

            return $query->result();
        }

        /**
         * @param $username
         * @param $password
         * @param $name
         * @param $lastname
         * @return mixed
         */
        public function insertUser($username, $password, $name, $lastname) {
            $data = [
                UserModel::$username => $username,
                UserModel::$password => $password,
                UserModel::$name     => $name,
                UserModel::$lastname => $lastname
            ];
            $this->db->insert(UserModel::$tableName, $data);

            return $this->db->insert_id();
        }

        /**
         * @param $userID
         * @return mixed
         */
        public function deleteUserAt($userID) {
            $query = $this->db->where(UserModel::$id, $userID);

            return $query->delete(UserModel::$tableName);
        }

        /**
         * @param $UserID
         * @return mixed
         */
        public function getAllUserWithOut($UserID) {
            $this->db->select(UserModel::$tableName . '.* , (CASE WHEN ' . FriendModel::$tableName . '.' . FriendModel::$id . ' IS NOT NULL THEN TRUE ELSE FALSE END) as `is_friend`');
            $this->db->join(FriendModel::$tableName,
                '(' . FriendModel::$tableName . '.' . FriendModel::$userID . ' = ' . UserModel::$tableName . '.' . UserModel::$id .
                ' OR ' . FriendModel::$tableName . '.' . FriendModel::$friendID . ' = ' . UserModel::$tableName . '.' . UserModel::$id . ')' .
                ' AND (' . FriendModel::$tableName . '.' . FriendModel::$userID . ' = ' . $UserID . ' OR ' . FriendModel::$tableName . '.' . FriendModel::$friendID . ' = ' . $UserID . ')',
                'left');
            $this->db->from(UserModel::$tableName);
            $this->db->where(UserModel::$tableName . '.' . UserModel::$id . ' != ' . $UserID);
            $query = $this->db->get();

            return $query->result_array();
        }
    }