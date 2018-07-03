<?php
  require('model/db-function.php');

// $username_query = "SELECT username FROM staff WHERE username = '".$username."'";
function get_staff_by_username($username){
  $db = get_connect_db();
  $username_query = "SELECT * FROM staff WHERE username = '{$username}'";

  return $db->query($username_query)->fetch_assoc();
}

function get_staff_name($staff_id){
    $db = get_connect_db();
    $username_query = "SELECT CONCAT(first_name, ' ', last_name) as name FROM staff WHERE staff_id = '{$staff_id}'";

    return $db->query($username_query)->fetch_assoc();
}

function get_all_staff(){
    $db = get_connect_db();
    $staff_query = "SELECT username, CONCAT(first_name, ' ', last_name) AS name, phone, staff_id FROM staff";

    return $db->query($staff_query)->fetch_all(MYSQLI_ASSOC);
}

function create_staff($username, $first_name, $last_name, $phone, $password){
  $db = get_connect_db();
  $query = "INSERT INTO staff (username, first_name, last_name, phone, password)
  VALUES ('{$username}', '{$first_name}', '{$last_name}', '{$phone}', '{$password}')";
  $db->query($query);
}
// UPDATE table_name
// SET column1=value, column2=value2,...
// WHERE some_column=some_value
function update_staff($staff_id, $username, $first_name, $last_name, $phone, $password){
  $db = get_connect_db();
  $query = "UPDATE staff SET username='{$username}', first_name='{$first_name}', last_name='{$last_name}',
                                            phone='{$phone}', password='{$password}'
                                            WHERE staff_id=$staff_id";
  $db->query($query);
}

function delete_staff($staff_id){
  $db = get_connect_db();
  $query = "DELETE FROM staff WHERE staff_id=$staff_id";
  $db->query($query);
}

//check if the submitted username and password exist in the database
function get_member_by_username_and_password($username, $password, $userType){
  $db = get_connect_db();
  $queryId = "SELECT * FROM ".$userType." WHERE username LIKE '".$username."' AND password LIKE '".$password."'";
  $queryResult = $db->query($queryId);

  return $queryResult->fetch_assoc();
}
?>
