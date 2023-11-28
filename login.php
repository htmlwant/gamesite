<?php
$db = mysqli_connect('localhost', 'root', 'asd7517162', 'submit');


$user_id = mysqli_real_escape_string($db, $_POST['user_id']);
$user_password = mysqli_real_escape_string($db, $_POST['user_password']);

$query = "SELECT * FROM member WHERE mb_id = '$user_id' AND mb_password = '$user_password'";
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "<script>alert('로그인 성공하셨습니다'); location.replace('index.html');</script>";
    } else {
        echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다'); history.back(); </script>";
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>