<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://unpkg.com/vue@next"></script>

</head>

<body class="bg-gray-100">

    @include('front.clock')

    <main class="w-full my-8">
        @yield('content')
    </main>

</body>

<script>    
    const clock = {
        data() {
            return {
                time: '0月0日',
                date: '--:--:--'
            }
        },
        mounted() {
            setInterval(this.updateDateTime, 1000)
        },
        methods: {
            updateDateTime(){
                const now = new Date()
                let nowMonth     = now.getMonth() + 1;
                let nowDate      = now.getDate();
                let nowHour      = now.getHours();
                let nowMin       = now.getMinutes();
                let nowSec       = now.getSeconds();
                let dayOfWeek    = now.getDay() ;
                let dayOfWeekStr = [ "日", "月", "火", "水", "木", "金", "土" ][dayOfWeek];
                this.time = nowHour + ":" + nowMin + ":" + nowSec;
                this.date = nowMonth + "月" + nowDate + "日" + "（" + dayOfWeekStr + "）";
            }
        }
    }
    Vue.createApp(clock).mount('#clock');

    // 出勤ボタン系のボタンの制御(クリックしたら指定のアクションを実行できるように)
    function submitClick(){
        let elm       = event.target;
        let actionUrl = elm.getAttribute("data-action");
        document.getElementById("punchForm").action = actionUrl;
    }

    // 通知エリアを5秒タイマーで非表示にする
    function displayOffTimer(){
        let el = document.getElementById("notification");
        if( el ){
            setTimeout(function(){
                el.style.display = "none";
            },5000);
        }
    }
    displayOffTimer();

</script>

</html>
