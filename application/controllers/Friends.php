<?php

    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/9/17
     * Time: 1:10 PM
     */
    Class Friends extends MY_Controller {
        public function index() {
            $this->load->helper('number');
            $userID = $this->AuthUser->getUserID();
            $friends = $this->FriendModel->getAllFriendOf($userID);
            $data = [
                'pageTitle' => 'Friends List',
                'friends'   => $friends
            ];

            $this->viewutils->loadView('friends/friend_list', $data);
        }

        public function add($friendID = 0) {
            $userID = $this->AuthUser->getUserID();
            $this->FriendModel->insert($userID, $friendID);
            redirect(base_url($this->links['Users']), 'location');
        }

        public function remove($friendID = 0) {
            $userID = $this->AuthUser->getUserID();
            $this->FriendModel->delete($userID, $friendID);
            redirect(base_url($this->links['Friends']), 'location');
        }

        public function detail($friendID = 0) {
            $this->load->helper('number');
            $friend = $this->FriendModel->getFriendDetailBy($friendID);

            if (sizeof($friend) === 0) {
                redirect(base_url($this->links['Friends']), 'refresh');
            } else {
                $friend = $friend[0];

                if ($friend['id'] === $this->AuthUser->getUserID()) {
                    redirect(base_url($this->links['Friends']), 'refresh');
                }
            }

            $data = [
                'pageTitle' => 'Friends Detail',
                'friend'    => $friend,
            ];

            $styleSheets = ['public/css/home.css'];
            $this->viewutils->loadView('friends/friend_info', $data, $styleSheets);
        }
    }