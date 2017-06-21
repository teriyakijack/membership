<?php
class AuthenticatedUserModel {
    private $userID;
    private $username;
    private $name;
    private $lastname;

    /**
     * @return mixed
     */
    public function getUserID() {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID) {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
}