@extends('layouts.app')
@section('page_title', 'Create User Internal IBS')

@section('header')
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2/select2.css">
@endsection

@section('content')
	<div class="page">
		<!-- .page-inner -->
		<div class="page-inner">
			<header class="page-title-bar">
				<!-- .breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active">
							<a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>User</a>
						</li>
					</ol>
				</nav><!-- /.breadcrumb -->

				<!-- title and toolbar -->
				<div class="d-md-flex align-items-md-start">
					<h1 class="page-title mr-sm-auto"> Create User Vendor </h1><!-- .btn-toolbar -->
					<div class="btn-toolbar">
						<a href="{{ site_url('/admin/user-management/vendor') }}" class="btn btn-subtle-danger">
							<span class="ml-1">Cancel</span>
						</a>
					</div>
				</div><!-- /title and toolbar -->
			</header>

			<div class="page-section">
				@if(!empty(validation_errors()))
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissible fade show">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						</div>
					</div>
				@endif

				{!! form_open('/admin/userManagement/storeUserInternal', array('id'=> 'store-user-vendor-form')) !!}
				<div class="row">
					<div class="col-md-4">
						<div class="card card-fluid">
							<div class="card-header">
								Account Role
							</div>
							<div class="card-body">
								<p class="text-muted"><small>Please select a role to this account.</small></p>
								<div>
									@foreach($groups as $group)
										<div class="custom-control custom-control-inline custom-checkbox mt-1">
											<input type="checkbox" name="role[]" value="{{ $group->id }}"
												   class="custom-control-input" id="{{ 'ckb' . $group->id }}">
											<label class="custom-control-label" for="{{ 'ckb' . $group->id }}">{{ ucwords($group->name) }}</label>
										</div>
									@endforeach
								</div>
							</div>
						</div>
						<button type="button" onclick="document.getElementById('store-user-vendor-form').submit()" class="btn btn-primary mr-2 btn-block">
							<span class="ml-1">Submit</span>
						</button>
					</div>
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-header">
								Account Detail
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="eg. jhon.doe@example.com" required="">
								</div>
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control"  name="name" id="name" placeholder="e.g Jhone Doe" required="">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control"  name="password" id="password" placeholder="Password for user" required="">
								</div>

								<div class="form-row">
									<div class="col-md-6 mb-3">
										<label for="type">Type</label>
										<input type="text" class="form-control" id="type"  name="type" value="internal" readonly>
									</div><!-- form column -->
									<!-- /form column -->
									<!-- form column -->
									<div class="col-md-6 mb-3">
										<label for="level">Type</label>
										<select name="level" id="level" class="form-control">
											<option value="supervisor">Supervisor</option>
											<option value="supervisor">PIC</option>
											<option value="manager">Manager</option>
										</select>
									</div><!-- /form column -->
								</div>
							</div>
						</div>
					</div>
				</div>
				{!! form_close() !!}
			</div>
		</div>
	</div>
@endsection

@section('footer')
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $("#vendor").select2();
        });
	</script>
@endsection
