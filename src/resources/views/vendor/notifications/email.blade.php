{{-- filepath: /home/madam/coachtech/laravel/模擬案件/FM-APP/src/resources/views/vendor/notifications/email.blade.php --}}
@component('mail::message')
# メール認証のお願い

登録していただいたメールアドレスに認証が必要です。以下のボタンをクリックして認証を完了してください。

@component('mail::button', ['url' => $actionUrl])
メール認証を完了する
@endcomponent

もしこのメールに心当たりがない場合は、何もせずに削除してください。

ありがとうございます。  
{{ config('app.name') }}
@endcomponent