@component('mail::message')
# Account Created

This is to inform you that your account have been created in our system. <i>Please, contact us for your account
    credentials.</i>
@component('mail::button', ['url' => ''])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
