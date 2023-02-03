<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
.buttonz {
  display:inline-block;
}
</style>
</head>
<body class="bg-info">
    <div class="container w-50 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3><b><center>Todo List App</center></b></h3><br>
                <form action="{{ route('store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your todo list">
                        <button type="submit" class="btn btn-dark px-4"><i class="bi bi-plus-lg"></i></button>
                    </div>
                </form><br>

            @if (count($todolists))
                <div class="bg-white w-100">
	            @foreach ($todolists as $todolist)
	                <div class="w-100 d-flex align-items-center justify-content-between">
		                <div class="p-4">@if ($todolist->complete ==0)
		                    <svg xmlns="http://www.w3.org/2000/sgv"class="icon icon-tabler icon-tabler-chevron-right" width="36" height="36" viewBox="0 0 24 24"stroke-width="1.5" stroke="#c14638" fill="none" stroke-linecap="round" stroke-linejoin="round">
	                        <path stroke="none" d="M0 0h24v24H0z"/>
	                        <polyline points="9 6 15 12 9 18"/>
                            </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
                @endif {{$todolist->content}}
                        </div>

                    <div class="mr-4 d-flex align-items-center">
                    @if ($todolist->complete ==0)
	                <form action="{{ route('update' , $todolist->id)}}" method="POST" >
                        @csrf
                        @method('put')
                        <input type="text" name="completed" value="1" hidden>
                        <button class="btn btn-success">Mark as Completed</button>
                    </form>
                    @else
                    <form action="{{ route('update' , $todolist->id)}}" method="POST" >
                        @csrf
                        @method('put')
                        <input type="text" name="completed" value="0" hidden>
                        <button class="btn btn-warning">Mark as Uncompleted</button>
                    </form>
                    @endif
                    <form class="form-inline" action="{{ route('destroy' , $todolist->id)}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="form-group">
                        <button class="border-0 bg-transparent ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7l16 0"></path>
                            <path d="M10 11l0 6"></path>
                            <path d="M14 11l0 6"></path>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg></button>
                        </div>
                    </form>
                </div>
                </div>
                @endforeach
            @else
            <p class="text-center mt-3">No task!</p>
            @endif
            </div>
            @if (count($todolists))
                <div class="">
                <center>You have {{ $incomplete->count()}} pending tasks.</center>
                </div>
                
            @else
                
            @endif
        </div>
    </div>
</body>
</html>