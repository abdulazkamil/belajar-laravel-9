<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if(Auth::check())
<form action="{{route('logout')}}" method="post">
@csrf
<button type="submit">Log Out</button>
<p> Name : {{$user->name}}</p>
     <p> ID : {{$user->id}}</p>
</form>
@else
<a href="{{route('login')}}">Login</a>
<a href="{{route('register')}}">Register</a>

@endif


    <table border=1px>
        <tr>
            <th> ID</th>
            <th> Nama </th>
            <th> Score </th>
            <th> Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td> {{$student -> id}}</td>
            <td> <a href="{{route('show', $student->id)}}" >{{$student-> name}}</a></td>
            <td> {{$student -> score}}</td>
            <td> 
                <form action="{{route('edit', $student)}}" method="get">
                    @csrf
                    <button type="submit"> Edit</button>
                </form>
                <form action="{{route('delete', $student)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <br>
    <br>


    <table border=1px>
        <tr>
            <th> ID</th>
            <th> Nama </th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td> 
                {{$teacher -> id}}
            </td>
            <td> 
                {{$teacher -> name}}
            </td>
        </tr>
        @endforeach
    </table>

    Current page : {{ $students->currentPage()}} <br>
    Total data : {{ $students->total()}} <br>
    Data per Page : {{ $students->perPage()}} <br>


     {{$students->links('pagination::bootstrap-4')}}
</body>
</html>