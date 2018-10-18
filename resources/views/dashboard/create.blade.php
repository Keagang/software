
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<div class="modal-fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Create {{ $category }}</h4>
          </div>
          <div class="modal-body">
            <form id="update-form" action="{{ route('store',['category'=>$category]) }}" method="post">
            @php ($r = array_values($row))
            {{-- @php ($k =array_keys($row)) --}}
            @for($i = 0; $i < $num; $i++)
            <div class="form-group">

              <input class="form-control " type="text" name="{{ $r[$i] }}" placeholder="{{ $r[$i] }}">
            </div>

            @endfor
          </div>

          <input type="hidden" name="category" value="{{ $category }}">
          </form>
          <div class="modal-footer ">

            <button type="submit" form="update-form" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Create</button>
          </div>
    </div>
