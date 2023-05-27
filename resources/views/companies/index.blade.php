<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PROJECT CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-2 d-flex justify-content-center align-items-center flex-column">
        <div class="row" style="margin-top: 50px">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>PROJECT CRUD</h2>
                </div>
            </div>
        </div>
        <div class="pull-right mb-2" style="margin-left: 900px">
            <a class="btn btn-success" href="{{ route('companies.create') }}"><i class="fas fa-plus"></i></a>
        </div>
        <div class="mb-3">
    <form action="{{ route('companies.index') }}" method="GET" class="form-inline">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request()->session()->get('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered" style="color: black">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}"><i class="fas fa-eye"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center">
            {{ $companies->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</body>
</html>
