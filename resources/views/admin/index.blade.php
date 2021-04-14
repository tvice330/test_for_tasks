<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .fz-22 {
            font-size: 22px;
        }
        li > span {
            font-size: 1rem;
        }

    </style>
    <title>Todo list</title>
</head>
<body>
<div class="container">
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="btn btn-secondary  mt-5" type="submit">Logout</button>
    </form>

    <h2 class="text-center mt-5">TASKS</h2>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if($values->total() > 0)
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Text</th>
                        <th scope="col">Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($values as $value)
                        <tr>
                            <td>{{ $value->text }}</td>
                            <td>{{ $value->status == true ? 'edit admin' : '' }}</td>
                            <td>
                                <a href="{!! route('admin.tasks.edit', $value->id) !!}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.tasks.destroy', $value->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $values->links() }}
            @else
                <h5 class="text-center mt-5">Tasks not found</h5>
            @endif
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
