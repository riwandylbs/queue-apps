@extends('layouts.admin_layouts.form_table')

@section('breadcrumbs')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">ADMIN LOKET</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Loket</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form_loket')
<div class="row">
    <div class="col-md-12">
        <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">CHECK IN</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">CHECK OUT</span></a> </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane {{ $tabCheckIn }}" id="home" role="tabpanel">
                        <div class="p-20">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <!-- FORM ONE -->
                            <form method="post" action="{{ route('create.queue') }}" class="form-horizontal">
                            @csrf
                                <div class="card-body">
                                    <h4 class="card-title">DATA CHECK IN</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Date / Time</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="date_in" value="{{ date('d-m-Y H:i:s') }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Loading Dock No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="loading_dock" value="{{ $dockNumber->number + 1 }}" name="loading_dock" placeholder="Loading Dock No. Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Vehicle Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="vehicle_no" placeholder="Vehicle Number Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Expedition Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="expd_name" placeholder="Expedition Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Card No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="card_no" placeholder="Card No Here">
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane {{ $tabCheckout }} " id="profile" role="tabpanel">
                        <div class="p-20">
                            <!-- FORM TWO -->
                                <div class="card-body">
                                    <h4 class="card-title">DATA CHECK OUT</h4>
                                    <form class="form-horizontal" action="{{ route('check.in') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Vehicle Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-search" value="{{ !empty($searching) ? $searching->vehicle_no : null }}" name="search_vehicle" id="fname" placeholder="Vehicle Number Here">
                                            <button type="submit" class="btn btn-default search">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal" method="post" action="{{ route('check.out') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Check In</label>
                                        <div class="col-sm-9">
                                            <input type="text" value=" {{ !empty($searching) ? $searching->date_in : null }} " name="check_in" class="form-control" id="lname" placeholder="Check In Here" readonly>
                                            <input type="text" value="{{ !empty($searching) ? $searching->vehicle_no : null }}" name="vehicle_no" class="form-control" id="fname" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Loading No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" value=" {{ !empty($searching) ? $searching->loading_dock : null }} " name="dock_number" class="form-control" id="lname" placeholder="Loading No Here" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Card No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" value=" {{ !empty($searching) ? $searching->card_no : null }} " name="card_no" class="form-control" id="password" placeholder="Card No Here" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Check Out</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="check_out" class="form-control" value="{{ date('d-m-Y H:i:s') }}" id="datepicker-autoclose" readonly>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
<!-- DATA TABLES -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">LIST DATA</h5>

                <form action=" {{ route('check.in') }} " method="post">
                    @csrf
                    <div class="form-group row col-sm-4 align-items-left date-search">                    
                        <div class="col-lg-12 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control datepiecker-search" name="data-list" placeholder="Date" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"> <i class="mdi mdi-calendar-clock"></i> </span>
                                </div>
                                <button type="submit" class="btn btn-default search">Search</button>
                            </div>
                        </div>
                    </div>
                </form>



                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date Check In</th>
                                <th>Date Check Out</th>
                                <th>Loading Dock No.</th>
                                <th>Vehicle Number</th>
                                <th>Expedition Name</th>
                                <th>Card No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        @foreach($queueDb as $item)

                            <tr>
                                <td> {{ $item->date_in }} </td>
                                <td> {{ $item->check_out }} </td>
                                <td> {{ $item->loading_dock }} </td>
                                <td> {{ $item->vehicle_no }} </td>
                                <td> {{ $item->expd_name }} </td>
                                <td> {{ $item->card_no }} </td>
                                <td>    
                                    <a href="" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a> 
                                     <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-grease-pencil"></i></button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">Update Check In</a>
                                          <a class="dropdown-item" href="#">Update Check Out</a>
                                        </div>
                                    </div><!-- /btn-group -->
                                    <a href="" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-forever"></i></a> 
                                </td>                                
                            </tr>
                        
                        @endforeach

                        </tbody>
                       
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection