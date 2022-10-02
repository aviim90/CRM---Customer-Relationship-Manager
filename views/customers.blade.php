<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Customer Table</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <p>Customers</p>
                    @if($user->canEdit())
                    <a class="btn btn-warning" href="addNewCustomer.php">Add Customer</a>
                    @endif
                </div>
                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Date</th>
                            <th>Conversation</th>
                            @if($user->canEdit())
                            <th></th>
                            <th></th>
                            @endif
                        </tr>
                        </thead>
                        @foreach($customers as $customer)
                            <tbody>
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->surname}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->position}}</td>
                                <td>{{$customer->getCompany()->name}}</td>
                                <td>{{$customer->getConversations($customer->id)->date}}</td>
                                <td>{{$customer->getConversations($customer->id)->conversation}}</td>
                                @if($user->canEdit())
                                <td><a class="btn btn-success" href="editCustomer.php?id={{$customer->id}}">Update</a></td>
                                <td><a class="btn btn-danger" href="?deleteCustomer_id={{$customer->id}}">Delete</a></td>
                                @endif
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

