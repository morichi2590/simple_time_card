<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight text-center">
                <p id="nowDate" class="text-base"></p>
                <p id="nowTime" class="text-xl"></p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($emloyeeList as $employee)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{$employee->name_last.' '.$employee->name_first}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        function showClock1() {
            var nowTime      = new Date();
            var nowMonth     = nowTime.getMonth() + 1;
            var nowDate      = nowTime.getDate();
            var nowHour      = nowTime.getHours();
            var nowMin       = nowTime.getMinutes();
            var nowSec       = nowTime.getSeconds();
            var dayOfWeek    = nowTime.getDay() ;
            var dayOfWeekStr = [ "日", "月", "火", "水", "木", "金", "土" ][dayOfWeek] ;

            var date = nowMonth + "月" + nowDate + "日" + "（" + dayOfWeekStr + "）";
            var time = nowHour + ":" + nowMin + ":" + nowSec;
            document.getElementById("nowDate").innerHTML = date;
            document.getElementById("nowTime").innerHTML = time;
        }
        setInterval('showClock1()',1000);
    </script>

</x-app-layout>
