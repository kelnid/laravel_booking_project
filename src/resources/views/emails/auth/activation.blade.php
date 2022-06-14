@component('mail::message')
# Подтверждение почты

Благодарим за регистрацию на сайте Travelmore.com, пожалуйста активируйте ваш аккаунт

@component('mail::button', ['url' => route('activate', ['token' => $user->activation_token,'email' => $user->email])])
    Активировать
@endcomponent

@endcomponent
