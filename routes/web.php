<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [Auth\LoginController::class, 'index']);
Route::get('/logout', [Auth\LoginController::class, 'logout']);

Route::get('/error/{codigo}', function($codigo) {

	return view('errors.error', compact('codigo'));
	
})->name('error');

//General
Route::get('/perfil', [UserController::class, 'perfil']);
Route::any('/editar-perfil/{vid?}', [UserController::class, 'editarPerfil']);
Route::any('/registro', [Auth\LoginController::class, 'register']);
Route::get('/email/{vid}/confirm', [Auth\LoginController::class, 'confirmarEmail']);
Route::get('/discord/{vid}/{discordUser}/process', [PagesController::class, 'getDiscord']);
Route::get('/discord-consent', [PagesController::class, 'discordConsent']);
Route::get('/recursos/estado/{cs}', [PagesController::class, 'estadoInfovuelos']);
Route::get('/top-five', [OnlineController::class, 'topFive']);

//Crons
Route::get('/cron/test', [CronController::class, 'test']);
Route::get('/cron/online-flights', [CronController::class, 'getFlights']);
Route::get('/cron/online-atcs', [CronController::class, 'getATCs']);
Route::get('/cron/time-clean-up', [CronController::class, 'timeCleanUp']);
Route::get('/cron/points/tracker', [CronController::class, 'pointsTracker']);
Route::get('/cron/points/check', [CronController::class, 'pointsCheck']);
Route::get('/cron/atcpositions/update', [CronController::class, 'updateATCPositions']);
Route::get('/cron/airports/update', [CronController::class, 'updateAirports']);
Route::get('/cron/birthday/send', [CronController::class, 'birthdayEmail']);
Route::get('/cron/verification/send', [CronController::class, 'verificationEmail']);
Route::get('/cron/users/maintenance', [CronController::class, 'usersMaintenance']);
Route::get('/cron/users/weekly', [CronController::class, 'weeklyEmail']);
Route::get('/cron/gca/check', [CronController::class, 'GCAHoursCheck']);

//Intraweb
Route::get('/intraweb', [PagesController::class, 'intraweb']);

Route::get('/intraweb/staff/list', [StaffController::class, 'list']);
Route::any('/intraweb/staff/add', [StaffController::class, 'add']);
Route::any('/intraweb/staff/listVacancy', [StaffController::class, 'listVacancy']);
Route::any('/intraweb/staff/addVacancy',[StaffController::class,'addVacancy']);
Route::get('/intraweb/staff/{pos}/deleteVacancy', [StaffController::class, 'deleteVacancy']);
Route::get('/intraweb/staff/{pos}/delete', [StaffController::class, 'delete']);
Route::any('/intraweb/staff/meeting', [MeetingController::class, 'add']);
Route::get('/intraweb/staff/{filter}/changes', [ActionController::class, 'list']);

Route::get('/intraweb/stats/list', [StatisticController::class, 'list']);
Route::any('/intraweb/stats/upload', [StatisticController::class, 'add']);
Route::any('/intraweb/members/search', [UserController::class, 'search']);
Route::any('/intraweb/members/validate', [UserController::class, 'validar']);
Route::any('/intraweb/members/{vid}/edit', [UserController::class, 'edit']);
Route::get('/intraweb/members/{vid}/activate', [UserController::class, 'activate']);
Route::get('/intraweb/members/{vid}/searchdelete', [UserController::class, 'deleteSearch']);
Route::get('/intraweb/members/{vid}/validatedelete', [UserController::class, 'deleteValidate']);

Route::any('/intraweb/atc/stats/list', [OnlineController::class, 'ATCstats']);
Route::any('/intraweb/atc/FIRstats/list', [OnlineController::class, 'FIRStats']);
Route::any('/intraweb/atc/ATCFIRstats/list', [OnlineController::class, 'ATCFIRStats']);
Route::get('/intraweb/atc/fra/list', [FRAController::class, 'list']);
Route::any('/intraweb/atc/fra/add', [FRAController::class, 'add']);
Route::get('/intraweb/atc/fra/{pos}/delete', [FRAController::class, 'delete']);
Route::get('/intraweb/atc/sheet/list', [SheetController::class, 'list']);
Route::any('/intraweb/atc/sheet/add', [SheetController::class, 'add']);
Route::get('/intraweb/atc/sheet/{id}/delete', [SheetController::class, 'delete']);
Route::get('/intraweb/atc/gca', [GcaController::class, 'ATClist']);

Route::any('/intraweb/flight/stats', [OnlineController::class, 'FlightStats']);
Route::any('/intraweb/flight/hourlyStats', [OnlineController::class, 'FlightHourlyStats']);
Route::any('/intraweb/flight/va/participation', [OnlineController::class, 'VAParticipation']);
Route::any('/intraweb/va/add', [VAController::class, 'add']);
Route::get('/intraweb/va/{id}/activate', [VAController::class, 'activate']);
Route::get('/intraweb/va/{id}/deactivate', [VAController::class, 'deactivate']);
Route::get('/intraweb/va/{id}/delete', [VAController::class, 'delete']);
Route::get('/intraweb/va/list', [VAController::class, 'list']);
Route::get('/intraweb/elite/list', [VAController::class, 'eliteList']);
Route::any('/intraweb/elite/add', [VAController::class, 'eliteAdd']);
Route::get('/intraweb/elite/{vid}/delete', [VAController::class, 'eliteDelete']);
/* Route::any('/intraweb/flight/sheet/add', [SheetController::class, 'add']);
Route::get('/intraweb/flight/sheet/{id}/delete', [SheetController::class, 'delete']);
Route::get('/intraweb/flight/gca', [GcaController::class, 'ATClist']); */

Route::get('/intraweb/training/gca', [GcaController::class, 'TrainingList']);
Route::any('/intraweb/gca/add', [GcaController::class, 'add']);
Route::get('/intraweb/gca/{vid}/delete', [GcaController::class, 'delete']);
Route::any('/intraweb/training/points/add', [PointsController::class, 'add']);
Route::any('/intraweb/training/points/search', [PointsController::class, 'search']);
Route::any('/intraweb/training/points/showPoints', [PointsController::class, 'search']);
Route::any('/intraweb/training/schedule', [TrainingController::class, 'trainingSchedule']);
Route::any('/intraweb/exam/schedule', [TrainingController::class, 'examSchedule']);
/*Route::get('/intraweb/training/completed', 'TrainingController@list']);
Route::get('/intraweb/training/stats', 'TrainingController@stats']);
Route::get('/intraweb/training/requested', 'TrainingController@TrainingsRequestedList']);
Route::get('/intraweb/training/{id}/confirm', 'TrainingController@confirm']);
Route::any('/intraweb/training/{id}/complete', 'TrainingController@complete']);
Route::get('/intraweb/training/my', 'TrainingController@my']);
Route::any('/intraweb/training/add', 'TrainingController@schedule']);
Route::any('/intraweb/training/{id}/assign', 'TrainingController@assign']); */

Route::get('/intraweb/survey/send', [UserController::class, 'sendSurvey']);

Route::any('intraweb/events/list',[EventController::class,'list']);
Route::any('intraweb/events/listEN',[EventController::class,'listEN']);

Route::get('/', [PagesController::class, 'index']);
Route::get('/{pagina?}', [PagesController::class, 'index']);
Route::get('/{carpeta}/{pagina}', [PagesController::class, 'index']);