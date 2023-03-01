<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Customers Relationship Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" crossorigin />
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <!-- Full Calender -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <!-- <link rel="stylesheet" href="css/demo.css" /> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/demo.css') }}" />
  

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <!-- <link rel="stylesheet" href="css/demo.css" /> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/demo.css') }}" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              
              <img src="assets/img/LogoKalla.jpg" alt="" width="150">
                  
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard & Agent</span>
            </li>
              <li class="menu-item">
                <a href="/dashboard" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/agent" class="menu-link"> 
                  <i class="menu-icon tf-icons bx bx-user-circle"></i>
                  <div data-i18n="Analytics">Agent</div>
                </a>
              </li>

              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Message & Data List</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-chat"></i>
                  <div data-i18n="Layouts">Message</div>
                </a>
  
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="/pm" class="menu-link">
                      <div data-i18n="Without menu">Personal Message</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="/bm" class="menu-link">
                      <div data-i18n="Without navbar">Broadcast Message</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class=' menu-icon bx bx-folder-open'></i>
                  <div data-i18n="Layouts">Data List</div>
                </a>
  
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="/message" class="menu-link">
                      <div data-i18n="Without menu">List Message</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="/grouplist" class="menu-link">
                      <div data-i18n="Without navbar">List Group</div>
                    </a>
                  </li>
                </ul>
              </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Live Message & Contact</span>
              </li>

              <li class="menu-item">
                <a href="/dashboard" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-conversation"></i>
                  <div data-i18n="Analytics">Live Chat</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/contact" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-contact"></i>
                  <div data-i18n="Analytics">Contact</div>
                </a>
              </li>

              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Customers</span>
            </li>

            <li class="menu-item">
              <a href="/customers" class="menu-link">
                <i class="menu-icon tf-icons bx bx-face"></i>
                <div data-i18n="Analytics">Customers</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="/transaksi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                <div data-i18n="Analytics">Transaksi</div>
              </a>
            </li>

              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Event & Promo List</span>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Layouts">Event</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/event" class="menu-link">
                    
                    <div data-i18n="Analytics">Kalender</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/listevent" class="menu-link">
                    <div data-i18n="Analytics">Event List</div>
                  </a>
                </li>
              </ul>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx bx-store-alt"></i>
                  <div data-i18n="Layouts">Promo</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="/toyota" class="menu-link">
                      <div data-i18n="Analytics">Kalla Toyota</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="/listevent" class="menu-link">
                      <div data-i18n="Analytics">Bukit Baruga</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="/listevent" class="menu-link">
                      <div data-i18n="Analytics">Benelli</div>
                    </a>
                  </li>
                </ul>
              </li>
            </li>

              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Authentication</span>
            </li>
                <li class="menu-item">
                  <a href="/user" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-face"></i>
                    <div data-i18n="Analytics">User</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/dashboard" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
                    <div data-i18n="Analytics">Log Out</div>
                  </a>
                </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search."
                    aria-label="Search."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('img/avatars/Llen.jpeg') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('img/avatars/Llen.jpeg') }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Llen Developer</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <!-- Layout Demo -->

                <!--/  Kontent -->
                
                <!--/  End Kontent -->
                
               
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->

           

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('vendor/js/core.js') }}"></script>
    <!-- build:js assets/vendor/js/core.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Full calender -->
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
    <!-- <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script> -->
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  </body>
</html>