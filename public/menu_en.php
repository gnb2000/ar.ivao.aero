<?php
namespace App;

use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

$tours = Tour::where('Status', 1)->get();
$currentURL = url()->current();
?>
<div class="header-column justify-content-end">
  <div class="header-row">
    <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
      <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
        <nav class="collapse">
          <ul class="nav nav-pills" id="mainNav">
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle active" href="#">
                Community
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="/comunidad/bienvenida">
                    Welcome from the Director
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/ivao">
                    What is IVAO?
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/staff">
                    STAFF
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/cambio-division">
                    Division Transfer
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/calendario">
                    Calendar
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/departamentos">
                    Departaments
                  </a>
                </li>

                <li class="dropdown-submenu">
                  <a class="dropdown-item" href="#">Members</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/comunidad/directorio">Directory</a></li>
                    <li><a class="dropdown-item" href="/comunidad/medallas">Awards</a></li>
                    <li><a class="dropdown-item" href="https://www.ivao.aero/Member.aspx">My Profile</a></li>
                    <li><a class="dropdown-item" href="/comunidad/contacto">User Support</a></li>
                    <li><a class="dropdown-item" href="https://www.ivao.aero/members/person/password.htm">Password Reminder</a></li>
                  </ul>
                </li>
                <li>
                  <a class="dropdown-item" target="_blank" href="https://wiki.ivao.aero/en/home/worldtour/rules-regulations">
                    Rules and Regulations
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/vacantes">
                    Vacamcies
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/faq">
                    FAQ
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/contacto">
                    Contact
                  </a>
                </li>
              </ul>
            </li>
            <li class="dropdown dropdown-mega">
              <a class="dropdown-item dropdown-toggle" href="#">
                Operations
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="dropdown-mega-content">
                    <div class="row">
                      <div class="col">
                        <span class="dropdown-mega-sub-title">ATC Operations</span>
                        <ul class="dropdown-mega-sub-nav">
                          <li><a class="dropdown-item" href="/controladores/primeros-pasos">First Steps</a></li>
                          <li><a class="dropdown-item" href="/controladores/lineamientos">Guideliness</a></li>
                          <li><a class="dropdown-item" href="https://www.ivao.aero/fras/list.asp?id=AR">ATC Restrictions</a></li>
                          <li><a class="dropdown-item" href="/controladores/gca">GCA</a></li>
                          <li><a class="dropdown-item" href="/controladores/sectores">IVAC Sectors</a></li>
                          <li><a class="dropdown-item" href="/controladores/fichas">ATC Cards</a></li>
                          <li><a class="dropdown-item" href="/controladores/frecuencias">Frequencies</a></li>
                        </ul>
                      </div>
                      <div class="col">
                        <span class="dropdown-mega-sub-title">Flight Operations</span>
                        <ul class="dropdown-mega-sub-nav">
                          <li><a class="dropdown-item" href="/pilotos/primeros-pasos">First Steps</a></li>
                          <li><a class="dropdown-item" href="/pilotos/lineamientos">Guideliness</a></li>
                          <li><a class="dropdown-item" href="/pilotos/so">Special Operations</a></li>
                          <li><a class="dropdown-item" href="/pilotos/aerolineas">Virtual Airlines</a></li>
                        </ul>
                      </div>
                      <div class="col">
                        <span class="dropdown-mega-sub-title">Special Operations</span>
                        <ul class="dropdown-mega-sub-nav">
                          <li><a class="dropdown-item" href="/pilotos/so">Special Operations</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Training
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/formacion/informacion">Information</a></li>
                <li><a class="dropdown-item" href="/formacion/atc">ATC</a></li>
                <li><a class="dropdown-item" href="/formacion/piloto">Pilot</a></li>
                <li><a class="dropdown-item" href="/formacion/biblioteca">Library</a></li>
                <li class="dropdown-submenu">
                  <a class="dropdown-item" href="#">Forms</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/comunidad/contacto">Request GCA</a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://www.ivao.aero/training/exam/status.asp">Request Exam</a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://www.ivao.aero/training/training/statustraining.asp">Request Training</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Events
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="https://rfe.ar.ivao.aero">Real Flight Event</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/events/future">Upcoming Events</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/events/previous">Past Events</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Tours
              </a>
              <ul class="dropdown-menu">
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/tours/report/manual">Report Leg</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/tours">All Tours</a></li>
                <?php foreach($tours as $tour) { ?>
                  <li><a class="dropdown-item" href="<?php echo '/tours/'.$tour->id; ?>"><?php echo $tour->name; ?></a></li>
                  <?php } ?>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Resources
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/recursos/software">Software</a></li>
                <li><a class="dropdown-item" href="/recursos/weather">Weather</a></li>
                <li><a class="dropdown-item" href="/recursos/infovuelos">Infovuelos</a></li>
                <li><a class="dropdown-item" href="/recursos/aip">AIP - Charts</a></li>
                <li><a class="dropdown-item" href="/recursos/discord">Discord</a></li>
                <li><a class="dropdown-item" href="http://squawk.scumari.nl/index.php">SQ Generator</a></li>
                <li class="dropdown-submenu">
                  <a class="dropdown-item" target="_blank" href="https://www.ivao.aero">IVAO HQ</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" target="_blank" href="https://webeye.ivao.aero">Webeye</a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://tracker.ivao.aero">IVAO Tracker</a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://www.virtual-cpdlc.com/">Virtual CPDLC</a></li>
                  </ul>
                </li>
              </ul>
            </li>
			<li class="dropdown">
			<?php
      if(! Auth::check() ) echo '<a class="dropdown-item" href="/login">Login</a>';
      else
      { ?>
              <a class="dropdown-item dropdown-toggle" href="#">
                <?php echo /* echo  $user->name ; */ Auth::user()->name; ?>  
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/perfil">My Profile</a></li>
                <li><a class="dropdown-item" href="https://ters.ar.ivao.aero/reports/my">Mis Reportes</a></li>
                <li><a class="dropdown-item" href="https://aula.ar.ivao.aero">Aula Virtual</a></li>
                <li><a class="dropdown-item" href="/secretaria">Secretar&iacute;a Virtual</a></li>
                <li class="dropdown"><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
    <?php } ?>
      
			</li>
        </nav>
      </div>
      <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
        <i class="fas fa-bars"></i>
      </button>
      </div>
        <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
          <div class="header-nav-feature header-nav-features-search d-inline-flex">
          <a href="<?php echo $currentURL; ?>?lang=es"><img alt="flag" src="/img/flags/16/Spain.png"></a>
          <!-- <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
              <form role="search" action="page-search-results.html" method="get">
                <div class="simple-search input-group">
                  <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                  <span class="input-group-append">
                    <button class="btn" type="submit">
                      <i class="fa fa-search header-nav-top-icon"></i>
                    </button>
                  </span>
                </div>
              </form>
            </div> -->
          </div>
        </div>
      </div>
    </div>