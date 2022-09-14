<?php

if (!empty($_POST['parse'])) {
    try {
        $curlOne = curl_init($_POST['parse']);

        curl_setopt($curlOne, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curlOne, CURLOPT_HTTPGET, true);
        curl_setopt($curlOne, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlOne, CURLOPT_FAILONERROR, true);

        if (($response = curl_exec($curlOne)) === false) {
            echo 'Произошла ошибка: ' . curl_error($curlOne);
        }

        $request = json_encode(['raw_text' => $response]);

        $curlTwo = curl_init('http://' . $_SERVER['HTTP_HOST'] . '/skillbox/18/homework' . '/HtmlProcessor.php');

        curl_setopt($curlOne, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curlTwo, CURLOPT_POST, true);
        curl_setopt($curlTwo, CURLOPT_POSTFIELDS, $request);
        curl_setopt($curlTwo, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlTwo, CURLOPT_FAILONERROR, true);

        if (($responseTwo = curl_exec($curlTwo)) === false) {
            echo 'Произошла ошибка: ' . curl_error($curlTwo);
        }

        if ($json = json_decode($responseTwo, true)['formatted_text']) {
            $message = $json;
        } else {
            echo 'Произошла ошибка при преобразовании';
        }
    } catch (Exception $error) {
        $errorMessage = $error->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($message)) { ?>
    <div><?= $message ?></div>
<?php } else { ?>
    <form method="post" action="html_import_processor.php">
        <label for="">Введите URL
            <input type="text" name="parse">
        </label>
        <input type="submit" value="Отправить">
    </form>
<?php } ?>
</body>
</html>