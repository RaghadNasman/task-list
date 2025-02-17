<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello, $name</h1>{{-- print $name as text --}}
    <h1>Hello, <?php echo $name ?></h1>{{-- print $name value (old way) --}}
    <h1>Hello, {{$name}}</h1>{{-- print $name value (laravel)=> directive --}}
    {{--           uri          method --}}
    <form action="about" method="post">
        @csrf   {{-- cross side requist forgary --}}
         <input type="text" name="name" id="name"><br/><br/>
         <select name="department" id="department">
            @foreach ($departments as $key => $department)
            <option value="{{$key}}">{{$department}}</option>
            @endforeach
            {{-- <option value="1">Tichnical</option> --}}
            {{-- <option value="2">Financial</option> --}}
            {{-- <option value="3">Sales</option> --}}
         </select><br/><br/>
         <input type="submit" value="Send">
    </form>
</body>
</html>
