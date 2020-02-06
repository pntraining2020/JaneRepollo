<html>

<head>
    <title>Clock In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
        crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GALA</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class='row mt-5 '>
            <div class="col-sm-4 mt-5">
                <div class='mt-5'>
                    <div>
                        <form>
                        <label>Name:</label>
                        <select name='name' id='name' class="form-control">
                            @foreach($employees as $employee)
                                <option id={{ $employee->id }}>{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        </form>
                    </div>
                </div>
                <p class='mt-5 display-3 position-relative' id="time"></p>
            </div>
            <div class="col-sm-4 mt-5">
                <center>
                    <form action="{{route('clockin')}}" method='post'>
                        @csrf
                        <input type="number" class='employee_id' name='employee_id' value=''hidden>
                        <input type="text" id='timein' name='clock_in' value=''hidden>
                        <button class='btn-lg btn-primary'type='submit' id='clock_inbtn'>Clock In</button>
                    </form>
                    <form action="{{route('clockout')}}" method='post'>
                        @csrf
                        <input type="number" class='employee_id' name='employee_id' value=''hidden>
                        <input type="text" id='timeout' name='clock_out' value=''hidden>
                        <button class='btn-lg btn-primary'type='submit' id='clock_outbtn'>Clock Out</button>
                    </form>
                </center>
            </div>
            <div class="col-sm-4 mt-5">
                <center>
                    <p class='display-4'>BREAK</p>
                    <button class='btn-lg btn-primary'>Start</button>
                    <button class='btn-lg btn-warning'>End</button>
                </center>
            </div>
        </div>
    </div>

    <div class='container'>
        <div class='row text-center'>
            
        </div>
    </div>

    <script>
        $(document).ready(function () {
            console.log("helloo")
            var id = $('option').attr('id');
            window.setInterval(ut, 1000);
            function ut() {
                var date = new Date();
                document.getElementById("time").innerHTML = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            }
            
            $('#clock_inbtn').click(function() {
                var date= new Date();
                var name = $('#name').val();
                id = $('option').attr('id');
                $('.employee_id').val(id);
                $('#timein').val(date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }))
            })

            $('#clock_outbtn').click(function() {
                var date= new Date();
                var name = $('#name').val();
                id = $('option').attr('id');
                console.log(id);
                $('.employee_id').val(id);
                $('#timeout').val(date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }))
                console.log(id);
            })
        })



    </script>
</body>

</html>