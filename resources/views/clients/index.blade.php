<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Tasks</title>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">TASKS</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="{{ route('add_task') }}" class="btn btn-primary mt-2 mb-5">Add task</a>
            <div class="js_table" >
                @if($values->total() > 0)
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="cursor-pointer sort" data-sort="name" data-method="desc">User Name</th>
                            <th scope="col" class="cursor-pointer sort" data-sort="email" data-method="desc">Email</th>
                            <th scope="col">Text</th>
                            <th scope="col" class="cursor-pointer sort" data-sort="status" data-method="desc">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($values as $value)
                            <tr>
                                <th scope="row">{{ $value->name }}</th>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->text }}</td>
                                <td>{{ $value->status == true ? 'edit admin' : '' }}</td>
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
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).on("click", ".sort", function () {
        const value = $(this).attr('data-sort')
        const method = $(this).attr('data-method')
        var result = $.ajax({
            url: "sort/table",
            data: {
                sort: value,
                sortMethod: method
            },
        });
        result.done(function(response) {
            $('.js_table').html(response.response)
        })
    });

</script>
</body>
</html>
