<?php

include_once './model/Role.php';

$role_name = $_POST['data']['role_name'];

$role_obj = new Role();

if($role_obj->checkOnRole($role_name) == 0){

    $role = $role_obj->addRole($role_name);
    if($role == 1)
    {
        echo "Role Is Inserted Successfully";
    }
}else{
    echo "Role is Already Exist";
}

