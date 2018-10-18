<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<script type="text/javascript">
      $(document).ready(function() {
        

        $("[data-toggle='tooltip']").tooltip();

        $('.datatable').dataTable();

        $('[data-title=Delete]').on('click', function() {

        var id = $(this).attr("data-id");
        var category = $(this).attr('data-category');
        var name= $(this).attr('data-dname');
        $('.modal-record').html(id);
        $('.modal-name').html(name);
        $("input[name=id]").val(id);
        $("input[name=category]").val(category);
         });   

        //  $('[data-title=Edit]').on('click', function() {

        // var id = $(this).attr("data-id");
        // var category = $(this).attr('data-category');
        // $('.modal-record').html(id);
        // $("input[id=id]").val(id);
        // $("input[id=category]").val(category);
        //  });        
});
</script>  
<body>
  <a class="btn btn-outline primary" href="{{ url('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"></form>
<div class="container">
  <div class="row">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="user-tab" data-toggle="tab" href="#usertable" role="tab" aria-controls="usertable" aria-selected="true"><h2 class="text-center">Users</h2></a>

  </li>
  <li class="nav-item">
    <a class="nav-link" id="review-tab" data-toggle="tab" href="#reviewtable" role="tab" aria-controls="reviewtable" aria-selected="false"><h2 class="text-center">Reviews</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="product-tab" data-toggle="tab" href="#producttable" role="tab" aria-controls="producttable" aria-selected="false"><h2 class="text-center">Products</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="category-tab" data-toggle="tab" href="#categorytable" role="tab" aria-controls="categorytable" aria-selected="false"><h2 class="text-center">Categories</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="order-tab" data-toggle="tab" href="#ordertable" role="tab" aria-controls="ordertable" aria-selected="false"><h2 class="text-center">Order</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admintable" role="tab" aria-controls="admintable" aria-selected="false"><h2 class="text-center">Admin</h2></a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="usertable" role="tabpanel" aria-labelledby="user-tab">
    <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
      <a href="{{ action('AdminController@create', ['category' => 'users']) }}" class="btn btn-success">Create</a>
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>email_verified_at</th>
              <th>password</th>
              <th>Remember_token</th>
              <th>created_at</th>
              <th>updated_at</th>
                                <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>email_verified_at</th>
              <th>password</th>
              <th>Remember_token</th>
              <th>created_at</th>
              <th>updated_at</th>
                             <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </tfoot>

          <tbody>
            @foreach($user as $user)
            
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->email_verified_at }}</td>
              <td>{{ $user->password }}</td>
              <td>{{ $user->remember_token }}</td>
              <td>{{ $user->created_at }}</td>
              <td>{{ $user->updated_at }}</td>
                            <td>
                            <form method="post" action="{{ route('edit') }}">
                              <input type="hidden" name="category" value="users">
                              <input type="hidden" name="id" value="{{ $user->id }}">
                              <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></button>
                            </form></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-dname='{{ $user->name }}' data-category='users' data-id="{{ $user->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
            </tr>
            @endforeach
          </tbody>
        </table>

  </div>
  <div class="tab-pane fade" id="reviewtable" role="tabpanel" aria-labelledby="review-tab">
<table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
  <a href="{{ action('AdminController@create', ['category' => 'reviews']) }}" class="btn btn-success">Create</a>
            <thead>
            <tr>
              <th>rid</th>
              <th>pid</th>
              <th>pname</th>
              <th>username</th>
              <th>email</th>
              <th>review</th>
              <th>ip</th>
              <th>stars</th>
                                <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>rid</th>
              <th>pid</th>
              <th>pname</th>
              <th>username</th>
              <th>email</th>
              <th>review</th>
              <th>ip</th>
              <th>stars</th>
                             <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </tfoot>

          <tbody>
            @foreach($review as $review)
            <tr>
              <td>{{ $review->rid }}</td>
              <td>{{ $review->pid }}</td>
              <td>{{ $review->pname }}</td>
              <td>{{ $review->username }}</td>
              <td>{{ $review->email }}</td>
              <td>{{ $review->review }}</td>
              <td>{{ $review->ip }}</td>
              <td>{{ $review->stars }}</td>
                            <td>
                            <form method="post" action="{{ route('edit') }}">
                              <input type="hidden" name="category" value="reviews">
                              <input type="hidden" name="id" value="{{ $review->rid }}">
                              <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></button>
                            </form></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-dname='review from {{ $review->pname }}' data-category='reviews' data-id="{{ $review->rid }}" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
            </tr>
            @endforeach
          </tbody>
        </table>

  </div>
  <div class="tab-pane fade" id="producttable" role="tabpanel" aria-labelledby="product-tab">
    <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
      <a href="{{ action('AdminController@create', ['category' => 'products']) }}" class="btn btn-success">Create</a>
            <thead>
            <tr>
              <th>category</th>
              <th>pid</th>
              <th>pname</th>
              <th>price</th>
              <th>image</th>
              <th>info</th>
                                <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>category</th>
              <th>pid</th>
              <th>pname</th>
              <th>price</th>
              <th>image</th>
              <th>info</th>
                             <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </tfoot>

          <tbody>
            @foreach($product as $product)
            <tr>
              <td>{{ $product->category }}</td>
              <td>{{ $product->pid }}</td>
              <td>{{ $product->pname }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->image }}</td>
              <td>{{ $product->info }}</td>
                            <td>
                            <form method="post" action="{{ route('edit') }}">
                              <input type="hidden" name="category" value="products">
                              <input type="hidden" name="id" value="{{ $product->pid }}">
                              <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></button>
                            </form></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-dname='{{ $product->pname }}' data-category='products' data-id="{{ $product->pid }}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
  <div class="tab-pane fade" id="categorytable" role="tabpanel" aria-labelledby="category-tab">
    
