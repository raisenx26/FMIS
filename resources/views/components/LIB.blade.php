<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">



@extends('layouts.app')
<style>
td {
font-size: 9.5px;
}

#hover:hover {
background-color: #9ae9f3;

}

* {
font-size: 12px;
}

#table_parinfo th 
{
    
  padding: 15px;
  text-align: left;

}
#table_parinfo td 
{
    
  padding: 15px;
  text-align: left;

}


.float {


position: sticky;
width: 60px;
height: 60px;
bottom: 40px;
right: 40px;
background-color: #4285f4;
color: #FFF;
border-radius: 50px;
text-align: center;
box-shadow: 2px 2px 3px #999;
float: right;


}


.my-float {
margin-top: 22px;
}

.float:hover {
background-color: #065ef1;
}

#bots,
#subz,
#close {
float: right;
}

</style>


<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

@section('content')
<div class="row">
<div class="col-md-7">
<div class="card">
    <div class="card-header" data-background-color="#47d5ffeb">
    <h4 class="title">Line-Item Budget</h4>
    <p class="category">LIB Registry stored</p>
    </div>
    <div class="card-content table-responsive">
    <table class="table" id="table">
        <thead class="text-primary">
        <th><b>Project Title</b></th>
        <th><b>Implementing Agency</b></th>
        <th><b>Project Duration</b></th>
        <th><b>Project Fund Source</b></th>
        <th><b>Project Budget</th>
        <th><b>Project Leader</b></th>
        <th><b>Monitoring Agency</b></th>
        <th><b>Action</b></th>
        </thead>
        <tbody>
        @foreach($lineitem_budget as $data)
        <tr id="hover">
            <td>{{ $data->project_title }}</td>
            <td>{{ $data->implementing_agency }}</td>
            <td>{{ $data->project_duration }}</td>
            <td>{{ $data->projectfund_source }}</td>
            <td>{{ $data->project_budget }}</td>
            <td>{{ $data->project_leader }}</td>
            <td>{{ $data->monitoring_agency }}</td>
            <td>
            <a href="#" data-toggle="modal" title="Edit" data-target="#exampleModal-{{ $data->lib_id }}"><i
                class="material-icons">edit</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            <a href="{{ route('cancel_LIB', $data->lib_id) }}" title="Delete" OnClick="return confirm('Are you sure you want to delete this LIB?')"><i
                class="fa fa-ban fa-lg"></i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            {{--  <a OnClick="return confirm('Are you sure you want to delete?')"
                href="{{ route('LIBdelete', $data->lib_id) }}"><i class="material-icons">delete</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}  --}}
            <a href="#" title="Print" data-target="#exampleModal5-{{ $data->lib_id }}" data-toggle="modal" target="_blank"><i
                class="material-icons">print</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ csrf_field() }}
    </div>
</div>
</div>
</div>
<a data-toggle="modal" data-target="#exampleModal2" class="float" title="Add LIB">
<i id="add" class="fa fa-plus my-float"></i>
</a>


@endsection()

<script>
$(document).ready(function() {
$('#table').DataTable(
    {

    });

} );
</script>
<!-- Modal for EDIT LIB -->
@foreach($lineitem_budget as $data)
    <div class="modal fade" id="exampleModal-{{ $data->lib_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT LIB :  {{ $data->project_title }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <div class="modal-body">
    <form method="POST" action="{{ URL::route('LIBupdate',['code'=>$data->lib_id]) }}">

        


        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
                <label class="label-control"><b>Project Title</b></label>
                <div>
                <input id="project_title" name="project_title" type="input" required="required" class="form-control" value="{{ $data->project_title }}" />
                </div>
        </div>
    
        <div class="form-group">
        <label class="label-control"><b>Implementing Agency</b></label>
        <div>
        <input id="implementing_agency" name="implementing_agency" type="input" required="required" class="form-control" value="{{ $data->implementing_agency }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Project Duration</b></label>
        <div>
        <input id="project_duration" name="project_duration" type="input" required="required" class="form-control" value="{{ $data->project_duration }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Project Fund Source</b></label>
        <div>
        <input id="projectfund_source" name="projectfund_source" type="input" required="required" class="form-control" value="{{ $data->projectfund_source }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Project Budget</b></label>
        <div>
        <input id="project_budget" name="project_budget" type="text" required="required" class="form-control" value="{{ $data->project_budget }}" />
        </div>
        </div>

        
        <div class="form-group">
        <label class="label-control"><b>Project Leader</b></label>
        <div>
        <input id="project_leader" name="project_leader" type="input" required="required" class="form-control" value="{{ $data->project_leader }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Monitoring Agency</b></label>
        <div>
        <input id="monitoring_agency" name="monitoring_agency" type="input" required="required" class="form-control" value="{{ $data->monitoring_agency }}" />
        </div>
        </div>

        

    <button id="subz" name="submit" type="submit"  class="btn btn-primary">Save Changes</button>
    <button  id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
        </div>
    <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
@endforeach
<!-- END Modal for EDIT Registry -->

<!-- Modal for ADD LIB -->
<div class="modal fade fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div  class="modal-content">
    <div  id="headermodal" class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><b>Add new LIB</b></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="{{ URL::to('/LIBformstore') }}">
        {{ csrf_field() }}
    <div class="form-group">
        <label class="label-control"><b>Project Title</b></label>
        <input id="project_title" name="project_title" type="input" required="required" class="form-control" />
    </div>

    <div class="form-group">
        <label class="label-control"><b>Implementing Agency</b></label>
        <div>
        <input id="implementing_agency" name="implementing_agency" type="input" required="required" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <label class="label-control"><b>Project Duration</b></label>
        <div>
        <input id="project_duration" name="project_duration" type="input" required="required" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <label class="label-control"><b>Project Fund Source</b></label>
        <div>
        <input id="projectfund_source" name="projectfund_source" type="input" required="required" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <label class="label-control"><b>Project Budget</b></label>
        <div>
        <input id="project_budget" name="project_budget" type="text" required="required" class="form-control" />
        </div>
    </div>

        
    <div class="form-group">
        <label class="label-control"><b>Project Leader</b></label>
        <div>
        <input id="project_leader" name="project_leader" type="input" required="required" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <label class="label-control"><b>Monitoring Agency</b></label>
        <div>
        <input id="monitoring_agency" name="monitoring_agency" type="input" required="required" class="form-control" />
        </div>
    </div>
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button name="submit" type="submit"  class="btn btn-primary">Add LIB</button>
    </form>
    </div>
</div>
</div>
</div>

<!-- END Modal for new Registry -->


