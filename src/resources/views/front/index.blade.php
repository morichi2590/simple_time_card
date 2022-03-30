@extends('front.app')
@section('content')
<ul class="divide-y divide-solid">
    @foreach($emloyeeList as $employee)
    <li>
        <a href="{{route('timecard.input',[ 'shop_code' => $shop_id ,'id' => $employee->id ])}}" class="bg-white flex flex-row py-3">
            <div class="basis-1/4 flex justify-center"><div class="border-solid border-2 shadow-sm w-14 h-14 rounded-full"><img class="object-cover rounded-full" src="avator.png" alt=""></div></div>
            <div class="basis-1/2 flex items-center"><p class="text-lg">{{$employee->name_last.' '.$employee->name_first}}</p></div>
            <div class="basis-1/4 flex items-center"><div class="flex-col"><p>出勤 10:00</p><p>退勤 --:--</p></div></div>
        </a>
    </li>
    @endforeach
</ul>
@endsection