<table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
  <a href="{{ action('AdminController@create', ['category' => 'category']) }}" class="btn btn-success">Create</a>
            <thead>
            <tr>
              <th>cid</th>
              <th>cname</th>
                                <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>cid</th>
              <th>cname</th>
                             <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </tfoot>

          <tbody>
            @foreach($category as $category)
            <tr>
              <td>{{ $category->cid }}</td>
              <td>{{ $category->cname }}</td>
                          <td>
                            <form method="post" action="{{ route('edit') }}">
                              <input type="hidden" name="category" value="category">
                              <input type="hidden" name="id" value="{{ $category->cid }}">
                              <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></button>
                            </form></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-dname='{{ $category->cname }}' data-category='category' data-id="{{ $category->cid }}" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
  <div class="tab-pane fade" id="ordertable" role="tabpanel" aria-labelledby="order-tab">
    
<table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
  <a href="{{ action('AdminController@create', ['category' => 'orders']) }}" class="btn btn-success">Create</a>
            <thead>
            <tr>
              <th>order_id</th>
              <th>username</th>
              <th>email</th>
              <th>pid</th>
              <th>pname</th>
              <th>price</th>
              <th>quantity</th>
              <th>total</th>
              <th>address</th>
              <th>date</th>
                                <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>order_id</th>
              <th>username</th>
              <th>email</th>
              <th>pid</th>
              <th>pname</th>
              <th>price</th>
              <th>quantity</th>
              <th>total</th>
              <th>address</th>
              <th>date</th>
                             <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </tfoot>

          <tbody>
            @foreach($order as $order)
            <tr>
              <td>{{ $order->order_id }}</td>
              <td>{{ $order->username }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->pid }}</td>
              <td>{{ $order->pname }}</td>
              <td>{{ $order->price }}</td>
              <td>{{ $order->quantity }}</td>
              <td>{{ $order->total }}</td>
              <td>{{ $order->address }}</td>
              <td>{{ $order->date }}</td>
                          <td>
                            <form method="post" action="{{ route('edit') }}">
                              <input type="hidden" name="category" value="orders">
                              <input type="hidden" name="id" value="{{ $order->order_id }}">
                              <button type="submit" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button>
                            </form>
                          </td>
    <td>
      <p data-placement="top" data-toggle="tooltip" title="Delete">
        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-dname='order from {{ $order->pname }}' data-category="orders" data-id="{{ $order->order_id }}">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
      </p>
    </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
  <div class="tab-pane fade" id="admintable" role="tabpanel" aria-labelledby="admin-tab">
    
<table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
  <a href="{{ action('AdminController@create', ['category' => 'admin']) }}" class="btn btn-success">Create</a>
            <thead>
            <tr>
              <th>aid</th>
              <th>username</th>
              <th>password</th>
                                <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>aid</th>
              <th>username</th>
              <th>password</th>
                             <th>Edit</th>
                                 <th>Delete</th>
            </tr>
          </tfoot>

          <tbody>
            @foreach($admin as $admin)
            <tr>
              <td>{{ $admin->aid }}</td>
              <td>{{ $admin->username }}</td>
              <td>{{ $admin->aid }}</td>
                            <td>
                            <form method="post" action="{{ route('edit') }}">
                              <input type="hidden" name="category" value="admin">
                              <input type="hidden" name="id" value="{{ $admin->aid }}">
                              <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></button>
                            </form></td>
                            <td></td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
 </div>  
  </div>
    
        <div class="row">
    
            <div class="col-md-12">

  </div>
  </div>
</div>

<style type="text/css">
  .modal-backdrop {
  z-index: -1 !important;
}
</style>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       <h2>Record ID: <span class="modal-record"></span>&nbsp<span class="modal-name"></span></h2>
      </div>
        <div class="modal-footer ">
          <form style="display: inline;" method="POST" action="{{ route('delete.row') }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="category" value="">
          <input type="hidden" name="id" value="">
        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
   
    </body>
   

{{-- $(document).ready(function() {
$('#example').DataTable( {
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
} );
} );
 --}}