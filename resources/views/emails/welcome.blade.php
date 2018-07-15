<!DOCTYPE html>
<html>
<head>
    <title>Добро пожаловать на сайт Freelance.kg</title>
</head>
<body>
<h2>Здравствуйте, {{ $user['login'] }}! Вы успешно прошли регистрацию на сайте Freelance.kg</h2>
<h2><a href="https://freelance.kg/verify/{{$token}}">Активировать</a></h2>
<br/>
Чтобы активировать аккаунт необходимо войти и заполнить ваш профиль по <a href="https://freelance.kg/ru/sign_in/">ссылке</a><br/>
Если у Вас возникнут вопросы обратитесь в нашу <a href="mailto:support@freelance.kg">службу поддержки</a>.<br/>
<hr>
Приятной работы,<br/>
Команда Freelance.kg<br/>
</body>
</html>
