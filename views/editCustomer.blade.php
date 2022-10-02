<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Edit Customer</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5 mb-5">
                <div class="card-header">Edit Customer</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="{{$editCustomer->id}}" >
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" value="{{$editCustomer->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Surname</label>
                            <input name="surname" type="text" class="form-control" value="{{$editCustomer->surname}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input name="phone" type="text" class="form-control" value="{{$editCustomer->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control" value="{{$editCustomer->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input name="address" type="text" class="form-control" value="{{$editCustomer->address}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Position</label>
                            <input name="position" type="text" class="form-control" value="{{$editCustomer->position}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Company</label>
                            <select class="form-control" name="company_id">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}" {{$editCustomer->company_id == $company->id ? 'selected' : ''}}>{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date</label>
                            <input name="date" type="date" class="form-control" value="{{$conversation->date}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Conversation</label>
                            <input name="conversation" type="text" class="form-control" value="{{$conversation->conversation}}">
                        </div>



                        <button class="btn btn-success">Update</button>
                        <a href="index.php" class="btn btn-info float-end">Back</a>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

