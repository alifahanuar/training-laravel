<x-mail::message>
Salam {{ $item->user->name }}

Anda ditugaskan untuk mengurusan alat dengan maklumat seperti berikut:
1. {{ $item->title }}
2. {{ $item->details }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
