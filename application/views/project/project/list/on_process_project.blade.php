@extends('layouts.app')
@section('page_title', 'Project')

@section('content')
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<!-- .breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active">
							<a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Project</a>
						</li>
					</ol>
				</nav><!-- /.breadcrumb -->

				<!-- title and toolbar -->
				<div class="d-md-flex align-items-md-start">
					<h1 class="page-title mr-sm-auto">Projects</h1><!-- .btn-toolbar -->
					<div class="btn-toolbar">
					</div>
				</div><!-- /title and toolbar -->
			</header>

			<div class="page-section">
				<div class="card card-fluid">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item">
								<a href="{{ site_url('/project/project/new') }}" class="nav-link show">
									New Project
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ site_url('/project/project/onprocess') }}" class="nav-link active">
									Running Project
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ site_url('/project/project/done') }}" class="nav-link">
									Done Project
								</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div class="table-responsive">
								<!-- .table -->
								<table class="table">
									<thead>
									<tr>
										<th> WBS ID </th>
										<th> IRO Number </th>
										<th>Site ID</th>
										<th>Site Name</th>
										<th>Start Date</th>
										<th>Current Status</th>
										<th style="width:100px; min-width:100px;"> &nbsp; </th>
									</tr>
									</thead>
									<tbody>
									@foreach($projects as $project)
										<tr>
											<td>{{ $project->wbs_id }}</td>
											<td>{{ $project->iro_number }}</td>
											<td>{{ $project->site_id_ibs }}</td>
											<td>{{ $project->site_name }}</td>
											<td>{{ $project->sitac_start_date }}</td>
											<td>{{ $project->work_status }}</td>

											<td class="text-right">
												<div class="list-group-item-figure">
													<a href="{{ site_url('/project/project/detail/' . $project->id) }}" class="btn btn-sm btn-icon btn-secondary stop-propagation"><i class="fas fa-ellipsis-h"></i></a>
												</div>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
								@if(count($projects) < 1)
									<div class="text-center">Not data.</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
