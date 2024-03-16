@include('adminloyouts.head')
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            @include('adminloyouts.header')
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Kategoriler</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Panel</a></li>
									<li class="breadcrumb-item active">Kategoriler</li>
								</ul>
                                @if(session('onay'))
                                <div class="alert alert-success">
                                    {{ session('onay') }}
                                </div>
                                @elseif(session('Hata'))
                                <div class="alert alert-danger">
                                    {{ session('Hata') }}
                                </div>

                                @endif
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Ekle</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Kategori</th>
													<th>Düzenle-Sil</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($kategori as $u )
                                                <tr>
													<td>{{ $u->id }}</td>

													<td>
														<h2 class="table-avatar">


															<a href="">{{ $u->kategori }}</a>
														</h2>
													</td>
													
													<td>
														<h2 class="table-avatar">
															@if ($u->durum == 1)
															<a href="" style="color: aliceblue"  class="btn btn-success">Aktif</a>
															@else

																<a href="" style="color: aliceblue" class="btn btn-danger">Pasif</a>
															@endif


															
														</h2>
													</td>

													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details{{ $u->id }}">
																<i class="fe fe-pencil"></i> Düzenle
															</a>
															<a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Sil
															</a>
														</div>
													</td>
												</tr>
                                                <div class="modal fade" id="edit_specialities_details{{ $u->id }}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Kategori Düzenle</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route("kategoridüzenle",$u->id) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-6">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Kategori</label>
                                                                                <input type="text" name="kategori" class="form-control" value="{{ $u->kategori }}" required>
                                                                            </div>
                                                                        </div>
																		<div class="mb-3">
																			<label for="" class="form-label">Durum</label>
																			<select
																				class="form-select form-select-lg"
																				name="durum"
																				id=""


																			>
																			@if ($u->durum == 1)
																			<option value="1" selected>Aktif</option>
																			<option value="0">Pasif</option>
																			@else
																			<option value="1">Aktif</option>
																			<option value="0" selected>Pasif</option>
																			@endif
																			


																			</select>
																		</div>


                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary w-100">Kaydet</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">Sil</h4>
                                                                    <p class="mb-4">Kategoriyi Silmek İstiyormusunuz</p>
                                                                    <a href="{{ route("kategoridelete",$u->id) }}"><button type="button" class="btn btn-primary">Sil</button></a>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->


			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Kategori Ekle</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{ route("kategoriekle") }} " enctype="multipart/form-data">
                                @csrf
								<div class="row">
									<div class="col-12 col-sm-6">
										<div class="mb-3">
											<label class="mb-2">Kategori</label>
											<input name="kategori" type="text" class="form-control">
										</div>
									</div>
									<div class="mb-3">
										<label for="" class="form-label">Durum</label>
										<select
											class="form-select form-select-lg"
											name="durum"
											id=""
										>
											<option selected>Kategori Durumu</option>
											<option value="1">Aktif</option>
											<option value="0">Pasif</option>
										</select>
									</div>
									

								</div>
								<button type="submit" class="btn btn-primary w-100">Kaydet</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->

			<!-- Edit Details Modal -->

			<!-- /Edit Details Modal -->

			<!-- Delete Modal -->

			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        @include('adminloyouts.js')
    </body>
</html>
