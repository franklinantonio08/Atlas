
        <div class="sidebar sidebar-dark sidebar-fixed bg-dark-gradient" id="sidebar">
                <div class="sidebar-brand d-none d-md-flex">
                <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('brand/coreui.svg#full') }}"></use>
                </svg>
                <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('brand/coreui.svg#signet') }}"></use>
                </svg>
                <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
                </div>
                <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
                
                   <li class="nav-group modern-nav-group">
                        <a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon modern-nav-icon" style="color: #0D6EFD;">
                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                        </svg>
                        <span class="nav-text">Dashboard</span>
                        </a>

                        <ul class="nav-group-items ms-4">
                        <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/dashboard">
                                <svg class="nav-icon me-0" width="20" height="20" style="color: #1aa053;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                </svg>
                                <span class="nav-text">Atención</span>
                                </a>
                        </li>
                </ul>


                
                <!--<li class="nav-title">Modulos</li> -->
        

                        <li class="nav-group modern-nav-group">
                                <a class="nav-link nav-group-toggle" href="#">                                
                                <svg class="nav-icon modern-nav-icon" style="color: #796cf3;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-contact') }}"></use>
                                </svg> 
                                <span class="nav-text">Solicitudes</span> 
                                </a>

                                <ul class="nav-group-items ms-4">

                                        <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="/dist/solicitud/nuevo">
                                                <svg class="nav-icon me-0" width="20" height="20" style="color: #e05555;">
                                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                                                </svg>
                                                <span class="nav-text">Crear Solicitud</span>
                                        </a>
                                        </li>



                                        <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="/dist/missolicitudes/{{ Auth::id() }}">
                                                <svg class="nav-icon me-0" width="20" height="20" style="color: #ffc107;">
                                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                                                </svg>
                                                <span class="nav-text">Mis Solicitudes</span>
                                        </a>
                                        </li>



                                        <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="/dist/solicitud">
                                                <svg class="nav-icon me-0" width="20" height="20" style="color: #17a2b8;">
                                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                                                </svg>
                                                <span class="nav-text">Todas</span>
                                        </a>
                                        </li>
                        
                                </ul>
                        </li>



        

                        <li class="nav-group modern-nav-group">
                                <a class="nav-link nav-group-toggle" href="#">
                                <svg class="nav-icon modern-nav-icon" style="color: #0dcaf0;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-comment-bubble') }}"></use>
                                </svg>
                                <span class="nav-text">Colaboradores</span>
                                </a>

                                <ul class="nav-group-items ms-4">


                                        <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="/dist/colaboradores">
                                                <svg class="nav-icon me-0" width="20" height="20" style="color: #198754;">
                                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                                </svg>
                                                <span class="nav-text">Colaboradores</span>
                                        </a>
                                        </li>



                                        <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="/dist/colaboradores/disciplinaria">
                                                <svg class="nav-icon me-0" width="20" height="20" style="color: #dc3545;">
                                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-warning') }}"></use>
                                                </svg>
                                                <span class="nav-text">Acción Disciplinaria</span>
                                        </a>
                                        </li>

                                        <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="/dist/colaboradores/inactivos">
                                                <svg class="nav-icon me-0" width="20" height="20" style="color: #6c757d;">
                                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-ban') }}"></use>
                                                </svg>
                                                <span class="nav-text">Inactivos</span>
                                        </a>
                                        </li>
                                

                                </ul>
                        </li>

        
                        <li class="nav-group modern-nav-group">
                        <a class="nav-link nav-group-toggle" href="#">
                                <svg class="nav-icon modern-nav-icon" style="color: #20c997;">
                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-chart-line') }}"></use>
                                </svg>
                                <span class="nav-text">Reportes</span>
                        </a>

                        <ul class="nav-group-items ms-4">
                             
                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/reporte/atencion">
                                        <svg class="nav-icon me-0" width="20" height="20" style="color: #20c997;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
                                        </svg>
                                        <span class="nav-text">Generales</span>
                                </a>
                                </li>
                             
                        </ul>
                        </li>
        
                <li class="nav-group modern-nav-group">
                        <a class="nav-link nav-group-toggle" href="#">
                                <svg class="nav-icon modern-nav-icon" style="color: #6f42c1;">
                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                                </svg>
                                <span class="nav-text">Configuración</span>
                        </a>

                        <ul class="nav-group-items ms-4">


                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/departamento">
                                        <svg class="nav-icon me-0" width="20" height="20" style="color: #198754;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                                        </svg>
                                        <span class="nav-text">Departamento</span>
                                </a>
                                </li>



                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/tipoatencion">
                                        <svg class="nav-icon me-0" width="20" height="20" style="color: #0d6efd;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                                        </svg>
                                        <span class="nav-text">Tipo Atención</span>
                                </a>
                                </li>



                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/posiciones">
                                        <svg class="nav-icon me-0" width="20" height="20" style="color: #fd7e14;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-briefcase') }}"></use>
                                        </svg>
                                        <span class="nav-text">Posiciones</span>
                                </a>
                                </li>



                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/motivo">
                                        <svg class="nav-icon me-0" width="20" height="20" style="color: #dc3545;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-lightbulb') }}"></use>
                                        </svg>
                                        <span class="nav-text">Motivo</span>
                                </a>
                                </li>



                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/dist/submotivo">
                                        <svg class="nav-icon me-0" width="20" height="20" style="color: #6610f2;">
                                        <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                                        </svg>
                                        <span class="nav-text">Submotivo</span>
                                </a>
                                </li>


                        </ul>
                        </li>
        
                <!--<li class="nav-item"><a class="nav-link" href="/dashboard">
                        <svg class="nav-icon">
                                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                        </svg> Configuracion<span class="badge bg-primary-gradient ms-auto">NEW</span></a>
                        <ul class="nav-group-items">
                </li> -->
        
                <!-- <li class="nav-item"><a class="nav-link" href="widgets.html">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calculator') }}"></use>
                </svg> Widgets<span class="badge bg-primary-gradient ms-auto">NEW</span></a></li> -->
                
                <li class="nav-divider"></li>
        
                <!--
        
                <li class="nav-title">Plugins</li>
                <li class="nav-item"><a class="nav-link" href="calendar.html">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                </svg> Calendar<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="charts.html">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
                </svg> Charts</a></li>
                <li class="nav-item"><a class="nav-link" href="datatables.html">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-spreadsheet') }}"></use>
                </svg> DataTables<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="google-maps.html">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-map') }}"></use>
                </svg> Google Maps<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                <li class="nav-title">Extras</li>
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                </svg> Pages</a>
                <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Register</a></li>
                <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Error 404</a></li>
                <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Error 500</a></li>
                </ul>
                </li>
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
                </svg> Apps</a>
                <ul class="nav-group-items">
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
                </svg> Invoicing</a>
                <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="apps/invoicing/invoice.html"> Invoice<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                </ul>
                </li>
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                </svg> Email</a>
                <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="apps/email/inbox.html"> Inbox<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="apps/email/message.html"> Message<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                <li class="nav-item"><a class="nav-link" href="apps/email/compose.html"> Compose<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
                </ul>
                </li>
                </ul>
                </li>
                <li class="nav-item mt-auto"><a class="nav-link" href="docs.html">
                <svg class="nav-icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
                </svg> Docs</a></li>
        
                -->
               
                <!--
                <li class="nav-title">System Utilization</li>
               
                <li class="nav-item px-3 d-narrow-none">
                <div class="text-uppercase mb-1"><small><b>CPU Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-primary-gradient" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">348 Processes. 1/4 Cores.</small>
                </li>
        
        
                <li class="nav-item px-3 d-narrow-none">
                <div class="text-uppercase mb-1"><small><b>Memory Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">11444GB/16384MB</small>
                </li>
        
                <li class="nav-item px-3 mb-3 d-narrow-none">
                <div class="text-uppercase mb-1"><small><b>SSD 1 Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">243GB/256GB</small>
                </li>
                -->
        
        
                </ul>
                </div>
                <div class="sidebar sidebar-light sidebar-lg sidebar-end sidebar-overlaid hide" id="aside">
                <div class="sidebar-header bg-transparent p-0">
                <ul class="nav nav-underline nav-underline-primary" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#timeline" role="tab">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                </svg></a></li>
                <li class="nav-item"><a class="nav-link" data-coreui-toggle="tab" href="#messages" role="tab">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-speech') }}"></use>
                </svg></a></li>
                <li class="nav-item"><a class="nav-link" data-coreui-toggle="tab" href="#settings" role="tab">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                </svg></a></li>
                </ul>
                <button class="sidebar-close" type="button" data-coreui-close="sidebar">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-x') }}"></use>
                </svg>
                </button>
                </div>
                
                <div class="tab-content">
                <div class="tab-pane active" id="timeline" role="tabpanel">
                <div class="list-group list-group-flush">
                <div class="list-group-item border-start-4 border-start-secondary bg-light text-center fw-bold text-medium-emphasis text-uppercase small dark:bg-white dark:bg-opacity-10 dark:text-medium-emphasis">Today</div>
                <div class="list-group-item border-start-4 border-start-warning list-group-item-divider">
                <div class="avatar avatar-lg float-end"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"></div>
                <div>Meeting with <strong>Lucas</strong></div><small class="text-medium-emphasis me-3">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                </svg> 1 - 3pm</small><small class="text-medium-emphasis">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-location-pin') }}"></use>
                </svg> Palo Alto, CA</small>
                </div>
                <div class="list-group-item border-start-4 border-start-info">
                <div class="avatar avatar-lg float-end"><img class="avatar-img" src="{{ asset('images/4.jpeg') }}" alt="user@email.com"></div>
                <div>Skype with <strong>Megan</strong></div><small class="text-medium-emphasis me-3">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                </svg> 4 - 5pm</small><small class="text-medium-emphasis">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/brand.svg#cib-skype') }}"></use>
                </svg> On-line</small>
                </div>
                <div class="list-group-item border-start-4 border-start-secondary bg-light text-center fw-bold text-medium-emphasis text-uppercase small dark:bg-white dark:bg-opacity-10 dark:text-medium-emphasis">Tomorrow</div>
                <div class="list-group-item border-start-4 border-start-danger list-group-item-divider">
                <div>New UI Project - <strong>deadline</strong></div><small class="text-medium-emphasis me-3">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                </svg> 10 - 11pm</small><small class="text-medium-emphasis">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
                </svg> creativeLabs HQ</small>
                <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/2.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/3.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/4.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/5.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/6.jpeg') }}" alt="user@email.com"></div>
                </div>
                </div>
                <div class="list-group-item border-start-4 border-start-success list-group-item-divider">
                <div><strong>#10 Startups.Garden</strong> Meetup</div><small class="text-medium-emphasis me-3">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                </svg> 1 - 3pm</small><small class="text-medium-emphasis">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-location-pin') }}"></use>
                </svg> Palo Alto, CA</small>
                </div>
                <div class="list-group-item border-start-4 border-start-primary list-group-item-divider">
                <div><strong>Team meeting</strong></div><small class="text-medium-emphasis me-3">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                </svg> 4 - 6pm</small><small class="text-medium-emphasis">
                <svg class="icon">
                <use xlink:href="{{ asset('../vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
                </svg> creativeLabs HQ</small>
                <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/2.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/3.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/4.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/5.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/6.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"></div>
                <div class="avatar avatar-xs"><img class="avatar-img" src="{{ asset('images/8.jpeg') }}" alt="user@email.com"></div>
                </div>
                </div>
                </div>
                </div>
                <div class="tab-pane p-3" id="messages" role="tabpanel">
                <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                <div class="avatar"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-medium-emphasis">Lukasz Holeczek</small><small class="text-medium-emphasis float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                <div class="avatar"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-medium-emphasis">Lukasz Holeczek</small><small class="text-medium-emphasis float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                <div class="avatar"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-medium-emphasis">Lukasz Holeczek</small><small class="text-medium-emphasis float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                <div class="avatar"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-medium-emphasis">Lukasz Holeczek</small><small class="text-medium-emphasis float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                <div class="py-3 pb-5 me-3 float-start">
                <div class="avatar"><img class="avatar-img" src="{{ asset('images/7.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                </div>
                <div><small class="text-medium-emphasis">Lukasz Holeczek</small><small class="text-medium-emphasis float-end mt-1">1:52 PM</small></div>
                <div class="text-truncate fw-bold">Lorem ipsum dolor sit amet</div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                </div>
                <div class="tab-pane p-3" id="settings" role="tabpanel">
                <h6>Settings</h6>
                <div class="aside-options">
                <div class="clearfix mt-4">
                <div class="form-check form-switch form-switch-lg">
                <input class="form-check-input me-0" id="flexSwitchCheckDefaultLg" type="checkbox" checked="">
                <label class="form-check-label fw-semibold small" for="flexSwitchCheckDefaultLg">Option 1</label>
                </div>
                </div>
                <div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></div>
                </div>
                <div class="aside-options">
                <div class="clearfix mt-3">
                <div class="form-check form-switch form-switch-lg">
                <input class="form-check-input me-0" id="flexSwitchCheckDefaultLg" type="checkbox">
                <label class="form-check-label fw-semibold small" for="flexSwitchCheckDefaultLg">Option 2</label>
                </div>
                </div>
                <div><small class="text-medium-emphasis">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></div>
                </div>
                <div class="aside-options">
                <div class="clearfix mt-3">
                <div class="form-check form-switch form-switch-lg">
                <input class="form-check-input me-0" id="flexSwitchCheckDefaultLg" type="checkbox">
                <label class="form-check-label fw-semibold small" for="flexSwitchCheckDefaultLg">Option 3</label>
                </div>
                </div>
                </div>
                <div class="aside-options">
                 <div class="clearfix mt-3">
                <div class="form-check form-switch form-switch-lg">
                <input class="form-check-input me-0" id="flexSwitchCheckDefaultLg" type="checkbox" checked="">
                <label class="form-check-label fw-semibold small" for="flexSwitchCheckDefaultLg">Option 4</label>
                </div>
                </div>
                </div>
                <hr>
                <h6>System Utilization</h6>
                <div class="text-uppercase mb-1 mt-4"><small><b>CPU Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">348 Processes. 1/4 Cores.</small>
                <div class="text-uppercase mb-1 mt-2"><small><b>Memory Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">11444GB/16384MB</small>
                <div class="text-uppercase mb-1 mt-2"><small><b>SSD 1 Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">243GB/256GB</small>
                <div class="text-uppercase mb-1 mt-2"><small><b>SSD 2 Usage</b></small></div>
                <div class="progress progress-thin">
                <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">25GB/256GB</small>
                </div>
                </div>
                </div>
        
               