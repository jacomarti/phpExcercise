<?php
//validates a single field
function validateInputPost($field){
    if(!isset($_POST[$field]) || empty($_POST[$field])){
        http_response_code(500);
        exit();
    }
    return $_POST[$field];
}

//validates all the fields
function validateAllPostInput($fields){
    foreach ($fields as $field){
        $fields[$field]=validateInputPost($field);
    }
    return $fields;
}

//returns the greeting based on event identifier
function exactGreeting($event){
    switch($event){
        case "A":
            return "Buon Anno Nuovo!";
            break;
        case "B":
            return "Auguri di felice battesimo!";
            break;
        case "C":
            return "Buon Compleanno!";
            break;
        default:
            return "Error: not a valid event name";
    }
}

//returns the keyword for the endpoint of the image
function generateEventKeyword($event){
    switch($event){
        case "A":
            return "NewYear";
            break;
        case "B":
            return "Baptism";
            break;
        case "C":
            return "Birthday";
            break;
        default:
            return "Error: not a valid event name";
    }
}

//sends the email
function sendEmail($fields){
    $headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com\r\nX-Mailer: PHP/". PHP_VERSION;
    mail($fields["to"],$fields["subject"],$fields["message"],$headers);
}

//generates the body for the email
function generateBody($fields){
    return '<h2>'.exactGreeting($fields['event']).' '.$fields['name'].'</h2>
            <p>'.$fields['message'].'</p>
            <img src="https://loremflickr.com/1000/1000/'.generateEventKeyword($fields['event']).'" alt="image">';
}

//generates the html for the email
function generateHtml($body){
    return '<html>
                <head>
                </head>
                <body>
                '.$body.'
                </body>
            </html>';
}
?>