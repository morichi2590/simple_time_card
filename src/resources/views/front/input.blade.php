@extends('front.app')
@section('content')
<form method="POST" id="punchForm" action="action" class="bg-white shadow-md">
    @csrf
    <div class="flex justify-center py-4 text-2xl tracking-wide">
        <label class="pr-2 flex items-center">PIN</label>
        <input type="password" name="pin" autocomplete="off" class="w-36 text-center border-b-2 border-t-0 border-l-0 border-r-0">
        <input type="hidden" name="user_id" value="{{ $user_id }}">
    </div>

    @if( $errors->any() )
    <div class="flex justify-center py-1 tracking-wide">
        <p class="text-red-600">{{ $errors->first('pin') }}</p>
    </div>
    @endif

    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 gap-8 text-white text-center font-bold">
            @foreach($work_status as $value)
            @if($value['enable'] == 1 )
            <button name="submit" onclick=submitClick() class="p-2 bg-blue-500 rounded-md w-24" value="{{ $value['id'] }}" data-action="{{ $value['button_url'] }}">{{ $value['label'] }}</button>
            @else
            <button name="submit" onclick=submitClick() class="p-2 bg-slate-300 rounded-md w-24" value="{{ $value['id'] }}" data-action="{{ $value['button_url'] }}" disabled>{{ $value['label'] }}</button>
            @endif
            @endforeach
        </div>
    </div>
    <div class="flex justify-center py-4">
        <div class="text-white text-center text-black">
            <a href="{{ $index_url }}" class="p-1 w-24">キャンセル</a>
        </div>
    </div>
</form>


@endsection