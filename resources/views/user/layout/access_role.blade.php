 @php
    $priviledge = App\Classes\Session::get('priviledge');
@endphp
@if($priviledge === 'Admin')
    @extends('user.layout.base')
@elseif($priviledge === 'Staff')
    @extends('user.layout.staffmenu')
@endif

