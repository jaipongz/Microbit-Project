<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        .mybut {
            border: 0;
            background-color: transparent;
            width: 100%;
            text-align: left;
            padding: 1rem 0;
        }

        .modal-content {
            /* background-color: aqua; */
            align-items: center;
            width: 70%;
            margin-left: 3rem;
        }

        .modal-body {
            /* display: grid; */
            width: 90%;
            justify-content: space-between;
            /* background-color: #664949; */
        }

        .modal-data {
            display: flex;
            justify-content: space-between;
            margin: 1rem 0;

        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="mt-4">ค้นหาเจ้าของ</h3>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <th>Operation</th>
                <th>ID</th>
                <th>Name</th>
                <th>Tel</th>
                <th>E-Mail</th>
            </thead>
            <tbody>
                <?php
                foreach($users as $user) {
                    ?>
                {{-- {{dd($user->id)}} --}}
                <tr>
                    <td>
                        <a href="{{ route('edit', ['model' => $user->id]) }}" class="btn btn-warning"><span
                                class="material-symbols-outlined">south_east</span></a>
                        <a href="{{ route('albums.index', ['user' => $user->id]) }}">Albums</a>
                    </td>
                    <td id="id">{{ $user->id }}</td>
                    <td>
                        <button id="name" class="mybut">
                            {{ $user->name }} {{ $user->last }}
                        </button>
                    </td>
                    <td id="tel">{{ $user->tel }}</td>
                    <td id="email">{{ $user->email }}</td>
                </tr>


                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <div class="modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Data</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">

                    <div class="modal-data">
                        <label>ID :</label>

                        <label id="eid"></label>
                    </div>
                    <div class="modal-data">
                        <label>Name :</label>

                        <label id="ename"></label>
                    </div>
                    <div class="modal-data">
                        <label>Phone :</label>

                        <label id="etel"></label>
                    </div>
                    <div class="modal-data">
                        <label>E-Mail :</label>

                        <label id="eemail"></label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        $(Document).ready(function() {
            $('#myTable').DataTable();


        });

        $(Document).ready(function() {
            $(Document).on('click', '.mybut', function() {
                var id = $(this).closest('tr').find('#id').text();
                var name = $(this).closest('tr').find('#name').text();
                var tel = $(this).closest('tr').find('#tel').text();
                var mail = $(this).closest('tr').find('#email').text();

                $('#myModal').modal('show');
                $('#eid').text(id);
                $('#ename').text(name);
                $('#etel').text(tel);
                $('#eemail').text(mail);

            });
        });
    </script>

</body>

</html>
