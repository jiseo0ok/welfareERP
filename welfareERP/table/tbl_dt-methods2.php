<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>복지얌 빵빵아</title>
  <!-- [Meta] -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="description"
    content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."
  />
  <meta name="author" content="phoenixcoded" />

  <!-- [Favicon] icon -->
  <link rel="icon" href="../assets/images/title_logo.png" type="image/x-icon" />

  <link rel="stylesheet" href="../assets/css/plugins/style.css">
  <!-- [Google Font : Public Sans] icon -->
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/fonts/font.css">
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="../assets/fonts/feather.css" >
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="../assets/fonts/fontawesome.css" >
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="../assets/fonts/material.css" >
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >
  <link rel="stylesheet" href="../assets/css/style-preset.css" >
  
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
 <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <img src="../assets/images/logo.png" width="185" alt="logo image" />
        <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version"></span>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label class="dash">관리자 메뉴</label>
          <span id="timerDisplay"></span>
          <span id="userNameDisplay"></span>
          <i class="ph-duotone ph-textbox"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon"><i class="ph-duotone ph-gear-six"></i></span>
            <span class="pc-mtext">정책 관리</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
           
            <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../forms/form_elements.html">정책 등록</a></li>
           <li class="pc-item"><a class="pc-link" href="../table/tbl_dt-methods.php">지원 현황</a></li>
            
            <li class="pc-item pc-hasmenu">
              <a class="pc-link" href="#">정책 수행<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="../forms/form2_datepicker.html">지원금 관리</a></li>
                <li class="pc-item"><a class="pc-link" href="../forms/form2_daterangepicker.html">복지사 관리</a> </li>
              </ul>
            </li>
          </ul>
        </li>
    </div>
    <div class="card pc-user-card">
      <div class="card-body">
        <!-- <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
            <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle" />
          </div>
          <div class="flex-grow-1 ms-3 me-2">
            <h6 class="mb-0">Jonh Smith</h6>
            <small>Administrator</small>
          </div>
          <div class="dropdown">
            <a
              href="#"
              class="btn btn-icon btn-link-secondary avtar arrow-none dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              data-bs-offset="0,20"
            >
              <i class="ph-duotone ph-windows-logo"></i>
            </a>
            <div class="dropdown-menu">
              <ul>
                <li
                  ><a class="pc-user-links">
                    <i class="ph-duotone ph-user"></i>
                    <span>My Account</span>
                  </a></li
                >
                <li
                  ><a class="pc-user-links">
                    <i class="ph-duotone ph-gear"></i>
                    <span>Settings</span>
                  </a></li
                >
                <li
                  ><a class="pc-user-links">
                    <i class="ph-duotone ph-lock-key"></i>
                    <span>Lock Screen</span>
                  </a></li
                >
                <li
                  ><a class="pc-user-links">
                    <i class="ph-duotone ph-power"></i>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->
 <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph-duotone ph-magnifying-glass"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search..." />
            <button class="btn btn-light-secondary btn-search">Search</button>
          </div>
        </form>
      </div>
    </li>
    <!-- <li class="pc-h-item d-none d-md-inline-flex">
      <form class="form-search">
        <i class="ph-duotone ph-magnifying-glass icon-search"></i>
        <input type="search" class="form-control" placeholder="Search..." />

        <button class="btn btn-search" style="padding: 0"><kbd>ctrl+k</kbd></button>
      </form>
    </li> -->
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" aria-expanded="false">
        <i class="ph-duotone ph-sun-dim"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
          <i class="ph-duotone ph-moon"></i>
          <span>Dark</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
          <i class="ph-duotone ph-sun-dim"></i>
          <span>Light</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change_default()">
          <i class="ph-duotone ph-cpu"></i>
          <span>Default</span>
        </a>
      </div>
    </li>
    <li class="pc-h-item">
      <a class="pc-head-link" href="../index.html">
        <i class="ph-duotone ph-house"></i>
      </a>
    </li>
    <!-- <li class="pc-h-item">
      <a class="pc-head-link pct-c-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
        <i class="ph-duotone ph-gear-six"></i>
      </a>
    </li> -->
    <!-- <li class="dropdown pc-h-item">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" aria-expanded="false">
        <i class="ph-duotone ph-diamonds-four"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <a href="#!" class="dropdown-item">
          <i class="ph-duotone ph-user"></i>
          <span>My Account</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph-duotone ph-gear"></i>
          <span>Settings</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph-duotone ph-lifebuoy"></i>
          <span>Support</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph-duotone ph-lock-key"></i>
          <span>Lock Screen</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph-duotone ph-power"></i>
          <span>Logout</span>
        </a>
      </div>
    </li> -->
    <!-- <li class="dropdown pc-h-item">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" aria-expanded="false">
        <i class="ph-duotone ph-bell"></i>
        <span class="badge bg-success pc-h-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Notifications</h5>
          <ul class="list-inline ms-auto mb-0">
            <li class="list-inline-item">
              <a href="../application/mail.html" class="avtar avtar-s btn-link-hover-primary">
                <i class="ti ti-link f-18"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="dropdown-body text-wrap header-notification-scroll position-relative"
          style="max-height: calc(100vh - 235px)">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <p class="text-span">Today</p>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                    class="user-avtar avtar avtar-s" />
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="d-flex">
                    <div class="flex-grow-1 me-3 position-relative">
                      <h6 class="mb-0 text-truncate">Keefe Bond added new tags to 💪 Design system</h6>
                    </div>
                    <div class="flex-shrink-0">
                      <span class="text-sm">2 min ago</span>
                    </div>
                  </div>
                  <p class="position-relative mt-1 mb-2"><br /><span class="text-truncate">Lorem Ipsum has been
                      the industry's standard dummy text ever since the 1500s.</span></p>
                  <span class="badge bg-light-primary border border-primary me-1 mt-1">web design</span>
                  <span class="badge bg-light-warning border border-warning me-1 mt-1">Dashobard</span>
                  <span class="badge bg-light-success border border-success me-1 mt-1">Design System</span>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s bg-light-primary">
                    <i class="ph-duotone ph-chats-teardrop f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="d-flex">
                    <div class="flex-grow-1 me-3 position-relative">
                      <h6 class="mb-0 text-truncate">Message</h6>
                    </div>
                    <div class="flex-shrink-0">
                      <span class="text-sm">1 hour ago</span>
                    </div>
                  </div>
                  <p class="position-relative mt-1 mb-2"><br /><span class="text-truncate">Lorem Ipsum has been
                      the industry's standard dummy text ever since the 1500s.</span></p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <p class="text-span">Yesterday</p>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s bg-light-danger">
                    <i class="ph-duotone ph-user f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="d-flex">
                    <div class="flex-grow-1 me-3 position-relative">
                      <h6 class="mb-0 text-truncate">Challenge invitation</h6>
                    </div>
                    <div class="flex-shrink-0">
                      <span class="text-sm">12 hour ago</span>
                    </div>
                  </div>
                  <p class="position-relative mt-1 mb-2"><br /><span class="text-truncate"><strong> Jonny aber
                      </strong> invites to join the challenge</span></p>
                  <button class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                  <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s bg-light-info">
                    <i class="ph-duotone ph-notebook f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="d-flex">
                    <div class="flex-grow-1 me-3 position-relative">
                      <h6 class="mb-0 text-truncate">Forms</h6>
                    </div>
                    <div class="flex-shrink-0">
                      <span class="text-sm">2 hour ago</span>
                    </div>
                  </div>
                  <p class="position-relative mt-1 mb-2">Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s.</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                    class="user-avtar avtar avtar-s" />
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="d-flex">
                    <div class="flex-grow-1 me-3 position-relative">
                      <h6 class="mb-0 text-truncate">Keefe Bond added new tags to 💪 Design system</h6>
                    </div>
                    <div class="flex-shrink-0">
                      <span class="text-sm">2 min ago</span>
                    </div>
                  </div>
                  <p class="position-relative mt-1 mb-2"><br /><span class="text-truncate">Lorem Ipsum has been
                      the industry's standard dummy text ever since the 1500s.</span></p>
                  <button class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                  <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s bg-light-success">
                    <i class="ph-duotone ph-shield-checkered f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <div class="d-flex">
                    <div class="flex-grow-1 me-3 position-relative">
                      <h6 class="mb-0 text-truncate">Security</h6>
                    </div>
                    <div class="flex-shrink-0">
                      <span class="text-sm">5 hour ago</span>
                    </div>
                  </div>
                  <p class="position-relative mt-1 mb-2">Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s.</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="dropdown-footer">
          <div class="row g-3">
            <div class="col-6">
              <div class="d-grid"><button class="btn btn-primary">Archive all</button></div>
            </div>
            <div class="col-6">
              <div class="d-grid"><button class="btn btn-outline-secondary">Mark all as read</button></div>
            </div>
          </div>
        </div>
      </div>
    </li> -->
    <!-- <li class="dropdown pc-h-item header-user-profile">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
        <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Profile</h5>
        </div>
        <div class="dropdown-body">
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
            <ul class="list-group list-group-flush w-100">
              <li class="list-group-item">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                      class="wid-50 rounded-circle" />
                  </div>
                  <div class="flex-grow-1 mx-3">
                    <h5 class="mb-0">Carson Darrin</h5>
                    <a class="link-primary" href="mailto:carson.darrin@company.io">carson.darrin@company.io</a>
                  </div>
                  <span class="badge bg-primary">PRO</span>
                </div>
              </li>
              <li class="list-group-item">
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-key"></i>
                    <span>Change password</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-envelope-simple"></i>
                    <span>Recently mail</span>
                  </span>
                  <div class="user-group">
                    <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="avtar" />
                    <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="avtar" />
                    <img src="../assets/images/user/avatar-3.jpg" alt="user-image" class="avtar" />
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-calendar-blank"></i>
                    <span>Schedule meetings</span>
                  </span>
                </a>
              </li>
              <li class="list-group-item">
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-heart"></i>
                    <span>Favorite</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-arrow-circle-down"></i>
                    <span>Download</span>
                  </span>
                  <span class="avtar avtar-xs rounded-circle bg-danger text-white">10</span>
                </a>
              </li>
              <li class="list-group-item">
                <div class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-globe-hemisphere-west"></i>
                    <span>Languages</span>
                  </span>
                  <span class="flex-shrink-0">
                    <select class="form-select bg-transparent form-select-sm border-0 shadow-none">
                      <option value="1">English</option>
                      <option value="2">Spain</option>
                      <option value="3">Arbic</option>
                    </select>
                  </span>
                </div>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-flag"></i>
                    <span>Country</span>
                  </span>
                </a>
                <div class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-moon"></i>
                    <span>Dark mode</span>
                  </span>
                  <div class="form-check form-switch form-check-reverse m-0">
                    <input class="form-check-input f-18" id="dark-mode" type="checkbox" onclick="dark_mode()"
                      role="switch" />
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-user-circle"></i>
                    <span>Edit profile</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-star text-warning"></i>
                    <span>Upgrade account</span>
                    <span class="badge bg-light-success border border-success ms-2">NEW</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-bell"></i>
                    <span>Notifications</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-gear-six"></i>
                    <span>Settings</span>
                  </span>
                </a>
              </li>
              <li class="list-group-item">
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-plus-circle"></i>
                    <span>Add account</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-power"></i>
                    <span>Logout</span>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </li> -->
  </ul>
