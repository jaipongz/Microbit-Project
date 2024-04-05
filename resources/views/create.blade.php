<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container{
            /* background-color: aqua; */
            text-align: center;
            width: 25%;
            border: solid 2px #000000;
            margin-top: 3rem;
        }
        .mydata{
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
        .mycontrol{
            display: flex;
            justify-content: center; 
            margin-top: 2rem;
            gap: 1rem;
            margin-bottom: 2rem;

        }
        .message{
            color: #ff3a3a;
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>



<body>
    <div class="container" id="Messi">
        <h3 class="mt-3">Create</h3>
        <hr>
        <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mycontent">
                
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">ชื่อ :</label>
                    <input type="text" name="name" >
                </div>
                @error('name')
                    <span class="message">{{$message}}</span>
                @enderror
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">นามสกุล :</label>
                    <input type="text" name="last" >
                </div>
                @error('last')
                    <span class="message">{{$message}}</span>
                @enderror
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">เบอร์โทร :</label>
                    <input type="text" name="tel" >
                </div>
                @error('tel')
                    <span class="message">{{$message}}</span>
                @enderror
                <div class="mydata">
                    <label class="col-form-label bg-success text-white px-3 rounded-pill">E-Mail :</label>
                    <input type="text" name="email" >
                </div>
                @error('email')
                    <span class="message">{{$message}}</span>
                @enderror

            </div>

            <div class="mycontrol">
                <a href="{{ route('index') }}" class="btn btn-secondary">Cancle</a>
                <button class="btn btn-success">Create</button>
        </form>
    </div>
    </div>
</body>

</html>
