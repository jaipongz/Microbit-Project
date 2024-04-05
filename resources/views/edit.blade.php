<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            /* background-color: aqua; */
            text-align: center;
            width: 25%;
            border: solid 2px #000000;
            margin-top: 3rem;

        }

        .mydata {
            /* background-color: #f3a633; */
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .mycontrol {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <div class="container" id="Messi">
        <h3 class="mt-3">เจ้าของ</h3>
        <hr>
        <form action="{{ route('update', ['model' => $users]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mycontent">
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">ID :</label>
                    <label>{{ $users->id }}</label>
                </div>
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">ชื่อ :</label>
                    <input type="text" name="nameold" value="{{ $users->name }}">
                </div>
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">นามสกุล :</label>
                    <input type="text" name="lastold" value="{{ $users->last }}">
                </div>
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">เบอร์โทร :</label>
                    <input type="text" name="telold" value="{{ $users->tel }}">
                </div>
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">E-Mail :</label>
                    <input type="text" name="emailold" value="{{ $users->email }}">
                </div>
            </div>

            <div class="mycontrol">
                <a href="{{ route('index') }}" class="btn btn-secondary">Cancle</a>
                <a href="{{ route('create') }}" class="btn btn-primary">Add</a>
                <button class="btn btn-warning">Save</button>
        </form>
        <form action="{{route('destroy',['users'=>$users->id])}}" method="POST">
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')">Delete</button>
            @method('DELETE')
        </form>
    </div>
    </div>

</body>

</html>
