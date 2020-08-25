@if(session('status_correct'))
<div class="alert alert-success alert-heading ">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ csrf_field() }}
    <strong>{{ session('status_correct') }}</strong>
</div>
@endif

@if(session('status_wrong'))
<div class="alert alert-danger alert-heading ">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ csrf_field() }}
    <strong>{{ session('status_wrong') }}</strong>
</div>
@endif

@extends('layouts.app')
@section('scripts')
<script src="{{ asset('js/chartist.min.js') }}"></script>
<!-- This an example -->
<script src="{{ asset('js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });

</script>

@endsection
<style>
    #burs {
        background-color: #2878e2;
        color: white;
    }

    #ors {
        background-color: #47d5ffeb;
        color: white;
    }

    #budget {
        float: right;
    }

    #card_ors {
        background-color: #47d5ffeb;
        margin-bottom: 20px;
        opacity: 0.7;
    }

    #card_burs {
        background-color: #2878e2;
        margin-bottom: 20px;
        opacity: 0.7;
    }

</style>

@section('content')

<div class="row">
    <div class="col-6 col-md-4">
        <div class="card card-stats">
            <div id="ors" class="card-header">
                <i class="material-icons">note_add</i>
            </div>
            <div class="card-content">
                <p class="category">Total Registries</p>
                <h3 class="title"> {{ $total_count }} </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="#47d5ffeb">
                <i class="fa fa-history"></i>
            </div>
            <div class="card-content">
                <p class="category">Most Recent ORS Registry Added</p>
                @if($recent1 == null)
                <h4 class="title">No Records</h4>
                @else
                <h5 class="title"><b>{{ $recent1->created_at }}</b></h5>
                @endif
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                </div>
            </div>
        </div>
    </div>


    <div class="col-6 col-md-4">
        <div class="card card-stats">
            <div id="burs" class="card-header">
                <i class="fa fa-history"></i>
            </div>
            <div class="card-content">
                <p class="category">Most Recent BURS Registry Added</p>
                @if($recent2 == null)
                <h4 class="title">No Records</h4>
                @else
                <h5 class="title"><b>{{ $recent2->created_at }}</b></h5>
                @endif
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ORS BUDGET -->
<div class="card">
    <div id="card_ors" class="card-header">
        <h4 class="title">ORS BUDGET </h4>
        <p class="category">ORS REGISTRIES</p>
    </div>

    <!-- TOTAL COST Registered-->
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-money"></i>
                </div>
                <div class="card-content">
                    <p class="category">Total Cost Registered</p>
                    <h3 class="title">₱@convertmoney($grand_total)</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Budget -->
        <div class="col-6 col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="#47d5ffeb">
                    <i class="fa fa-money"></i>
                </div>
                <div class="card-content">
                    <p class="category">Current Budget</p>
                    @forelse($yearly_data as $year_amount)
                    <h3 class="title"><?php $x = $year_amount->amount;?>₱@convertmoney($x)</h3>
                    @empty
                    <h3 class="title"><?php $x = 0;?>₱@convertmoney($x)</h3>
                    @endforelse
                </div>

                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                    <div id="budget">
                        <a href="#" title="update budget" data-toggle="modal" data-target="#Modal">
                            <i class="material-icons">add</i> Update budget
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Remaining balance -->
        <div class="col-6 col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="fa fa-money"></i>
                </div>
                <div class="card-content">
                    <p class="category">Remaining balance</p>
                    <h3 class="title"><?php
                    $y = $x - $grand_total;
                    ?>₱@convertmoney($y)</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BURS BUDGET -->
<div class="card">
    <div id="card_burs" class="card-header">
        <h4 class="title">BURS BUDGET </h4>
        <p class="category">ORS REGISTRIES</p>
    </div>

    <!-- TOTAL COST Registered-->
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-money"></i>
                </div>
                <div class="card-content">
                    <p class="category">Total Cost Registered</p>
                    <h3 class="title">₱@convertmoney($burs_total)</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Budget -->
        <div class="col-6 col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="#47d5ffeb">
                    <i class="fa fa-money"></i>
                </div>
                <div class="card-content">
                    <p class="category">Current Budget</p>
                    @forelse($yearly_data2 as $year_amount)
                    <h3 class="title"><?php $x = $year_amount->amount;?>₱@convertmoney($x)</h3>
                    @empty
                    <h3 class="title"><?php $x = 0;?>₱@convertmoney($x)</h3>
                    @endforelse
                </div>

                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                    <div id="budget">
                        <a href="#" title="update budget" data-toggle="modal" data-target="#Modal2">
                            <i class="material-icons">add</i> Update budget
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Remaining balance -->
        <div class="col-6 col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="fa fa-money"></i>
                </div>
                <div class="card-content">
                    <p class="category">Remaining balance</p>
                    <h3 class="title"><?php
                    $y = $x - $burs_total;
                    ?>₱@convertmoney($y)</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Employees </h4>
            <p class="category">List of all users added</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>ID</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

 <div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="#47d5ffeb">
            <h4 class="title">Activity Log </h4>
            <p class="category">List of all logs</p>
        </div>
        <div class="card-content table-responsive">
            <table id="act_log_table" class="table table-hover">
                <thead class="text-warning">
                    <th>User ID</th>
                    <th>Action</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach($activity_log as $activity_log)
                    <tr>
                        <td>{{$activity_log->causer_id}}</td>
                        <td>{{$activity_log->description}}</td>
                        <td>{{$activity_log->created_at}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection()
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script>
    $(document).ready(function() {
    $('#act_log_table').DataTable(
        {
            "iDisplayLength": 5,
            "bLengthChange": false
        });
    
    } );
    </script>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Update Budget for ORS</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ URL::to('/add_budget') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="label-control"><b>Enter amount</b></label>
                        <input id="amount" name="amount" type="text" required="required" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="label-control"><b>Enter Admin Password</b></label>
                        <input id="password" name="password" type="password" required="required" class="form-control" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button name="submit" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>

<body>
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Update Budget for BURS</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ URL::to('/add_budget2') }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="label-control"><b>Enter amount</b></label>
                            <input id="amount" name="amount" type="text" required="required" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="label-control"><b>Enter Admin Password</b></label>
                            <input id="password" name="password" type="password" required="required"
                                class="form-control" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