</div>
 </div>
</header>
<!-- [ Header ] end -->



  <!-- [ Main Content ] start -->
  <section class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">관리자 메뉴</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">정책 관리</a></li>
                <li class="breadcrumb-item" aria-current="page">지원 현황</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <br>
                <h2 class="mb-0">지원 현황</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      
      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ basic-table ] start -->
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h5>지원 현황</h5>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="d-flex align-items-center">
                  <span class="m-t-5 me-3">지원 현황을 선택하세요:</span>
                  <div style="text-align: right;">
                    <select class="form-select" style="width: auto; padding: 0.5rem 2rem 0.5rem 0.5rem; border-radius: 5px; border: 1px solid #ced4da;" onchange="window.location.href=this.value">
                      <option value="../table/tbl_dt-methods.php" >현재지원</option>
                      <option value="../table/tbl_dt-methods1.php">거절지원</option>
                      <option value="../table/tbl_dt-methods_completed.php" selected>수락지원</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
           
            <div class="card-body table-border-style">
              <div class="table-responsive">
                <table class="table" id="pc-dt-methods">
                  <thead>
                    <tr>
                      
                        <th><input type="checkbox" name = "checkall" id = "chkRowAll"></th>
                        
                        <th>등록번호</th>
                        <th>정책번호</th>
                        <th>정책혜택</th>
                        <th>정책혜택상세</th>
                        <th>신청자</th>
                        <th>지역</th>
                        <th>주민등록번호</th>
                        <th>이메일</th>
                        <th>전화번호</th>
                        <th>등록문서</th>
                    </tr>
                </thead>
                <tbody id="policy_enter_list">
                <?php
