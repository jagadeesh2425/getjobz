@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }	
</style>
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="{{ route('admin.home') }}">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Services</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Services <small>Services</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Services</span> </div>
                        <div class="actions"> <a href="{{ route('create.service') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Service</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="datatable-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="serviceDatatableAjax">
                                    <thead>
                                    <tr role="row" class="filter">
                                            <td><input type="text" class="form-control" name="package_title" id="package_title" autocomplete="off" placeholder="Service Title"></td>
                                            <td><input type="text" class="form-control" name="package_title" id="package_title" autocomplete="off" placeholder="Service Desc"></td>
                                            <td><input type="text" class="form-control" name="package_price" id="package_price" autocomplete="off" placeholder="Service price"></td>
                                            <td><input type="text" class="form-control" name="package_num_days" id="package_num_days" autocomplete="off" placeholder="Service num days"></td>
                                            <td><input type="text" class="form-control" name="package_num_listings" id="package_num_listings" autocomplete="off" placeholder="Service num listings"></td>
                                            <td><select name="package_for" id="package_for" class="form-control">
                                                    <option value="">Service For?</option>
                                                    <option value="job_seeker">Job Seeker</option>
                                                    <option value="employer">Employer</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>Title</th>
                                            <th>Desc</th>
                                            <th>Price</th>
                                            <th>Num Days</th>
                                            <th>Num Listings</th>
                                            <th>For</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection
@push('scripts') 
<script>
    $(function () {
        var oTable = $('#serviceDatatableAjax').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            searching: false,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.data.services') !!}',
				data: function (d) {
                    d.service_title = $('#service_title').val();
                    d.service_description = $('#service_description').val();
                    d.service_price = $('#service_price').val();
                    d.service_num_days = $('#service_num_days').val();
                    d.service_num_listings = $('#service_num_listings').val();
					d.service_for = $('#service_for').val();

                }
            }, columns: [
                {data: 'service_title', name: 'service_title'},
                {data: 'service_description', name: 'service_description'},
				{data: 'service_price', name: 'service_price'},
                {data: 'service_num_days', name: 'service_num_days'},
				{data: 'service_num_listings', name: 'service_num_listings'},
                {data: 'service_for', name: 'service_for'},
                {data: 'action', name: 'action', orderable: false, searchable: false}

            ]
        });
		
		$('#datatable-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        
        $('#service_title').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#service_description').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#service_price').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#service_num_days').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
		$('#service_num_listings').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
		$('#service_for').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deleteService(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.service') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#serviceDatatableAjax').DataTable();
                            table.row('packageDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
</script> 
@endpush