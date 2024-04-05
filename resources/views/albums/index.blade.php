<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Albums</title>
</head>
<body>
    
    <h1>Albums {{$user}}</h1>
    <form action="{{route('albums.store',['user_id'=>$user])}}"method="POST" action="/upload" enctype="multipart/form-data">
        @csrf
        <label for="">Input your Files</label>
        <input type="file" name="image" id="image">
        <button type="submit">Upload</button>
    </form>
    <form action="{{route('albums.prompt')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Promt</label>
        <input type="text" name="prompt">
        <button type="submit">GEN</button>
    </form>
    
</body>
</html>