@include('adminloyouts.head')


    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
           
<style>
    /* Scroll tasarımı için gerekli stiller */
    .slimscroll {
        overflow-y: scroll;
        height: 100vh; /* Sayfa yüksekliğine göre ayarlayabilirsiniz */
    }

    /* Diğer stiller buraya eklenir */
</style>


<div class="header">
    <!-- Logo -->
    {{-- <div class="header-left">
        <a href="/Admin-AnaSayfa" class="logo">
            <img src="assets/resim/1.png" alt="Logo">
        </a>
        <a href="/Admin-AnaSayfa" class="logo logo-small">
            <img src="assets/resim/1small.png" alt="Logo" width="30" height="30">
        </a>
    </div> --}}
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
        <a class="btn btn-dark mt-2" href="/">Aramayı Sıfırla</a>
    </a>

    <div class="top-nav-search">
        <form method="GET" >
            <input type="text" class="form-control" name="filmara" placeholder="Buradan arayın">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        
    </div>

    <!-- Mobil Menü Aç/Kapat -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobil Menü Aç/Kapat -->



</div>
<!-- /Header -->

<!-- Kenar Çubuğu -->
<div style="background-color: #dc3545;" class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Menü Başlığı -->
                <li>
                    <a href="{{ route("index") }}"><i class="fe fe-heart"></i> <span>Ürün Ekle</span></a>
                </li>

                <li>
                    <a href="{{ route("kategori") }}"><i class="fe fe-activity"></i> <span>Ürün Kategori Ekle</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>


			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Film Ekle</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Panel</a></li>
									<li class="breadcrumb-item active">Film Ekle</li>
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
													<th>film</th>
													<th>Film Adı</th>
													<th>Kategori</th>

													<th>Düzenle-Sil</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($film as $u )
                                                <tr>
													<td>{{ $u->id }}</td>

													<td>
														<h2 class="table-avatar">


															<a href="">{{ $u->film_adi}}</a>
														</h2>
													</td>
                                                    <td>
														<h2 class="table-avatar">


															<a href="">{{ $u->kategori}}</a>
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
                                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ürün Düzenle</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route("filmdüzenle",$u->id ) }} " enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">

                                                                        <div class="col-12 ">
                                                                            <div class="mb-3">
                                                                                <label class="mb-2">Kategori Başlık</label>
                                                                                <input name="baslik" type="text" value="{{ $u->baslik}}" class="form-control" required>
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <select name="kategori" class="form-select" aria-label="Default select example">
                                                                                    @if ($kategori->count() == 0)
                                                                                    <option >Kategori Yok</option>
                                                                                    @else
                                                                                    @foreach ($kategori as $k )
                                                                    
                                                                                    <option value="{{ $k->kategori}}">{{ $k->kategori }}</option>
                                                                                    @endforeach
                                                                                    @endif
                                      
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
                                                                    <a href="{{ route("filmdelete",$u->id) }}"><button type="button" class="btn btn-primary">Sil</button></a>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="col-6">
                                                    <div class="pagination-area mt-20 mb-20 ">
                                                        <nav class="d-flex " aria-label="pagination">
                                                            <ul class="pagination " >
                                                                {{ $film->appends(['filmara' => request('filmara')])->links('pagination::bootstrap-5') }}
                                
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>


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
							<form method="POST" action="{{ route("filmekle") }} " enctype="multipart/form-data">
                                @csrf
								<div class="row">

									<div class="col-12 ">
										<div class="mb-3">
											<label class="mb-2">Film Adı</label>
											<input name="film_adi" type="text" class="form-control" required>
										</div>
									</div>

                                 

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="mb-2">Kategori</label>
                                            <select name="kategori" class="form-select" aria-label="Default select example">

                                                <option value="Kategori Yok" selected>Kategori Yok</option>
                                                @foreach ($kategori as $k )
                                                <option value="{{ $k->kategori }}">{{ $k->kategori }}</option>
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
        {{-- <script>
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

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



        {{-- <script>
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
        </script> --}}
		<!-- jQuery -->
        @include('adminloyouts.js')
    </body>
</html>
