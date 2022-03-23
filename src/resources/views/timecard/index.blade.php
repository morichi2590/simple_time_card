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
            <div id="modalOpen" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{$employee->name_last.' '.$employee->name_first}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="easyModal" class="modal w-full hidden fixed z-10">
        <div class="modal-content rounded z-20">
            <div class="modal-header">
                <x-button class="ml-3">出勤</x-button>
                <x-button class="ml-3">退勤</x-button>
                <span class="modalClose"></span>
            </div>
        </div>
    </div>

    <style>
        .modal {
            left: 0;
            top: 0;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            width: 80%;
            max-width: 600px;
            padding: 50px;
            background-color: #fff;
            animation-name: modalopen;
            animation-duration: 1s;
        }
        .modalClose {
            font-size: 2rem;
        }
        @keyframes modalopen {
            from {opacity: 0}
            to {opacity: 1}
        }
    </style>

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

        const buttonOpen = document.getElementById('modalOpen');
        const modal = document.getElementById('easyModal');
        const buttonClose = document.getElementsByClassName('modalClose')[0];

        //ボタンがクリックされた時
        buttonOpen.addEventListener('click', modalOpen);
        function modalOpen() {
            modal.style.display = 'block';
        };

        //バツ印がクリックされた時
        buttonClose.addEventListener('click', modalClose);
        function modalClose() {
           modal.style.display = 'none';
        };

        //モーダルコンテンツ以外がクリックされた時
        addEventListener('click', outsideClose);
        function outsideClose(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
            };
        };
    </script>

</x-app-layout>
