<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '111111', 'test');

$query = 'SELECT * FROM users';

//Get Result
$result = mysqli_query($conn, $query);

//Fetch Data
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);