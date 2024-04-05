<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <th>USER ID</th>
            <th>IMAGE ID</th>
            <th>IMAGE</th>
            <th>CREAT</th>
        </thead>
        <hr>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $album->id }}</td>
                    <td>{{ $album->image_id }}</td>
                    <td><img src="{{ url('public/Image/'.$album->image) }}"
                        style="height: 100px; width: 150px;"></td>
                    <td>{{ $album->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
