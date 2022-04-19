@extends('front.app')
@section('content')

@if( session('notification') )
<div id="notification">
    <div class="w-full bg-green-400 shadow-md opacity-75">
        <div class="box-center py-2 text-center">
            <h2 class="text-base text-white">{{session('notification')}}</h2>
        </div>
    </div>
</div>
@endif
<ul class="divide-y divide-solid">
    @foreach($userList as $user)
    <li>
        <a href="{{ $user->input_url }}" class="bg-white flex flex-row py-3">
            <div class="px-2"></div>
            <div class="basis-1/2 flex items-center"><p class="text-lg">{{$user->name}}</p></div>
            <div class="basis-1/4 flex items-center"><div class="flex-col"><p>出勤 {{ $user->work_start }}</p><p>退勤 {{ $user->work_end }}</p></div></div>
            <div class="basis-1/4 flex items-center"><div class="flex-col"><p>休始 {{ $user->break_start }}</p><p>休終 {{ $user->break_end }}</p></div></div>
        </a>
    </li>
    @endforeach
</ul>
@endsection