<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$data = json_decode(file_get_contents("php://input"));
$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->Host = 'smtp.google.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mrpelkin@gmail.com'; // имя пользователя google
    $mail->Password = 'MIRKINO16'; // пароль на google
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('mrpelkin@gmail.com', 'Отправитель');
    $mail->addAddress('mrpelkin@gmail.com', 'Получатель');

    if ($data->formName == "GetConsultation") {
        if (empty(trim($data->name))) {
            $script_result['title'] = 'Ошибка';
            $script_result['message'] = 'Поле name не может быть пустым!';
            $script_result['type'] = 'error';
            echo json_encode($script_result);
            exit;
        } else if (empty(trim($data->phone))) {
            $script_result['title'] = 'Ошибка';
            $script_result['message'] = 'Поле phone не может быть пустым!';
            $script_result['type'] = 'error';
            echo json_encode($script_result);
            exit;
        }
        $theme_message = htmlspecialchars($data->secName);
        $user_name = htmlspecialchars($data->name);
        $user_phone = htmlspecialchars($data->phone);

        $message = "<div style='font-size: 20px'>
                        <b>$theme_message</b>
                        <br>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                    </div>";

        $mail->Subject = 'Quantum Consultation';
        $mail->Body = $message;
        $mail->send();

        if ($mail) {
            $script_result['title'] = 'Успешно';
            $script_result['message'] = 'Ваша заявка принята!';
            $script_result['type'] = 'success';
        } else {
            $script_result['title'] = 'Ошибка';
            $script_result['message'] = 'Письмо не отправлено!';
            $script_result['type'] = 'error';
        }
        echo json_encode($script_result);

    } else if ($data->formName == "GetLinkVebinar") {
        if (empty(trim($data->name))) {
            $script_result['title'] = 'Ошибка';
            $script_result['message'] = 'Поле name не может быть пустым!';
            $script_result['type'] = 'error';
            echo json_encode($script_result);
            exit;
        } else if (empty(trim($data->phone))) {
            $script_result['title'] = 'Ошибка';
            $script_result['message'] = 'Поле phone не может быть пустым!';
            $script_result['type'] = 'error';
            echo json_encode($script_result);
            exit;
        }
        $formName = "Запись на вебинар!";
        $user_name = htmlspecialchars($data->name);
        $user_phone = htmlspecialchars($data->phone);
        $user_email = htmlspecialchars($data->email);

        $message = "
                    <div style='font-size: 20px'>
                        <b>Запись на вебинар</b>
                        <br>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                        <p>Email: $user_email </p>
                    </div>";

        $mail->Subject = 'Quantum link vebinar';
        $mail->Body = $message;
        $mail->send();

        if ($mail) {
            $script_result['title'] = 'Успешно';
            $script_result['message'] = 'Ваша заявка принята!';
            $script_result['type'] = 'success';
        } else {
            $script_result['title'] = 'Ошибка';
            $script_result['message'] = 'Письмо не отправлено!';
            $script_result['type'] = 'error';
        }
        echo json_encode($script_result);
    }

} catch (Exception $e) {
    echo json_encode([
        'title' => 'Ошибка',
        'message' => $mail->ErrorInfo,
        'type' => 'error'
    ]);
}
