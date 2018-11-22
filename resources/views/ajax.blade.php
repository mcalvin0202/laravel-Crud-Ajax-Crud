<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link rel="stylesheet" href="{{ asset('public/css/app.css')}}"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.9/js/jquery.dataTables.js"></script>
    <title>Ajax Crud Laravel</title>
</head>
<body>
     <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
    
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
    
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
    
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <ul class="dropdown-menu" role="menu">
                                       
                                        <li>
                                                <a href="{{action('CrudController@create')}}">
                                                    Ajax Crud Sample
                                                </a>
                                            </li>
                                            <li>
                                            <a href="{{action('PostController@index')}}">
                                                        Laravel Crud Sample
                                                    </a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                                    </li>
            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
    <div class="container">
        <p>
            <h1>Ajax CRUD Laravel</h1>
        </p>
        <div class="row">
            <div class="col-md-8">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Author</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <form action="">
                    <div class="form-group myid">
                        <label>ID</label>
                        <input type="number" id="id" class="form-control" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea id="detail" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="author" class="form-control">
                    </div>
                    <button type="button" id="save" onclick="saveData()" class="btn btn-primary">Submit</button>
                    <button type="button" id="update" onclick="updateData()" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#datatable').DataTable();
        $('#save').show();
        $('#update').hide();
        $('#myid').hide();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function viewData(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/blog/cruds",
                success: function(response){
                    var rows ="";
                    $.each(response, function(key, value){
                        rows = rows + "<tr>";
                        rows = rows + "<td>"+value.id+"</td>";
                        rows = rows + "<td>"+value.name+"</td>";
                        rows = rows + "<td>"+value.detail+"</td>";
                        rows = rows + "<td>"+value.author+"</td>";
                        rows = rows + "<td width='180'>";
                        rows = rows + "<button type='button' class='btn btn-warning' onclick='editData("+value.id+")'>Edit</button>";
                        rows = rows + "<button type='button' class='btn btn-danger' onclick='deleteData("+value.id+")'>Delete</button>"
                        rows = rows + "</td></tr>";

                    });
                    $('tbody').html(rows);
                }
            })
        }
        viewData();
     
        function saveData(){

            var name =  $('#name').val();
            var detail =  $('#detail').val();
            var author =  $('#author').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data:{name:name,detail:detail,author:author},
                url: '/blog/cruds',
                success: function(response){
                    viewData();
                    clearData();
                    $('#save').show();
                }
            })
        }
        
        function clearData(){
            $('#id').val('');
            $('#name').val('');
            $('#detail').val('');
            $('#author').val('');
        }
        function editData(id,name,detail,author){
            $('#save').hide();
            $('#update').show();
            $('.myid').show();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/blog/cruds/'+id+"/edit",
                success: function(response){
                    $('#id').val(response.id);
                    $('#name').val(response.name);
                    $('#detail').val(response.detail);
                    $('#author').val(response.author);
                }
            })
        }
        function updateData(){
            var id =  $('#id').val();
            var name =  $('#name').val();
            var detail =  $('#detail').val();
            var author =  $('#author').val();
            $.ajax({
                type: 'PUT',
                dataType: 'json',
                data:{name:name,detail:detail,author:author},
                url: '/blog/cruds/'+id,
                success: function(response){
                    viewData();
                    clearData();
                    $('#save').show();
                    $('#update').hide();
                    $('#myid').hide();
                }
            })
        }
        function deleteData(id){
            $.ajax({
                type: 'DELETE',
                dataType: 'json',
                url: '/blog/cruds/'+id,
                success: function(response){
                    viewData();
                }
            })
        }
    </script>
    
</body>
</html>