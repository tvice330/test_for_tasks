@if($values->total() > 0)
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="cursor-pointer sort" data-sort="name" data-method='{{ $method }}'>User Name</th>
            <th scope="col" class="cursor-pointer sort" data-sort="email" data-method='{{ $method }}'>Email</th>
            <th scope="col">Text</th>
            <th scope="col" class="cursor-pointer sort" data-sort="status" data-method='{{ $method }}'>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($values as $value)
            <tr>
                <th>{{ $value->name }}</th>
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
