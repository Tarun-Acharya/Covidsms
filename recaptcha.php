<?php

session_start();

// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['number'])) {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);
    
    
    if (!$res['success']) {
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        $_SESSION["number"] = $_POST["number"];
        $_SESSION["name"] = $_POST["name"];
        header("location: abc.php",  true,  301 );  exit;
    }
} else { 
    header("location: http://covidsms.2bz.in",  true,  301 );  exit;
} 
?>