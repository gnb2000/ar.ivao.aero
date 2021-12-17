<?php
namespace App;

use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

$tours = Tour::where('Status', 1)->get();
$user = Auth::user();
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
                Comunidad
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="/comunidad/bienvenida">
                    Bienvenida del Director
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/ivao">
                    &iquest;Qu&eacute; es IVAO?
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/staff">
                    STAFF
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/cambio-division">
                    Transferencia de división
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/calendario">
                    Calendario
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/departamentos">
                    Departamentos
                  </a>
                </li>

                <li class="dropdown-submenu">
                  <a class="dropdown-item" href="#">Miembros</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/comunidad/directorio">Directorio</a></li>
                    <li><a class="dropdown-item" href="/comunidad/medallas">Medallas</a></li>
                    <li><a class="dropdown-item" href="https://www.ivao.aero/Member.aspx">Mi Perfil</a></li>
                    <li><a class="dropdown-item" href="/comunidad/contacto">Asistencia al Usuario</a></li>
                    <li><a class="dropdown-item" href="https://www.ivao.aero/members/person/password.htm">Recordatorio Contrase&ntilde;a</a></li>
                  </ul>
                </li>
                <li>
                  <a class="dropdown-item" target="_blank" href="https://wiki.ivao.aero/en/home/worldtour/rules-regulations">
                    Reglas &amp; Regulaciones
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/vacantes">
                    Vacantes
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/faq">
                    FAQ
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/comunidad/contacto">
                    Contacto
                  </a>
                </li>
              </ul>
            </li>
            <li class="dropdown dropdown-mega">
              <a class="dropdown-item dropdown-toggle" href="#">
                Operaciones
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="dropdown-mega-content">
                    <div class="row">
                      <div class="col">
                        <span class="dropdown-mega-sub-title">Operaciones ATC</span>
                        <ul class="dropdown-mega-sub-nav">
                          <li><a class="dropdown-item" href="/controladores/primeros-pasos">Primeros Pasos</a></li>
                          <li><a class="dropdown-item" href="/controladores/lineamientos">Lineamientos</a></li>
                          <li><a class="dropdown-item" href="https://www.ivao.aero/fras/list.asp?id=AR">Resricciones ATC</a></li>
                          <li><a class="dropdown-item" href="/controladores/gca">GCA</a></li>
                          <li><a class="dropdown-item" href="/controladores/sectores">Sectores IVAC</a></li>
                          <li><a class="dropdown-item" href="/controladores/fichas">Fichas ATC</a></li>
                          <li><a class="dropdown-item" href="/controladores/frecuencias">Frecuencias</a></li>
                        </ul>
                      </div>
                      <div class="col">
                        <span class="dropdown-mega-sub-title">Operaciones de Vuelo</span>
                        <ul class="dropdown-mega-sub-nav">
                          <li><a class="dropdown-item" href="/pilotos/primeros-pasos">Primeros Pasos</a></li>
                          <li><a class="dropdown-item" href="/pilotos/lineamientos">Lineamientos</a></li>
                          <li><a class="dropdown-item" href="/pilotos/so">Operaciones Especiales</a></li>
                          <li><a class="dropdown-item" href="/pilotos/aerolineas">Aerol&iacute;neas Virtuales</a></li>
                        </ul>
                      </div>
                      <div class="col">
                        <span class="dropdown-mega-sub-title">Operaciones Especiales</span>
                        <ul class="dropdown-mega-sub-nav">
                          <li><a class="dropdown-item" href="/pilotos/so">Operaciones Especiales</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Formaci&oacute;n
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/formacion/informacion">Informaci&oacute;n</a></li>
                <li><a class="dropdown-item" href="/formacion/atc">ATC</a></li>
                <li><a class="dropdown-item" href="/formacion/piloto">Piloto</a></li>
                <li><a class="dropdown-item" href="/formacion/biblioteca">Biblioteca Virtual</a></li>
                <li class="dropdown-submenu">
                  <a class="dropdown-item" href="#">Tr&aacute;mites</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/comunidad/contacto">Solicitar GCA</a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://www.ivao.aero/training/exam/status.asp">Solicitar Examen</a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://www.ivao.aero/training/training/statustraining.asp">Solicitar Entrenamiento</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Eventos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="https://rfe.ar.ivao.aero">Real Flight Event</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/events/future">Pr&oacute;ximos Eventos</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/events/previous">Eventos Pasados</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Tours
              </a>
              <ul class="dropdown-menu">
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/tours/report/manual">Reportar Vuelo</a></li>
                <li><a target="_blank" class="dropdown-item" href="https://ters.ar.ivao.aero/tours">Todos los Tours</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-item dropdown-toggle" href="#">
                Recursos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/recursos/software">Software</a></li>
                <li><a class="dropdown-item" href="/recursos/weather">Meteorolog&iacute;a</a></li>
                <li><a class="dropdown-item" href="/recursos/infovuelos">Infovuelos</a></li>
                <li><a class="dropdown-item" href="/recursos/aip">AIP - Cartas</a></li>
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
                <?php echo $user->name; ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/perfil">Mi Perfil</a></li>
                <li><a class="dropdown-item" href="https://ters.ar.ivao.aero/reports/my">Mis Reportes</a></li>
                <li><a class="dropdown-item" href="https://aula.ar.ivao.aero">Aula Virtual</a></li>
                <li><a class="dropdown-item" href="/secretaria">Secretar&iacute;a Virtual</a></li>
                <?php if(@$_COOKIE['isStaff']) { ?>
                <li><a class="dropdown-item text-danger font-weight-bold" href="https://ar.ivao.aero/intraweb">Intraweb</a></li>
                <?php } ?>
        				<li class="dropdown"><a class="dropdown-item" href="/logout">Salir</a></li>
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
          <a href="<?php echo $currentURL; ?>?lang=en"><img alt="flag" src="/img/flags/16/United-Kingdom.png"></a>
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