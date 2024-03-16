
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
    <div class="header-left">
        <a href="/Admin-AnaSayfa" class="logo">
            <img src="assets/resim/1.png" alt="Logo">
        </a>
        <a href="/Admin-AnaSayfa" class="logo logo-small">
            <img src="assets/resim/1small.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Buradan arayın">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!-- Mobil Menü Aç/Kapat -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobil Menü Aç/Kapat -->

    <!-- Header Sağ Menü -->
    <ul class="nav user-menu">

         <!-- Bildirimler -->
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fe fe-bell"></i> <span class="badge rounded-pill">3</span>
            </a>
            <!-- Bildirim Menüsü -->
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Bildirimler</span>
                    <a href="javascript:void(0)" class="clear-noti"> Hepsini Temizle </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <!-- Bildirim Öğeleri -->
                        <!-- ... -->
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">Tüm Bildirimleri Gör</a>
                </div>
            </div>
        </li>
        <!-- /Bildirimler -->

        <!-- Kullanıcı Menüsü -->
         {{-- <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
            </a>
            <!-- Kullanıcı Menüsü İçeriği -->
            <div class="dropdown-menu">
                <!-- ... -->
            </div>
        </li> -- --}}
        <!-- /Kullanıcı Menüsü -->

    </ul>
    <!-- /Header Sağ Menü -->

</div>
<!-- /Header -->

<!-- Kenar Çubuğu -->
<div style="background-color: #dc3545;" class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Menü Başlığı -->
                <li class="menu-title">
                    <span>Anasayfa</span>
                </li>
                <!-- Ana Sayfa -->
                {{-- <li >
                    <a href="{{ route("homeadmin") }}"><i class="fe fe-home"></i> <span>Ana Sayfa</span></a>
                </li> --}}
                <!-- Randevular -->
                {{-- -- <li>
                    <a href="{{ route("randevutur") }}"><i class="fe fe-layout"></i> <span>Randevular</span></a>
                </li> --}}

                {{-- <li>
                    <a href="{{ route("randevutur") }}"><i class="fe fe-layout"></i> <span>Randevu Aalanlar</span></a>
                </li> --}}
                <!-- Uzmanlık Alanları -->
                {{-- <li>
                    <a href="{{ route("uzmanlık") }}"><i class="fe fe-users"></i> <span>Uzmanlık Alanları</span></a>
                </li> --}}


                {{-- <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Tibbi Datalar</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">

                        <li>
                            <a href="{{ route("hastaneler") }}"><i class="fe fe-upload"></i> <span>Hastaneler</span></a>
                        </li>
                        <li>
                            <a href="{{ route("labaratuvar") }}"><i class="fe fe-upload"></i> <span>Labaratuvar</span></a>
                        </li>
                        <li>
                            <a href="{{ route("alerjiler") }}"><i class="fe fe-upload"></i> <span>Alerjiler</span></a>
                        </li>
                        <li>
                            <a href="{{ route("ehospital.admin") }}"><i class="fe fe-upload"></i> <span>Alışkanlıklar</span></a>
                        </li>
                        <li>
                            <a href="{{ route("Hastaliklar") }}"><i class="fe fe-upload"></i> <span>Hastaliklar</span></a>
                        </li>
                        <li>
                            <a href="{{ route("ilaçlar") }}"><i class="fe fe-upload"></i> <span>İlaçlar</span></a>
                        </li>
                        <li>
                            <a href="{{ route("tedavi") }}"><i class="fe fe-upload"></i> <span>Tedaviler</span></a>
                        </li>
                    </ul>
                </li> --}}

                <!-- Doktorlar -->
                {{-- <li>
                    <a href="{{ route("doctoradd") }}"><i class="fe fe-user-plus"></i> <span>Doktorlar</span></a>
                </li> --}}
                <!-- Hastalar -->
                {{-- <li>
                    <a href="{{ route("hasta") }}"><i class="fe fe-user"></i> <span>Hastalar</span></a>
                </li> --}}
                <!-- İncelemeler -->
                {{-- <li>
                    <a href="{{ route("useraddd") }}"><i class="fe fe-user"></i> <span>Üyeler</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route("yorumlarget") }}"><i class="fe fe-user"></i> <span>Yorumlar</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route("contactget") }}"><i class="fe fe-user"></i> <span>İletişim</span></a>
                </li> --}}
                <!-- İşlemler -->
                {{-- <li>
                    <a href="{{ route("siparişler") }}"><i class="fe fe-activity"></i> <span>Siparişler</span></a>
                </li> --}}
                <!-- Ayarlar -->

                {{-- <li>
                    <a href="{{ route("Kuponlar") }}"><i class="fe fe-activity"></i> <span>Kuponlar</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route("slider") }}"><i class="fe fe-camera"></i> <span>Slider Ekle</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route("bloglarım") }}"><i class="fe fe-camera"></i> <span>BLOG</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route("topbar") }}"><i class="fe fe-camera"></i> <span>Top Bar Düzenle</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route("projeler") }}"><i class="fe fe-book"></i> <span>Projeler</span></a>
                </li> --}}
                <li>
                    <a href="{{ route("index") }}"><i class="fe fe-heart"></i> <span>Ürün Ekle</span></a>
                </li>
                {{-- <li>
                    <a href="{{ route("blogkategori") }}"><i class="fe fe-activity"></i> <span>Blog Kategori Ekle</span></a>
                </li> --}}
                <li>
                    <a href="{{ route("kategori") }}"><i class="fe fe-activity"></i> <span>Ürün Kategori Ekle</span></a>
                </li>
                {{-- <li class="">
                    <a href="/"><i class="fe fe-vector"></i> <span>Ana Sayfaya Dön</span></a>
                </li> --}}
                {{-- <li class="">
                    <a href="{{ route("user.logout") }}"><i class="fe fe-close"></i> <span>Çıkış Yap</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

