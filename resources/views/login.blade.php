<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kafetaria | Login</title>
    <link href="{{ asset('css\form.css') }}" rel="stylesheet">
</head>

<body>
    <form action="menu">
        <h1>Select Customer</h1>
        <p>Choose the customer's name</p>
        <div class="formcontainer">
            <div class="container">
                <select name="user" id="lang">
                    @foreach ($customerList as $customer)
                    <option value="{{$customer->id}}">{{$customer->CustomerName}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Next" />
            </div>
        </div>
    </form>
</body>

</html>
