<?php
//
//  define ('FILTER_SANITIZE_STRING', 513);
// require '../inc/message.php';

$error = '';
$success = '';

function requireInputs($value) {
    $str = trim($value);
    if(strlen($str) < 3) {
        return false;
    } 
    return true;
}

function checkEmpty($value) {
    if(!empty($value)) {
        return true;
    }
    return false;
}

function minLen($value, $min) {
    if(strlen($value) < $min) {
        return false;
    }
    return true;
}
function maxLen($value, $max) {
    if(strlen($value) > $max) {
        return false;
    }
    return true;
}


//sanitize string
function SanString($value) {
    $str = trim($value);
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    return $str;
}


function sanEmail($email) {
    $email = trim($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
}

function validate($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true; 
}
/*
function getImage($file) {

    $f_name = $file['name'];
    $f_type = $file['type'];
    $f_error = $file['error'];
    $f_size = $file['size'];
    $f_tmp_name = $file['tmp_name'];

    if($f_name != '') {
        $ext = pathinfo($f_name);  // contains image name and ext

        $org_name = $ext['filename'];
        $org_ext = $ext['extension'];

        $allowed = array("png", "jpg", "jpeg", "pdf");
        if(in_array($org_ext , $allowed)) {

            if($f_size <= 500000) {

                $new_name = uniqid('', true) . $org_ext;
                $destination = "uploads/" . $new_name;
                if(move_uploaded_file($f_tmp_name ,$destination)) {

                } else {

                }

            } else {
                $error_message = "Image is very large";
            }

        } else {
            $error_message = "Sorry We don't accept this extention";
        }

    } else {
        $error_message = "Uploade Image !";
    }

}

*/