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
								<h3 class="page-title">Ürün Ekle</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Panel</a></li>
									<li class="breadcrumb-item active">Ürün Ekle</li>
								</ul>
                                @if(session('onay'))
                                <div class="alert alert-success">
                                    {{ session('onay') }}
                                </div>
                                @elseif(session('hata'))
                                <div class="alert alert-danger">
                                    {{ session('hata') }}
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
													<th>#</th>
													<th>Ürün</th>
													<th>Fiyat</th>
													<th>Para Birimi</th>
													<th>Yayınlayan</th>
													<th>Düzenle-Sil</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($urun as $u )
                                                <tr>
													<td>{{ $u->id }}</td>

													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm me-2">
																<img class="avatar-img" src="{{ $u->resim }}" alt="Speciality">
															</a>


															<a href="">{{ $u->baslik}}</a>
														</h2>
													</td>
                                                    <td>{{ number_format($u->fiyat) }} $</td>
                                                    <td>$ Dolar</td>


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
                                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ürün Düzenle</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route("productedit",$u->id ) }} " enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">

                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Ürün Başlık</label>
                                                                                <input name="baslik" type="text" value="{{ $u->baslik}}" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">İçerik</label>
                                                                                <textarea style="height: 650px;" name="aciklama" class="summernote" data-urun-id="{{ $u->id }}">{!! $u->aciklama !!}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Fiyat</label>
                                                                                <input name="eskifiyat" type="number" value="{{ $u->eskifiyat}}" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Fiyat</label>
                                                                                <input name="fiyat" type="number" value="{{ $u->fiyat}}" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-btn">
                                                                                      <a id="lfm4{{ $u->id }}" data-input="thumbnail4{{ $u->id }}" data-preview="holder4{{ $u->id }}" class="btn btn-primary">
                                                                                        <i class="fa fa-picture-o"></i> Resim
                                                                                      </a>
                                                                                    </span>
                                                                                    <input id="thumbnail4{{ $u->id }}" class="form-control" type="text" name="resim" value="{{ $u->resim }}" >

                                                                                  </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-btn">
                                                                                      <a id="lfm5{{ $u->id }}" data-input="thumbnail5{{ $u->id }}" data-preview="holder5{{ $u->id }}" class="btn btn-primary">
                                                                                        <i class="fa fa-picture-o"></i> Resimler
                                                                                      </a>
                                                                                    </span>
                                                                                    <input id="thumbnail5{{ $u->id }}" class="form-control" type="text" name="resimler" value="{{ $u->resim }}" >
                                                                                    <img style="width: 100px;" src="{{ $u->resim }}" alt="">

                                                                                  </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Meta Açıklama</label>
                                                                                <input name="meta_aciklama" type="text" value="{{ $u->meta_aciklama}}"  class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Anahtar Kelime</label>
                                                                                <input id="tags" name='anahtar_kelime'  value='{{ $u->anahtar_kelime}}' class="form-control" autofocus>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <select name="kategori" class="form-select" aria-label="Default select example">
                                                                                    @if ($u->kategori == null )
                                                                                    <option value="Kategori Yok" selected> Kategori Yok</option>
                                                                                    @else
                                                                                    <option value="{{ $u->kategori}}" selected>{{ $u->kategori}}</option>
                                                                                    @endif



                                                                                    @foreach ($kategori as $k )
                                                                                    <option value="{{ $k->katagoriname }}">{{ $k->katagoriname }}</option>
                                                                                    @endforeach
                                                                                  </select>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary w-100">Yayınla</button>
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
                                                                    <p class="mb-4">ÜrünÜ Silmek İstiyormusunuz</p>
                                                                    <a href="{{ route("productdelete",$u->id) }}"><button type="button" class="btn btn-primary">Sil</button></a>
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
				<div class="modal-dialog modal-xl modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ürün Ekle</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{ route("productpost") }} " enctype="multipart/form-data">
                                @csrf
								<div class="row">

									<div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">Ürün Başlık</label>
											<input name="baslik" type="text" class="form-control" required>
										</div>
									</div>
                                    <div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">İçerik</label>
											<textarea style="height: 650px;" name="aciklama" id="summernote1" required></textarea>
										</div>
									</div>
                                    <div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">Eski Fiyat (İndirim Yapmayacaksanız Boş Bırakınız)</label>
											<input name="eskifiyat" type="number"  class="form-control" >
										</div>
									</div>
                                    <div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">Fiyat</label>
											<input name="fiyat" type="number"  class="form-control" required >
										</div>
									</div>
                                    <div class="col-12 ">
										<div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Resim
                                                  </a>
                                                </span>
                                                <input id="thumbnail1" class="form-control" type="text" name="resim" value="" >

                                              </div>
										</div>
									</div>

                                    <div class="col-12 ">
										<div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="lfm" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Resimler
                                                  </a>
                                                </span>
                                                <input id="thumbnail2" class="form-control" type="text" name="resimler" value="" >

                                              </div>
										</div>
									</div>

                                    <div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">Meta Açıklama</label>
											<input name="meta_aciklama" type="text"  class="form-control" >
										</div>
									</div>
                                    <div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">Anahtar Kelime</label>
											<input id="tags" name='anahtar_kelime'  value='' class="form-control" autofocus>
										</div>
									</div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="mb-2">Kategori</label>
                                            <select name="kategori" class="form-select" aria-label="Default select example">

                                                <option value="Kategori Yok" selected>Kategori Yok</option>
                                                @foreach ($kategori as $k )
                                                <option value="{{ $k->katagoriname }}">{{ $k->katagoriname }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>


								</div>
								<button type="submit" class="btn btn-primary w-100">Yayınla</button>
							</form>

						</div>
					</div>
				</div>

			</div>


            <script>
                // The DOM element you wish to replace with Tagify
            var input = document.getElementById('tags');

            // initialize Tagify on the above input node reference
            new Tagify(input)
              </script>
			<!-- /ADD Modal -->

			<!-- Edit Details Modal -->

			<!-- /Edit Details Modal -->

			<!-- Delete Modal -->

			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
            $('#lfm').filemanager('image');
            </script>
                   <script>
                    $('#lfm1').filemanager('image');
                    </script>
                    @foreach($urun as $u)
                    <script>
                        $('#lfm4{{ $u->id }}').filemanager('image');
                    </script>
                @endforeach
                @foreach($urun as $u)
                <script>
                    $('#lfm5{{ $u->id }}').filemanager('image');
                </script>
            @endforeach

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



        <script>
        $('.summernote').each(function() {
            var urunId = $(this).data('urun-id');

            $(this).summernote({
                // Summernote konfigürasyonu buraya eklenir
            });
        });
        </script>
       <script>
          $('#summernote1').summernote({
          });
        </script>
		<!-- jQuery -->
        @include('adminloyouts.js')
    </body>
</html>
