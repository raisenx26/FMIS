@extends('layouts.app')
<style>
    #formz {
        margin-top: 50px;
    }

    #separator {
        width: 92%;
        height: 10px;
        border-top: 1px solid #6f6d6d;
        margin-top: 40px;
        margin-left: auto;
        margin-right: auto;

    }

    #content {
        margin-left: 30px;
    }

</style>
@section('content')

<div id="content">


    <h2> Add new data to database. </h2>
    <p><i class="fa fa-question-circle"></i> add new data to database to recognize your inputs in registry.</p>

    <div id="separator"></div>

    <div id="formz" class="form-row">
        <h4><b>Add new Payee</b></h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">
            <span><i class="fa fa-plus"></i></span>
            add new
        </button>
    </div>

    <div id="formz" class="form-row">
        <h4><b>Add new Responsibility Center </b></h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal2">
            <span><i class="fa fa-plus"></i></span>
            add new
        </button>
    </div>

    <div id="formz" class="form-row">
        <h4><b>Add new UACS </b></h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal3">
            <span><i class="fa fa-plus"></i></span>
            add new
        </button>
    </div>

    <div id="formz" class="form-row">
        <h4><b>Add new PAP </b></h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal4">
            <span><i class="fa fa-plus"></i></span>
            add new
        </button>
    </div>

</div>

@endsection()

<!-- modal for add new PAYEE  -->
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add new Payee</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ URL::to('/addnew_payee') }}">

                    {{csrf_field()}}


                    <div class="form-group">
                        <label class="label-control"><b>Payee name</b></label>
                        <input id="payee_name" name="payee_name" type="input" required="required"
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

<!-- modal for add new RC  -->
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Responsibility Center</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ URL::to('/addnew_rc') }}">
                    {{csrf_field()}}
                    {{ method_field('POST') }}

                    <div class="form-group row">
                        <label for="reg_amount" class="col-5 col-form-label"><b>RC ID </b></label>
                        <div class="col-7">
                            <input id="rc_id" name="rc_id" type="text" required="required" class="form-control"
                                placeholder="1.1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="reg_amount" class="col-5 col-form-label"><b>RC Description</b></label>
                        <div class="col-7">
                            <input id="rc_description" name="rc_description" type="text" required="required"
                                class="form-control" placeholder="description example">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="reg_amount" class="col-5 col-form-label"><b>PAP</b></label>
                        <div class="col-7">
                            <input id="rc_pap" name="rc_pap" type="text" required="required" class="form-control"
                                placeholder="A.1.A.1  00000000">
                        </div>
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


<!-- modal for add new UACS  -->
<div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add new UACS</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ URL::to('/addnew_uacs') }}">
                    {{csrf_field()}}
                    {{ method_field('POST') }}

                    <div class="form-group row">
                        <label for="reg_amount" class="col-5 col-form-label"><b>UACS ID</b></label>
                        <div class="col-7">
                            <input id="uacs_id" name="uacs_id" type="text" required="required" class="form-control"
                                placeholder="00000000  00">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="reg_amount" class="col-5 col-form-label"><b>UACS Description</b></label>
                        <div class="col-7">
                            <input id="uacs_desc" name="uacs_desc" type="text" required="required" class="form-control"
                                placeholder="description for uacs">
                        </div>
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



<!-- modal for add new PAP  -->
<div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add new PAP</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ URL::to('/addnew_pap') }}">

                    {{csrf_field()}}


                    <div class="form-group">
                        <label class="label-control"><b>New PAP</b></label>
                        <input id="pap_name" name="pap_name" type="input" required="required"
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