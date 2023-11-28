<?php
include('db.php');

    if(isset($_POST['user_id']) && isset($_POST['user_password']) && isset($_POST['user_text']) && isset($_POST['user_date']))
    {
        $user_id = mysqli_real_escape_string($db , $_POST['user_id']);
        $user_password = mysqli_real_escape_string($db , $_POST['user_password']);
        $user_name = mysqli_real_escape_string($db , $_POST['user_text']);
        $user_date = mysqli_real_escape_string($db , $_POST['user_date']); 
        //mysqli_real_escape_string 보안을 더욱 강화(시큐어 코딩 , 보안코딩
        
        $sql_same = "SELECT * FROM member where mb_id = '$user_id' and mb_name = '$user_name'";
        $order = mysqli_query($db , $sql_same);

        if(mysqli_num_rows($order) > 0)
        {
            echo "<script>alert('중복체크를 해주세요');</script>";
            //중복 체크 에러
        }
        else
        {
            $sql_save = "INSERT INTO member(mb_id , mb_password , mb_name , mb_dae) VALUES ('$user_id','$user_password','$user_name','$user_date')";
            $result = mysqli_query($db , $sql_save);

            if($result)
            {
                echo "<script>alert('회원가입이 완료되었습니다');
                location.replace('../login.html');  
                </script>";
 
            }
            else
            {
                echo "<script>alert('ERROR 400'); 
                location.replace('register.html');  
                </script>";
            }
        }
    }
?>