
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style type="text/css">
        
        
    </style>
</head>
<body>
    
        <div class="container mb-3 mt-2 d-flex justify-content-center align-items-center flex-column">
        <div class="row" style="margin-top: 50px">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Company Catalog</h2>
                </div>
            </div>
        </div><br><br>
        <div  class="mb-3">
                <form action="{{ route('companies.search') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search..." style="font-size: 20px;">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" ><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        <div class="pull-right mb-2" style="margin-left: 900px">
            <a class="btn btn-success" href="{{ route('companies.create') }}"><i class="fas fa-plus"></i></a>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                
                    <th width="190px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        
                        <td>
                            <form id="deleteForm{{$company->id}}" action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}"><i class="fas fa-eye"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$company->id}}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="myModal{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ $company->photo }}" style="width: 100%;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this company?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="submit" form="deleteForm{{$company->id}}" class="btn btn-danger">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
