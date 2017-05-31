@foreach($mailSablonu as $mail)
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$mail->konu}}</title>
    </head>

    <body>
       {{$mail->mesaj}}
    </body>
</html>
@endforeach