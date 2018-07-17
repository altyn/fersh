<!DOCTYPE html>
<html>

<body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
    <table style="width: 100%;">
        <tr>
            <td style="background-color: #fff;">
                <h3 style="width: 70px; padding-left: 20px; color: #8e43e7;">Freelance.kg</h3>
            </td>
            <td style="padding-left: 50px; text-align: right; padding-right: 20px;">
                <a href="https://freelance.kg/verify/{{$token}}" style="color: #261D1D; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">Активировать</a>
                <a href="https://freelance.kg/password_reset" style="color: #7C2121; text-decoration: underline; font-size: 14px; margin-left: 20px; letter-spacing: 1px;">Напомнить пароль</a>
            </td>
        </tr>
    </table>
    <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
        <h1 style="margin-top: 0px;">Здравствуйте {{ $user }}!</h1>
        <div style="color: #636363; font-size: 14px;">
            <p>Вы успешно прошли регистрацию на сайте <a href="https://freelance.kg/">Freelance.kg.</a></p>
        </div>
        <div style="border: 2px solid #4B72FA; padding: 40px; margin: 40px 0px;">
            <h4 style="margin-bottom: 20px; margin-top: 0px; font-size: 18px; display: inline-block; border-bottom: 1px dotted #111;">Необходимые  шаги</h4>
            <table style="width: 100%;">
                <tr>
                    <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <div style="font-weight: bold; color: #4B72FA; font-size: 16px;">Подтвердить почту</div>
                        <div style="font-size: 14px; color: #B8B8B8;">Зтем войти</div>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <div style="font-weight: bold; color: #4B72FA; font-size: 16px;">Заполнить профиль</div>
                        <div style="font-size: 14px; color: #B8B8B8;">Легко и просто</div>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <div style="font-weight: bold; color: #4B72FA; font-size: 16px;">Добавить протфолио</div>
                        <div style="font-size: 14px; color: #B8B8B8;">Ваши лучшие работы</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="font-weight: bold; color: #4B72FA; font-size: 16px;">Выбрать тариф</div>
                        <div style="font-size: 14px; color: #B8B8B8;">Выбрать необходимый тариф</div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; border-top: 1px solid #eee">
                <tr>
                    <td>
                        <a href="https://freelance.kg/verify/{{$token}}"
                            style="padding: 8px 20px; background-color: #4B72FA; color: #fff;
                            font-weight: bolder; font-size: 16px; display: inline-block; margin: 10px 0px;
                            text-decoration: none;">Активировать профиль</a>
                    </td>
                </tr>
            </table>
        </div>
        <h4 style="margin-bottom: 10px;">Нужна помощь?</h4>
        <div style="color: #A5A5A5; font-size: 12px;">
            <p>Если у Вас возникнут вопросы при работе с сайтом свяжитесь с нами по этому адресу
                <a href="mailto:support@freelance.kg" style="text-decoration: underline; color: #4B72FA;">support@freelance.kg</a>
            </p>
        </div>
    </div>
    <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        <div style="margin-bottom: 20px;">
            <a href="https://freelance.kg/ru/contacts" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Контакты</a>
            <a href="https://freelance.kg/ru/termsofuse" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Terms of use</a>
            <a href="https://freelance.kg/ru/unsubscribe" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Отписаться</a>
        </div>
        <div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">Вы получили это письмо, так как вы зарегистрировались на нашем сайте</div>
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
            <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">БЦ "Victory", ул. С.Ибраимова 103, Бишкек, Кыргызстан</div>
            <div style="color: #A5A5A5; font-size: 10px;">{{ date('Y')  }}</div>
        </div>
    </div>
</div>
</body>

</html>