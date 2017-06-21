<?php
    $config = [
        'login'       => [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required',
                'error' => [
                    'required' => 'This {field} cannot be Empty!'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'error' => [
                    'required' => 'This {field} cannot be Empty!'
                ]
            ]
        ],
        'register'    => [
            [
                'field'  => 'username',
                'label'  => 'Username',
                'rules'  => 'trim|required|min_length[4]|max_length[12]|is_unique[users.username]',
                'errors' => [
                    'required'   => 'This {field} cannot be Empty!',
                    'min_length' => 'The {field} must be at least {param} characters in length.',
                    'max_length' => 'The {field} cannot exceed {param} characters in length.',
                    'is_unique'  => 'This {field} has already been used.'
                ]
            ],
            [
                'field'  => 'password',
                'label'  => 'Password',
                'rules'  => 'trim|required',
                'errors' => [
                    'required' => 'This {field} cannot be Empty!'
                ]
            ],
            [
                'field'  => 'passconf',
                'label'  => 'Password Confirmation',
                'rules'  => 'trim|required|matches[password]',
                'errors' => [
                    'required' => 'This {field} cannot be Empty!'
                ]
            ],
            [
                'field'  => 'name',
                'label'  => 'Name',
                'rules'  => 'trim|required',
                'errors' => [
                    'required' => 'This {field} cannot be Empty!'
                ]
            ],
            [
                'field'  => 'lastname',
                'label'  => 'Lastname',
                'rules'  => 'trim|required',
                'errors' => [
                    'required' => 'This {field} cannot be Empty!'
                ]
            ]
        ],
        'transaction_deposit' => [
            [
                'field'  => 'transaction_amount',
                'label'  => 'Transaction amount',
                'rules'  => 'trim|required|numeric|greater_than[0]|less_than_equal_to[5000]',
                'errors' => [
                    'required'              => 'This {field} cannot be Empty!',
                    'greater_than_equal_to' => 'You have to make Deposit greater than 0 Baht',
                    'less_than_equal_to'    => 'You cannot make Deposit over than 5,000 Baht'
                ]
            ]
        ],
        'transaction_withdraw' => [
            [
                'field'  => 'transaction_amount',
                'label'  => 'Transaction amount',
                'rules'  => 'trim|required|numeric|greater_than[0]|less_than_equal_to[5000]|callback__withdraw_constraint',
                'errors' => [
                    'required'              => 'This {field} cannot be Empty!',
                    'greater_than_equal_to' => 'You have to make Withdraw greater than 0 Baht',
                    'less_than_equal_to'    => 'You cannot make Withdraw over than 5,000 Baht',
                    '_withdraw_constraint'  => 'You don\'t have enough money to Withdraw!'
                ]
            ]
        ]
    ];