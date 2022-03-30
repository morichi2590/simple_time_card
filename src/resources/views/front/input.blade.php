@extends('front.app')
@section('content')
<form class="bg-white shadow-md">
    <div class="flex justify-center py-4 text-2xl tracking-wide">
        <label class="pr-2">PIN</label>
        <input type="password" autocomplete="off" class="w-36 text-center border-b-2 focus:outline-none focus:border-b-2 focus:border-indigo-500">
    </div>

    <div class="flex justify-center py-1 tracking-wide">
        <p class="text-red-600">PINコードが間違っています</p>
    </div>

    <div class="flex justify-center py-4">
        <div class="grid grid-cols-2 gap-8 text-white text-center font-bold">
            <input type="button" value="出勤" class="p-2 bg-blue-500 rounded-md w-24">
            <input type="button" value="退勤" class="p-2 bg-slate-300 rounded-md w-24">
            <input type="button" value="休憩開始" class="p-2 bg-slate-300 rounded-md w-24">
            <input type="button" value="休憩終了" class="p-2 bg-slate-300 rounded-md w-24">
        </div>
    </div>
    <div class="flex justify-center py-4">
        <div class="text-white text-center font-bold">
            <input type="button" value="キャンセル" class="p-1 w-24 text-black">
        </div>
    </div>
</form>
@endsection