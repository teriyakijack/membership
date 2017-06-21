<?php
$config = array(
    'login'       => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required',
            'error' => array(
                'required' => 'This {field} cannot be Empty!'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required',
            'error' => array(
                'required' => 'This {field} cannot be Empty!'
            )
        )
    ),
    'register'    => array(
        array(
            'field'  => 'username',
            'label'  => 'Username',
            'rules'  => 'trim|required|min_length[4]|max_length[12]|is_unique[users.username]',
            'errors' => array(
                'required'   => 'This {field} cannot be Empty!',
                'min_length' => 'The {field} must be at least {param} characters in length.',
                'max_length' => 'The {field} cannot exceed {param} characters in length.',
                'is_unique'  => 'This {field} has already been used.'
            )
        ),
        array(
            'field'  => 'password',
            'label'  => 'Password',
            'rules'  => 'trim|required',
            'errors' => array(
                'required' => 'This {field} cannot be Empty!'
            )
        ),
        array(
            'field'  => 'passconf',
            'label'  => 'Password Confirmation',
            'rules'  => 'trim|required|matches[password]',
            'errors' => array(
                'required' => 'This {field} cannot be Empty!'
            )
        ),
        array(
            'field'  => 'name',
            'label'  => 'Name',
            'rules'  => 'trim|required',
            'errors' => array(
                'required' => 'This {field} cannot be Empty!'
            )
        ),
        array(
            'field'  => 'lastname',
            'label'  => 'Lastname',
            'rules'  => 'trim|required',
            'errors' => array(
                'required' => 'This {field} cannot be Empty!'
            )
        )
    )
);