// 데이터베이스 연결 설정
$host = "localhost"; // 데이터베이스 서버 주소
$username = "root"; // 데이터베이스 사용자 이름
$password = ""; // 데이터베이스 비밀번호
$dbname = "bhero"; // 데이터베이스 이름

// MySQLi 객체 생성 및 연결
$conn = new mysqli($host, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 쿼리 실행
$sql = "SELECT * FROM application as a, policy as p, policy_condition as pc, application_state as asd WHERE a.policy_id = p.policy_id and p.policy_id = pc.policy_id and pc.condition_category= '지역' 
and a.application_id = asd.application_id and asd.state = 'yes'"; // your_table_name은 데이터를 가져올 테이블 이름
$result = $conn->query($sql);


    // 데이터베이스에서 가져온 데이터를 행으로 출력
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='chkRow'></td>";
            echo "<td>" . htmlspecialchars($row['application_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['policy_id']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['policy_benefits']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['policy_benefits_detail']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['application_name']) . "</td>";// 'name'은 열 이름
            echo "<td>" . htmlspecialchars($row['condition_detail']) . "</td>";
            echo "<td>" . htmlspecialchars($row['application_resident_registration_number']) . "</td>"; // 'policy_name'은 열 이름
            echo "<td>" . htmlspecialchars($row['application_email']) . "</td>"; // 'email'은 열 이름
            echo "<td>" . htmlspecialchars($row['application_phone']) . "</td>"; // 'phone_number'은 열 이름
            echo "<td><a href='../dashboard/file/" . htmlspecialchars($row['application_document']) . "' download>" . htmlspecialchars($row['application_document']) . "</a></td>"; // 'documents'은 열 이름
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }
  
    ?>
                </tbody>
                </table>
              </div>
              <div class="button-container text-end"> <!-- 버튼 컨테이너 추가, 오른쪽 정렬 -->
                <!-- <button type="button" class="btn btn-sm btn-light-primary main" id="btnClick">수락</button>
                <button type="button" class="btn btn-sm btn-light-danger main" id="destroy">거절</button> -->
              </div>
              
            </div>
            
          </div>
          
        </div>
        <!-- [ basic-table ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </section>
  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        
      </div>
    </div>
  </footer>
 <!-- Required Js -->
<script src="../assets/js/plugins/popper.min.js"></script>
<script src="../assets/js/plugins/simplebar.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/fonts/custom-font.js"></script>
<script src="../assets/js/pcoded.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>






<script>layout_change('light');</script>




<script>layout_sidebar_change('light');</script>



<script>change_box_container('false');</script>


<script>layout_caption_change('true');</script>




<script>layout_rtl_change('false');</script>


<script>preset_change("preset-1");</script>

  <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
    <div class="offcanvas-header justify-content-between">
      <h5 class="offcanvas-title">Settings</h5>
      <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i
          class="ti ti-x"></i></button>
    </div>
    <div class="pct-body customizer-body">
      <div class="offcanvas-body py-0">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="pc-dark">
              <h6 class="mb-1">Theme Mode</h6>
              <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
              <div class="row theme-color theme-layout">
                <div class="col-4">
                  <div class="d-grid">
                    <button class="preset-btn btn active" data-value="true" onclick="layout_change('light');">
                      <span class="btn-label">Light</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                    </button>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="false" onclick="layout_change('dark');">
                      <span class="btn-label">Dark</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                    </button>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="default" onclick="layout_change_default();"
                      data-bs-toggle="tooltip"
                      title="Automatically sets the theme based on user's operating system's color scheme.">
                      <span class="btn-label">Default</span>
                      <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                        <i class="ph-duotone ph-cpu"></i>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <h6 class="mb-1">Sidebar Theme</h6>
            <p class="text-muted text-sm">Choose Sidebar Theme</p>
            <div class="row theme-color theme-sidebar-color">
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn" data-value="true" onclick="layout_sidebar_change('dark');">
                    <span class="btn-label">Dark</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn active" data-value="false" onclick="layout_sidebar_change('light');">
                    <span class="btn-label">Light</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <h6 class="mb-1">Accent color</h6>
            <p class="text-muted text-sm">Choose your primary theme color</p>
            <div class="theme-color preset-color">
              <a href="#!" class="active" data-value="preset-1"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-2"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-3"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-4"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-5"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-6"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-7"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-8"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-9"><i class="ti ti-check"></i></a>
              <a href="#!" data-value="preset-10"><i class="ti ti-check"></i></a>
            </div>
          </li>
          <li class="list-group-item">
            <h6 class="mb-1">Sidebar Caption</h6>
            <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
            <div class="row theme-color theme-nav-caption">
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn active" data-value="true" onclick="layout_caption_change('true');">
                    <span class="btn-label">Caption Show</span>
                    <span
                      class="pc-lay-icon"><span></span><span></span><span><span></span><span></span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn" data-value="false" onclick="layout_caption_change('false');">
                    <span class="btn-label">Caption Hide</span>
                    <span
                      class="pc-lay-icon"><span></span><span></span><span><span></span><span></span></span><span></span></span>
                  </button>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="pc-rtl">
              <h6 class="mb-1">Theme Layout</h6>
              <p class="text-muted text-sm">LTR/RTL</p>
              <div class="row theme-color theme-direction">
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn active" data-value="false" onclick="layout_rtl_change('false');">
                      <span class="btn-label">LTR</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="true" onclick="layout_rtl_change('true');">
                      <span class="btn-label">RTL</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item pc-box-width">
            <div class="pc-container-width">
              <h6 class="mb-1">Layout Width</h6>
              <p class="text-muted text-sm">Choose Full or Container Layout</p>
              <div class="row theme-color theme-container">
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn active" data-value="false" onclick="change_box_container('false')">
                      <span class="btn-label">Full Width</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span><span></span></span></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="true" onclick="change_box_container('true')">
                      <span class="btn-label">Fixed Width</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span><span></span></span></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="d-grid">
              <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- [Page Specific JS] start -->
  <script type="module">
    import { DataTable, convertJSON, convertCSV, exportCSV, exportSQL, exportJSON } from "../assets/js/plugins/module.js"
    const createElement = (nodeName, attrs) => {
      const dom = document.createElement(nodeName)
      if (attrs && "object" == typeof attrs) {
        for (const attr in attrs) {
          if ("text" === attr) {
            const text = document.createTextNode(attrs[attr])
            dom.appendChild(text)
          } else if ("html" === attr) {
            dom.innerHTML = attrs[attr]
          } else {
            dom.setAttribute(attr, attrs[attr])
          }
        }
      }
      return dom
    }
    const checkboxes = document.getElementById("columns"),
      table = document.querySelector('#pc-dt-methods'),
      textarea = document.getElementsByTagName("textarea")[0]
    const hidden = [],
      visible = []
    let inputs = []
    const datatable = new DataTable(table, {
      perPage: 5,
      columns: [
        {
          select: [1, 4, 5],
          type: "html"
        }
      ]
    })
    window.datatable = datatable
    const updateColumns = function () {
      datatable.columns.show(visible)
      datatable.columns.hide(hidden)
    }
    const setCheckboxes = function () {
      inputs = []
      while (visible.length) {
        visible.pop()
      }
      while (hidden.length) {
        hidden.pop()
      }
      checkboxes.innerHTML = ""
      datatable.data.headings.forEach((heading, i) => {
          const checkbox = createElement('div', {
            class: 'checkbox form-check'
          });
          const input = createElement('input', {
            type: 'checkbox',
            class: 'form-check-input',
            id: `checkbox-${i}`,
            name: 'checkbox'
          });
          const label = createElement('label', {
            for: `checkbox-${i}`,
            class: 'form-check-label',
            html: heading.data
          });
        input.idx = i
        if (datatable.columns.visible(i)) {
          input.checked = true
          visible.push(i)
        } else {
          if (hidden.indexOf(i) < 0) {
            hidden.push(i)
          }
        }
        checkbox.appendChild(input)
        checkbox.appendChild(label)
        checkboxes.appendChild(checkbox)
        inputs.push(input)
      })
      inputs.forEach(input => {
        input.onchange = function (_event) {
          if (input.checked) {
            hidden.splice(hidden.indexOf(input.idx), 1)
            visible.push(input.idx)
          } else {
            visible.splice(visible.indexOf(input.idx), 1)
            hidden.push(input.idx)
          }
          updateColumns()
        }
      })
    }

    datatable.on("datatable.init", () => {
      setCheckboxes()
    })
    window.dt = datatable
    textarea.addEventListener("input", function (_event) {
      if (this.value.length) {
        this.parentNode.classList.remove("error")
      }
    })
    document.querySelectorAll(".export").forEach(el => {
      el.addEventListener("click", _event => {
        const type = el.dataset.type
        const data = {
          filename: `my-${type}`
        }
        if (type === "csv") {
          data.columnDelimiter = ","
        }
        if (type === "csv") {
          exportCSV(datatable, data)
        } else if (type === "json") {
          exportJSON(datatable, data)
        } else if (type === "sql") {
          exportSQL(datatable, data)
        }

      })
    })
    document.querySelectorAll(".main").forEach(el => {
      el.addEventListener("click", _event => {
        datatable[el.id]()
        setTimeout(() => {
          document.getElementById("hide").classList.toggle("hidden", !datatable.initialized)
          table.classList.toggle("table", !datatable.initialized)
        }, 10)
      })
    })
    document.querySelectorAll(".import").forEach(el => {
      el.addEventListener("click", _event => {
        const type = el.dataset.type
        const data = {
          data: textarea.value
        }
        textarea.parentNode.classList.remove("error")
        if (!data.data.length) {
          textarea.parentNode.classList.add("error")
          return false
        }
        if (type === "csv") {
          const convertedData = convertCSV(data)
          datatable.insert(convertedData)
        } else if (type === "json") {
          const convertedData = convertJSON(data)
          datatable.insert(convertedData)
        }

      })
    })
  </script>
  <!-- [Page Specific JS] end -->
  <script>
    function init() {
      // 체크박스는 Header의 ID와 Body의 NAME을 아래의 형식으로 맞춰줘야 정상적으로 동작합니다.
      // Ex) Header's id="chkRowAll", Body's name="chkRow"
      // Header에 있는 체크박스 변경시
      $(document).on('change', 'input[id$="All"]:checkbox', function() {
        fncCheckAll($(this).attr('id'));
      });
  
      // 모두 체크된 경우 Header 체크박스를 변경
      $(document).on('change', 'input:checkbox', function() {
        var chgId = $(this).attr('id') || '';
        var chgNm = $(this).attr('name') || '';
  
        // 다른 Checkbox에 영향이 가지 않도록 id 와 name 값이 'chk'로 시작하는 Checkbox만 대상으로 함
        if (chgId.indexOf('chk') == -1 && chgNm.indexOf('chk') == -1) return;
  
        // id 와 name 값이 모두 없는 경우 제외
        if (isNullStr(chgId) && isNullStr(chgNm)) return;
  
        // Header(ID가 '%All'로 끝나는)에 있는 CheckBox인 경우는 제외
        if (chgId.indexOf('All') > -1) return;
  
        var totLen = $('input[name=' + chgNm + ']').length;
        var chkLen = $('input[name=' + chgNm + ']:checked').length;
  
        // 목록에 있는 CheckBox가 모두 체크된 경우 Header도 체크되도록 설정
        if (totLen == chkLen) {
          $('#' + chgNm + 'All').prop('checked', true);
        } else {
          $('#' + chgNm + 'All').prop('checked', false);
        }
      });
      
      // 버튼 클릭 Event
      $('#btnClick').click(function() {
        var selectedNames = [];
        
        $('#pc-dt-methods tbody tr').each(function() {
          // 체크박스가 체크된 행만 처리합니다.
          if ($(this).find('input[type="checkbox"]').is(':checked')) {
            // '성명' 열의 값을 가져옵니다. 이 예제에서는 '성명'이 두 번째 열이라고 가정합니다.
            var name = $(this).find('td').eq(1).text().trim(); // '성명'이 두 번째 열에 위치한다고 가정하고, trim()으로 공백 제거
            selectedNames.push(name);
          }
        });

        if (selectedNames.length > 0) {
          alert(selectedNames.join(', ') + " 등록 완료");
         
          $.post('../dashboard/php/enter.php', {selectedNames: selectedNames});
          
        } else {
          alert("선택된 행이 없습니다.");
        }
      });
    
  
      $('#destroy').click(function() {
        var selectedNames = [];
        
        $('#pc-dt-methods tbody tr').each(function() {
          // 체크박스가 체크된 행만 처리합니다.
          if ($(this).find('input[type="checkbox"]').is(':checked')) {
            // '성명' 열의 값을 가져옵니다. 이 예제에서는 '성명'이 두 번째 열이라고 가정합니다.
            var name = $(this).find('td').eq(1).text().trim(); // '성명'이 두 번째 열에 위치한다고 가정하고, trim()으로 공백 제거
            selectedNames.push(name);
          }
        });

        if (selectedNames.length > 0) {
          alert(selectedNames.join(', ') + " 삭제 완료");
         
          $.post('../dashboard/php/destroy.php', {selectedNames: selectedNames});
          
        } else {
          alert("선택된 행이 없습니다.");
        }
      });
    }
  
    function fncCheckAll(id) {
      var targetNm = id.replace('All', '');
      if ($('#' + id).is(':checked')) {
        $('input[name=' + targetNm + ']').each(function() {
          $(this).prop('checked', true);
        });
      } else {
        $('input[name=' + targetNm + ']').each(function() {
          $(this).prop('checked', false);
        });
      }
    }
  
    function isNullStr(str) {
      str = $.trim(str);
      if (str == null || str == 'undefined' || str.length == 0 || typeof str == 'undefined' || str == '') {
        return true;
      } else {
        return false;
      }
    }
  
    $(document).ready(function() {
      init(); // check.js에서 정의된 init 함수를 호출
    });
  </script>
  <script>
    $(document).ready(function() {
      numberTableRows();
    });
  
    function numberTableRows() {
      $('#pc-dt-methods tbody tr').each(function(index) {
        // 체크박스 다음에 번호를 삽입합니다.
        //$(this).find('td').eq(0).after('<td>' + (index + 1) + '</td>');
      });
    }
  </script>
<script>
  window.onload = function() {
    // localStorage에서 remainingTime 읽기
    let remainingTime = parseInt(sessionStorage.getItem('remainingTimeAdmin'));

    // 타이머를 업데이트하는 함수
    function updateTimer() {
      let minutes = Math.floor(remainingTime / 60);
      let seconds = remainingTime % 60;
      document.getElementById('timerDisplay').innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

      if (remainingTime > 0) {
        remainingTime--;
        sessionStorage.setItem('remainingTimeAdmin', remainingTime);
      } else {
        clearInterval(timerInterval);
        alert('세션이 만료되었습니다. 다시 로그인 해주세요.');
        sessionStorage.removeItem('adminLoggedIn');
        sessionStorage.removeItem('remainingTimeAdmin'); // 타이머 초기화
        if (!sessionStorage.getItem('adminLoggedIn')) {
          window.location.href = '../dashboard/index.html#';
        }
      }
    }
    
    // 타이머 시작
    let timerInterval = setInterval(updateTimer, 1000);

    // 타이머를 표시할 요소가 필요합니다.
    if (!document.getElementById('timerDisplay')) {
      let timerElement = document.createElement('div');
      timerElement.id = 'timerDisplay';
      document.body.appendChild(timerElement);
    }
    let userName = sessionStorage.getItem('userName');
  if (userName) {
    document.getElementById('userNameDisplay').innerText = `환영합니다, ${userName}!`;
  }
  }
</script>
</body>
<!-- [Body] end -->

</html>