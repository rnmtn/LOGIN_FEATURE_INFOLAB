<?php

function addUser($db, $username, $password) {
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    if($stmt->affected_rows == 0) {
        $sql = "INSERT INTO users (username,password) VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }

    return true;
}

function login($conn, $username, $password) {
    $query = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $uid = $row['user_id'];
        $uname = $row['username'];
        $passHash = $row['password'];

        if(password_verify($password, $passHash)) {
            $_SESSION['user_id'] = $uid;
            $_SESSION['username'] = $uname;
            $_SESSION['userLoginStatus'] = 1;
            return true;
        }
        else {
            return false;
        }
    }
}
