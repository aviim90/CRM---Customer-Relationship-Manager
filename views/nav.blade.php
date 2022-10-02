<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Navigation</title>
</head>
<body>
<nav class="navbar bg-light">
    <div class="container-fluid">
        @if ($user->canEdit())
        <span class="navbar-brand mb-0 h1">Welcome Super Admin!</span>
        @else
            <span class="navbar-brand mb-0 h1">Welcome Admin!</span>
        @endif
        @foreach($user->getNavigation() as $item)
            <a class="btn btn-danger mt-3" href="{{$item['link']}}">{{$item['name']}}</a>
        @endforeach
    </div>
</nav>
</body>
</html>
