@extends('template.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom_style.css') }}">
@endsection
@section('content')

	<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Products</h5>
							<div class="heading-elements">
			                	<a href="#" class="btn btn-success" >Add Product</a>
		                	</div>
						</div>
						<div class="table-responsive">
							<table class="table datatable-basic table-striped">
								<thead>
									<th>No</th>
					                <th>Name</th>
					                <th>Model</th>
					                <th>Qty</th>
					                <th width="200px">Action</th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /basic datatable -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

@endsection
@section('script')
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins/tables/datatables/datatables.min.js') }} "></script>
<script type="text/javascript" src="{{ URL::asset('js/admin/product.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins/notifications/sweet_alert.min.js') }} "></script>
<!-- <script type="text/javascript" src="{{ URL::asset('assets/js/pages/components_modals.js') }}"></script> -->
@endsection