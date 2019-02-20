<?php
require_once "config.php";

//returns a user
//$root = new User();
//$root->loadById(1);
//echo $root;

//Returns a list of users
//$list = User::getList();
//echo json_encode($list);

//Returns a list of users by login
//$search = User::search("root");
//echo json_encode($search);

//Returns a user with login and password
//$user = new User();
//$user->login("root", "123456");
//echo $user;

//Create a new user
//$user = new User("user", "123456");
//$user->insert();
//echo $user;

//Update a user
//$user = new User();
//$user->loadById(8);
//$user->update("user2", "654321");
//echo $user;

//Delete a user
$user = new User();
$user->loadById(8);
$user->delete();
echo $user;
