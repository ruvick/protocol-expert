<?
header("Access-Control-Allow-Origin: *"); 
// HTTP_ORIGIN
// REMOTE_ADDR
// REQUEST_METHOD
// print_r(json_encode($_SERVER));

if (
    ($_SERVER["HTTP_ORIGIN"] !== "https://localhost:3000")&&
    ($_SERVER["HTTP_ORIGIN"] !== "https://protocol-expert.ru")  
    
    ) {
        http_response_code(403);
        die($_SERVER["HTTP_ORIGIN"]);   
    }


    $to = 'rudikov-web@yandex.ru, info@bitronix24.ru'; 
    $subject = 'Обращение с сайта Protocol-Expert';
    $message = '
                <html>
                    <head>
                        <title>'.$_REQUEST["msg"].'</title>
                    </head>
                    <body>
                        <p>ФИО: '.$_REQUEST['name'].'</p>
                        <p>E-mail: '.$_REQUEST['mail'].'</p>      
                        <p>Сообщение: '.$_REQUEST['message'].'</p>                                
                    </body>
                </html>'; 
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Заявка с сайта Protocol-Expert <noreply@ipoteka-strah.ru/>\r\n";
        if (mail($to, $subject, $message, $headers)) {
            http_response_code(200);
            die(array());
        } else {
            http_response_code(403);
            die(array());
        }



?>