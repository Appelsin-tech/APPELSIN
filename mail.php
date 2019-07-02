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
    $mail->Host = 'smtp.yandex.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@appelsin.tech'; // имя пользователя google
    $mail->Password = 'e4BnwBVybY9b'; // пароль на google
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('info@appelsin.tech', 'Отправитель');
    $mail->addAddress('info@appelsin.tech', 'Получатель');

    if (empty(trim($data->name))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'name';
        $script_result['message'] = 'Поле name не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
    } else if (empty(trim($data->phone))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'phone';
        $script_result['message'] = 'Поле phone не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
    } else if (empty(trim($data->email))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'email';
        $script_result['message'] = 'Поле email не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
    } else if (empty(trim($data->message))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'message';
        $script_result['message'] = 'Поле message не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
    }

    $user_name = htmlspecialchars($data->name);
    $user_phone = htmlspecialchars($data->phone);
    $user_email = htmlspecialchars($data->email);
    $user_message = htmlspecialchars($data->message);

    if ($data->nameForm == "calculate") {
        $price = $data->price;

        $questions = $data->questions;

        $listQuestions = [];

        foreach ($questions as $item) {
            $listQuestions[] = "<li> $item </li>";
        }
        $questions = implode('', $listQuestions);

        $message = "<div style='font-size: 20px'>
                        <b>Заявка с апельсина</b>
                        <br>
                        <p>Форма калькулятора</p>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                        <p>Почта: $user_email</p>
                        <p>Выбранные вопросы: 
                        <ul>$questions</ul>
                        </p>
                        <p>Текст сообщения: $user_message</p>
                        <br>
                        <p>Примерная стоимость: $price</p>
                    </div>";

        $mail->Subject = 'Заявка с Аппельсина';
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
    } else if ($data->formName == "contacts") {
        $message = "<div style='font-size: 20px'>
                        <b>Заявка с апельсина</b>
                        <br>
                        <p>Форма контактов</p>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                        <p>Почта: $user_email</p>
                        <p>Текст сообщения: $user_message</p>
                        <br>
                    </div>";

        $mail->Subject = 'Заявка с Аппельсина';
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
