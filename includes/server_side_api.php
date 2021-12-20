<?php

session_start();

include "../db/db_config.php";

/**
 * function to sanitize data before insert in db
 */
function sanitize_data($data){

    $data = trim($data);
    $data = htmlentities($data);
    $data = stripslashes($data);

    return $data;

}

/**
 * get json data from javascript and pass it in php format
 */
if(isset($_POST["su-user_fname"]) || isset($_POST["su-user_lname"]) || isset($_POST["su-user_contact"]) || isset($_POST["su-user_mail"]) || isset($_POST["su-user_pass"]) || isset($_POST["su-user_rpass"])){

    $user_fname = sanitize_data($_POST["su-user_fname"]);
    $user_lname = sanitize_data($_POST["su-user_lname"]);
    $user_contact = sanitize_data($_POST["su-user_contact"]);
    $user_mail = sanitize_data($_POST["su-user_mail"]);
    $user_pass = sanitize_data($_POST["su-user_pass"]);
    $user_rpass = sanitize_data($_POST["su-user_rpass"]);
    $encrypt_password = sha1($user_pass);

    // validate email address
    if(!filter_var($user_mail, FILTER_VALIDATE_EMAIL)){

        echo json_encode(
            array(
                'status'=>'failed',
                'message'=>'Invalid Email Address'
            )
        );

    }
    // validate password
    if(!empty($user_pass) && $user_pass != "" ){

        if (strlen($user_pass) <= '8') {
            $response = json_encode(
                array(
                    "status"=>"failed",
                    "message"=> "Your Password Must Contain At Least 8 Digits !"
                )
                );
        }
        elseif(!preg_match("#[0-9]+#",$user_pass)) {
            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=>'Your Password Must Contain At Least 1 Number'
                )
            );
        }
        elseif(!preg_match("#[A-Z]+#",$user_pass)) {
            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=>'Your Password Must Contain At Least 1 Capital Letter !'
                )
            );
        }
        elseif(!preg_match("#[a-z]+#",$user_pass)) {
            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=> 'Your Password Must Contain At Least 1 Lowercase Letter !'
                )
                );
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user_pass)) {
            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=>'Your Password Must Contain At Least 1 Special Character !'
                )
            );
        }elseif($user_pass != $user_rpass){
            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=>'Passwords do not match'
                )
            );
        }
    }

    // function to create user_id 
    function User_ID($conn){

        $fetch_users_sql = "SELECT * FROM users";
        $fetch_users_exe = mysqli_query($conn, $fetch_users_sql);
        if(mysqli_num_rows($fetch_users_exe) == 0){

            $count_from = 1;
            $id = "PD-".sprintf("%05d", $count_from);

        }else{

            $fetch_last_ins_sql = "SELECT user_id FROM users ORDER BY user_id LIMIT 1";
            $fetch_last_ins_exe = mysqli_query($conn, $fetch_last_ins_sql);
            $last_ins_row = mysqli_fetch_array($fetch_last_ins_exe);
            $last_ins_id = $last_ins_row["user_id"];
            $explode = substr($last_ins_id, -5);
            $count_from = "$explode" + 1;
            $id = "PD-".sprintf("%05d", $count_from);

        }

    }

    // check whether user info already exists
    $chk_user_sql = "SELECT * FROM users_view WHERE user_mail = '$user_mail'";
    $chk_user_exe = mysqli_query($conn, $chk_user_sql);
    $chk_user_num_rows = mysqli_num_rows($chk_user_exe);

    if($chk_user_num_rows >= 1){

        while($chk_user_row = mysqli_fetch_array($fetch_user_exe)){

            $user_verify_token = $chk_user_row["verify_token"];
            $user_verify_status = $chk_user_row["verify_status"];

        }
        /**
         * check if user has already received verification token
         * and has not been verified yet
         */
        if($user_verify_token != "" && $user_verify_status == 0){

            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=>'The account needs to be activated. Kindly check your email'
                )
            );
        /**
         * check if user email has verified the account 
         * using the verification link sent to the mail
         */
        } 
        else if($user_verify_token != "" && $user_verify_status == 1){

            $response = json_encode(
                array(
                    'status'=>'failed',
                    'message'=>'The account has already been activated'
                )
            );

        }

        
    /**
     * if the user does not exist, proceed with the registration of the user
     */
    }else{

        $ins_user_sql = "";

    }
    

}
