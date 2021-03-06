<?php
  $mysqli = mysqli_connect('localhost','root','','sion');
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sion inversiones</title>

  <!-- Custom styles for this template-->
  <link href="css/app4.css" rel="stylesheet">
  
  <!--ESTILO DE DATATABLE-->
<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
<!--datables estilo bootstrap 4 CSS-->  
<link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  
<link rel="stylesheet"  type="text/css" href="css/bootstrap.css">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<script src="assets/jquery/jquery-3.3.1.min.js"></script>
</head>

<body class="nav-fixed">
  <!--NAV SUPERIOR-->
  <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-danger" id="sidenavAccordion">
      <!-- Navbar Brand-->
      <!-- * * Tip * * You can use text or an image for your navbar brand.-->
      <!-- * * * * * * When using an image, we recommend the SVG format.-->
      <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
      
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
          <img style="width: 40px;height: 40px;margin-left:10px;" src="fpdf/plantilla/logoB.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3 "><span style="font-size: 20px;color:white;">SION</span></div>
      </a>
      <!-- Sidenav Toggle Button-->
      <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
      <!-- Navbar Search Input-->
      <!-- * * Note: * * Visible only on and above the md breakpoint-->
      <form class="form-inline mr-auto d-none d-md-block mr-3">
          <div class="input-group input-group-joined input-group-solid">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
              </div>
          </div>
      </form>
      <!-- Navbar Items-->
      <ul class="navbar-nav align-items-center ml-auto">
          <!-- Documentation Dropdown-->
          <li class="nav-item dropdown no-caret d-none d-sm-block mr-3">
              <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="font-weight-500">Documentation</div>
                  <svg class="svg-inline--fa fa-chevron-right fa-w-10 dropdown-arrow" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <i class="fas fa-chevron-right dropdown-arrow"></i> Font Awesome fontawesome.com -->
              </a>
              <div class="dropdown-menu dropdown-menu-right py-0 mr-sm-n15 mr-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                  <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro" target="_blank">
                      <div class="icon-stack bg-primary-soft text-primary mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg></div>
                      <div>
                          <div class="small text-gray-500">Documentation</div>
                          Usage instructions and reference
                      </div>
                  </a>
                  <div class="dropdown-divider m-0"></div>
                  <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/components" target="_blank">
                      <div class="icon-stack bg-primary-soft text-primary mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
                      <div>
                          <div class="small text-gray-500">Components</div>
                          Code snippets and reference
                      </div>
                  </a>
                  <div class="dropdown-divider m-0"></div>
                  <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/changelog" target="_blank">
                      <div class="icon-stack bg-primary-soft text-primary mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></div>
                      <div>
                          <div class="small text-gray-500">Changelog</div>
                          Updates and changes
                      </div>
                  </a>
              </div>
          </li>
          <!-- Navbar Search Dropdown-->
          <!-- * * Note: * * Visible only below the md breakpoint-->
          <li class="nav-item dropdown no-caret mr-3 d-md-none">
              <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></a>
              <!-- Dropdown - Search-->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100">
                      <div class="input-group input-group-joined input-group-solid">
                          <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
                          </div>
                      </div>
                  </form>
              </div>
          </li>
          <!-- Alerts Dropdown-->
          <li class="nav-item dropdown no-caret d-none d-sm-block mr-3 dropdown-notifications">
              <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
              <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                  <h6 class="dropdown-header dropdown-notifications-header">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell mr-2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                      Alerts Center
                  </h6>
                  <!-- Example Alert 1-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <div class="dropdown-notifications-item-icon bg-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-details">December 29, 2020</div>
                          <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing serious, but it requires your attention.</div>
                      </div>
                  </a>
                  <!-- Example Alert 2-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <div class="dropdown-notifications-item-icon bg-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-details">December 22, 2020</div>
                          <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click here to view!</div>
                      </div>
                  </a>
                  <!-- Example Alert 3-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <div class="dropdown-notifications-item-icon bg-danger"><svg class="svg-inline--fa fa-exclamation-triangle fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg><!-- <i class="fas fa-exclamation-triangle"></i> Font Awesome fontawesome.com --></div>
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-details">December 8, 2020</div>
                          <div class="dropdown-notifications-item-content-text">Critical system failure, systems shutting down.</div>
                      </div>
                  </a>
                  <!-- Example Alert 4-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <div class="dropdown-notifications-item-icon bg-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-details">December 2, 2020</div>
                          <div class="dropdown-notifications-item-content-text">New user request. Woody has requested access to the organization.</div>
                      </div>
                  </a>
                  <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
              </div>
          </li>
          <!-- Messages Dropdown-->
          <li class="nav-item dropdown no-caret d-none d-sm-block mr-3 dropdown-notifications">
              <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></a>
              <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                  <h6 class="dropdown-header dropdown-notifications-header">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail mr-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                      Message Center
                  </h6>
                  <!-- Example Message 1  -->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-2.png">
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                          <div class="dropdown-notifications-item-content-details">Thomas Wilcox · 58m</div>
                      </div>
                  </a>
                  <!-- Example Message 2-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-3.png">
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                          <div class="dropdown-notifications-item-content-details">Emily Fowler · 2d</div>
                      </div>
                  </a>
                  <!-- Example Message 3-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-4.png">
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                          <div class="dropdown-notifications-item-content-details">Marshall Rosencrantz · 3d</div>
                      </div>
                  </a>
                  <!-- Example Message 4-->
                  <a class="dropdown-item dropdown-notifications-item" href="#!">
                      <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-5.png">
                      <div class="dropdown-notifications-item-content">
                          <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                          <div class="dropdown-notifications-item-content-details">Colby Newton · 3d</div>
                      </div>
                  </a>
                  <!-- Footer Link-->
                  <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
              </div>
          </li>
          <!-- User Dropdown-->
          <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
              <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png"></a>
              <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                  <h6 class="dropdown-header d-flex align-items-center">
                      <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png">
                      <div class="dropdown-user-details">
                          <div class="dropdown-user-details-name">Valerie Luna</div>
                          <div class="dropdown-user-details-email">vluna@aol.com</div>
                      </div>
                  </h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#!">
                      <div class="dropdown-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></div>
                      Account
                  </a>
                  <a class="dropdown-item" href="#!">
                      <div class="dropdown-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg></div>
                      Logout
                  </a>
              </div>
          </li>
      </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sidenav shadow-right sidenav-light">
          <div class="sidenav-menu">
              <div class="nav accordion" id="accordionSidenav">
                
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">INTERFAS PRINCIPAL</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="index.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Dashboard
                </a>
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">CUENTAS</div>
                <!-- Sidenav Accordion (Flows)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg></div>
                    CUENTAS
                    <div class="sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></div>
                </a>
                <div class="collapse" id="collapseFlows" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="Nueva_Venta.php">Nueva Venta</a>
                        <a class="nav-link" href="cuentas.php">Cuentas Generales</a>
                        <a class="nav-link" href="cuentas-activas.php">CUENTAS ACTIVAS</a>
                        <a class="nav-link" href="cuentas-inactivas.php">CUENTAS INACTIVAS</a>
                    </nav>
                </div>
                <a class="nav-link" href="productos.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Productos
                </a>
                <a class="nav-link" href="clientes.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Clientes
                </a>
                <a class="nav-link" href="boletas.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Boletas
                </a>
                <a class="nav-link" href="Vendedores.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Vendedores
                </a>
                 <!-- Sidenav Menu Heading (Core)-->
                 <div class="sidenav-menu-heading">GESTION</div>
                 <a class="nav-link" href="Vendedores.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    G. de Ventas
                  </a>
                 <a class="nav-link" href="Asistencia.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Asistencia
                  </a>
                 <a class="nav-link" href="Licitaciones.php">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                    Licitaciones
                  </a>
              </div>
          </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
<br>
    
        <!-- End of Topbar -->
