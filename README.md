# HTML-PARSER

## Реализуйте замену ссылок в тексте, отправленном через HTML-форму, а также со стороны HTML страницы.
___
- Получив текст, выполните замену всех тегов со ссылками на текст самих ссылок.
- Когда преобразование будет выполнено, создайте JSON объект с полем formatted_text, присвойте ему преобразованный текст и отправьте в ответе.
- В случае, если на входе вы получили пустой текст, отправьте пустой ответ с кодом 500. Код ответа можно указать с помощью функции http_response_code.
- Реализуйте HTML-форму для загрузки текста со сторонней HTML-страницы и передачи его в HtmlProcessor.php.
- Чтобы получить контент страницы по URL, используйте cURL. Для инициализации cURL используйте функцию curl_init. Страницу будем загружать с помощью HTTP метода GET.
- Получив текст, положите его в объект JSON (например, в поле raw_text). Чтобы создать из массива или объекта текст формата JSON, используйте функцию json_encode.
- С помощью cURL отправьте JSON в HtmlProcessor.php. Для этого перед curl_exec добавьте два вызова:
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json).
Где $json — это JSON.
- Получите результат curl_exec, и, в случае успешной обработки текста, выведите его в браузер. А в случае ошибки (код 500) — сообщите об ошибке.
___