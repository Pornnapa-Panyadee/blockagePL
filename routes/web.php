<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
 
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

//////// test return data ////////
Route::get('/testing/emailsend', 'TestingEmailController@testingemail');
Route::get('/testing/emailsendperuser/{updateByEmail}', 'TestingEmailController@sendingEmailByPerUser');
Route::get('/sendmailforgot/{email}', 'SendPasswordForgetController@forgetUserName');
//////////////////////////////////////////

// admin verify user //
Route::get('/usersverify', 'ManagmemntVerifyUserController@managementVerifyusers');
// 
Route::get('/',function () {return view('pages/framework');});
Route::get('/detail',function () {return view('pages/framework_detail');});
Route::get('/chiangmai','DataForExpertController@getDataforHome');
Route::get('/fang/{fang}','DataForExpertController@getDataforHome');
Route::get('box','DataForExpertController@getDataforHome1');
Route::get('login', function () {return view('auth/login');});
Route::get('register', function () {return view('auth/register');});
// verify message 
Route::get('/verifymessage', function(){return view('verifyMessage');});
//Route::get('/report/map', function () {return view('pages.testmap');});


//Route::get('/backup', function () {return view('result');});


Route::get('report', 'FormBlockageController@reportBackend');
Route::get('/report/map', 'MapController@getDamageByAmp'); 
Route::get('/report/map', 'MapController@getDamageByAmpG'); 
Route::get('/report/mapCM', 'MapController@getDamageByAmpFang');



// --Drop Down select AMP or tambol to gen pdf --
Route::get('/reports/map', 'MapController@getDamageByAmpG'); 
// Route::get('/reports/map', 'MapController@getDamageByAmpFang'); 
Route::get('/reports/problem', function () {return view('general/problem');});
Route::get('reports/problem/pdf', "pdfController@tablegen")->name('reports/pdf');
Route::get('/reports/solution', function () {return view('general/solution');});
Route::get('reports/solution/pdf', "DataForExpertController@solutionPDFgen")->name('reports/solution');
Route::get('/reports/summary', function () {return view('general/summary');});

Route::get('report/pdf/amp','DataForExpertController@expertPDFAmp')->name('report/pdf/amp');
// --Drop Down select AMP or tambol to gen pdf --


Route::get('report_admin', 'FormBlockageController@getBlockagebyAdmin');
Route::get('report_all', 'FormBlockageController@getBlockagebyAdminAll');
Route::get('report_detail/{id}', 'FormBlockageController@reportBlockageDetail');
Route::get('blocker', 'FormBlockageController@getBlockagebyUser')->name('blocker');
Route::get('data', 'FormBlockageController@getdata')->name('data');



Route::get('newblockage', 'PagesController@newFormblockage');
Route::get('reportBlockage/{id}', ['as' => 'reportBlockage', 'uses' => 'FormBlockageController@reportBlockage']);

Route::get('upphoto/{id}', ['as' => 'upphoto', 'uses' => 'QuestionController4@BlockageId']);



Route::get('form/questionnaire', "QuestionController@questionnaire");
Route::get('form/questionnaire2', "QuestionController2@questionnaire2")->name('form.Qnaire2');
Route::get('form/questionnaire3', "QuestionController3@questionnaire3")->name('form.Qnaire3');
Route::get('form/questionnaire4', "QuestionController4@questionnaire4")->name('form.Qnaire4');

Route::get('form/uploadimage/{id}', "QuestionController5@questionnaire5")->name('form.Qnaire5');
Route::get('photoremove/{id}', "QuestionController5@photoremove");


Route::get('form/questionnaire6/{id}', "QuestionController6@questionnaire6")->name('form.Qnaire6');
//Route::get('form/questionnaire5/{id}', ['as' => 'form/questionnaire5', 'uses' => 'QuestionController5@BlockageId'])->name('form.Qnaire5');

Route::get('form/map', "MapController@map");

Route::post('form/questionnaire/store', 'QuestionController@store')->name('form.Qnaire.store');
Route::get('form/questionnaire/addBlockage', 'QuestionController@addBlockage')->name('form.Qnaire.addBlockage');
Route::get('form/questionnaire/addXsection', 'QuestionController@addXsection')->name('form.Qnaire.addXsection');
Route::get('form/questionnaire/addCulvert', 'QuestionController@addCulvert')->name('form.Qnaire.addCulvert');
Route::get('form/questionnaire/get', 'QuestionController@getData')->name('form.Qnaire.getData');
Route::get('form/questionnaire/getBlockage', 'QuestionController@getBlockageData')->name('form.Qnaire.getBlockageData');
Route::get('form/questionnaire2/addProblem', 'QuestionController2@addProblem')->name('form.Qnaire2.addProblem');

Route::get('form/questionnaire3/addSolution', 'QuestionController3@addSolution')->name('form.Qnaire3.addSolution');

Route::get('form/questionnaire/get', 'QuestionController@getData')->name('form.Qnaire.getData');
Route::get('form/questionnaire/getBlockage', 'QuestionController@getBlockageData')->name('form.Qnaire.getBlockageData');
Route::post('form/questionnaire4', "QuestionController4@uploadImage")->name('form.Qnaire4.uploadImage');
Route::post('form/questionnaire5', "QuestionController5@uploadImage")->name('form.Qnaire5.uploadImage');
Route::post('form/questionnaire6', "QuestionController6@uploadImage")->name('form.Qnaire6.uploadImage');


Route::get('/upphoto1', "QuestionController4@uploadImageOne")->name('uploadImageOne');

//Route::get('photo', 'PhotoController@index')->name('photo');
//Route::post('photo', 'PhotoController@uploadImage');
Route::get('/indexdistrict', 'PagesController@indexdistrict'); 
Route::get('/blockage/{id}', 'PagesController@formblockage'); 
Route::get('/getdistrict/{id}', 'PagesController@getDistrict');
Route::get('/getTumbol/{id}', 'PagesController@getTumbol');
Route::get('/getVillage/{id}', 'PagesController@getVillage');



Route::get('/editblockage/{id}', 'PagesController@editblockage'); 


//Controller Form_blockage
Route::get('/form_blockage', "FormBlockageController@formblockage");
Route::post('form/storeform', 'FormBlockageController@storeform')->name('form.storeform');
Route::get('form/getBlockage', 'FormBlockageController@getBlockageData')->name('form.getBlockageData');
Route::get('/getBlockageID/{id}', 'FormBlockageController@getBlockageID');
Route::get('edit/{id}', 'FormBlockageController@editform')->name('editform');
Route::get('editsurvey/{id}', 'FormBlockageController@editformsurvey')->name('editformsurvey');
Route::get('delete/{id}', 'FormBlockageController@removeblockage')->name('removeform');


//PD
Route::get('blockagePDFview', "pdfController@viewBlockagePDF");
Route::get('blockagePDF/export', "pdfController@exportPDF");

Route::get('reportblockage/pdf/{id}', "pdfController@view");
Route::get('report/pdf', "pdfController@table")->name('report/pdf');
Route::get('report/pdfCM', "pdfController@tableCM")->name('report/pdfCM');


Route::get('form/getBlockageMap', 'MapController@getBlockageMap')->name('form.getBlockageMap');
//Route::get('getBlockageID/{id}', 'FormBlockageController@getBlockageID')->name('getBlockageID');
Route::get('getBlockageID/{id}', ['as' => 'getBlockageID', 'uses' => 'FormBlockageController@getBlockageID']);
Route::get('getBlockagebyUser/{user}', ['as' => 'getBlockagebyUser', 'uses' => 'FormBlockageController@getBlockagebyUser']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('report/chart', 'HighChartController@index')->name('report/chart');
Route::get('report/chart/{amp}', 'HighChartController@prob');

Route::get('chart', 'HighChartController@indexAll')->name('chartAll');
Route::get('chart/{amp}', 'HighChartController@probAll');

Route::get('report/chartCM', 'HighChartController@indexCM')->name('report/chart');
Route::get('report/chartCM/{amp}', 'HighChartController@probCM');

Route::get('form/getMapByUser', 'MapController@getMapByUser')->name('form.getMapByUser');
Route::get('form/getDamage/{amp}', 'MapController@getDamage')->name('form.getDamage');
Route::get('form/getDamage_admin/{app}', 'MapController@getDamage_admin');
// Route::get('test', 'MapController@getDamageByAmp');



// CM Fang
Route::get('api/getcm', 'MapController@getDamageByAmpCM');
Route::get('api/getDamageCM/{amp}', 'MapController@getDamageCM');
Route::get('api/blockage', 'DataFangController@getBlockage');
Route::get('api/blockage/{amp}/{tambol}', 'DataFangController@getBlockageAmp');
Route::get('api/reportBlockage/{id}', ['as' => 'reportBlockage', 'uses' => 'DataFangController@reportBlockage']);

Route::get('api/chart/{amp}', 'DataFangController@apiCM');

Route::get('admin',function () {return view('auth/admin');});
Route::get('api/expertPDF/{id}', 'DataFangController@expertPDF');
Route::get('api/solution', "DataForExpertController@getsolutionPDF");

// report Expet
Route::get('/expert','DataForExpertController@getDataforexpert')->name('expert.expert');
Route::get('expert/report/{id}','DataForExpertController@reportExpert')->name('expert.report');
Route::post('expert/edit','FormBlockageController@updateForExpert')->name('expert.edit');
Route::get('report/pdf/{id}','DataForExpertController@expertPDF')->name('report.pdf');
Route::get('reportSurvey/pdf/{id}','DataForExpertController@expertPDFSurvey')->name('reportsurvey.pdf');

Route::get('expert/photo/{id}','DataForExpertController@showPhoto')->name('expert.photo');
Route::post('expert/upphoto', "DataForExpertController@uploadImage")->name('expert.upphoto');
Route::get('report/solution', "DataForExpertController@solutionPDF")->name('report/solution');
Route::get('report/photo/{id}', "DataForExpertController@showPhotoDownload")->name('expert.showphoto');

// Route::get('report/photo',function () {return view('expert/showphoto');});


// menubar
Route::get('homenew',function () {return view('pages/home');});
Route::get('contact',function () {return view('menubar/contact');});
Route::get('floodManage',function () {return view('menubar/flood_manage');});
Route::get('floodPreparedness',function () {return view('menubar/flood_preparedness');});
Route::get('floodProtect',function () {return view('menubar/flood_protect');});
Route::get('floodStructures',function () {return view('menubar/flood_structures');});
Route::get('projectInfomation',function () {return view('menubar/projectInfo');});
// menubar => blackEnd
Route::get('floodmanage',function () {return view('menubar/blackEnd/flood_manage');});
Route::get('Contact',function () {return view('menubar/blackEnd/contact');});
Route::get('floodpreparedness',function () {return view('menubar/blackEnd/flood_preparedness');});
Route::get('floodprotect',function () {return view('menubar/blackEnd/flood_protect');});
Route::get('floodstructures',function () {return view('menubar/blackEnd/flood_structures');});
Route::get('projectinfomation',function () {return view('menubar/blackEnd/projectInfo');});

Route::get('index',function () {return view('pages/index');});


// 
// New
Route::get('/map/{id}', 'MapController@getLocation');
Route::get('map/getlocation/{amp}/{id}', 'MapController@locationShow')->name('map.locationShow');

// rain 
Route::get('mapthai',function () {return view('rain/thai');});
Route::get('idf/chiangmai',function () {return view('rain/chiangmai');});
Route::get('idf/chiangmai/{amp}', 'RaindataController@getIDF');

Route::get('ddf/chiangmai',function () {return view('rain/chiangmai_DDF');});
Route::get('ddf/chiangmai/{amp}', 'RaindataController@getDDF');

// Route::get('mapthai/chiangrai/เวียงป้าเป้า',function () {return view('rain/showrain');});


 
// ----------------------------------- //
//----- Handdle Line ChatBot API -----//
// ----------------------------------- //

 
Route::get('solution_project/{blk_id}',[BlockagesController::class, 'solution_project']);


// api management menu // 
Route::get('api_selection/{id_user}/{type_msg}/{text_msg}/{timestamp}',[BlockagesController::class, 'insert_selection']); // log_selection function in py 
Route::get('menu_selection/{id_user}',[BlockagesController::class, 'menu_selection']);

// Route::get('counting_user/{id_user}',[BlockagesController::class, 'count_log']); // for update log 
// Route::get('update_log_user/{id_user}/{text_msg}',[BlockagesController::class, 'update_log']); // for update log    
// ------------------- // 

// ----Card 1 ---- // 
// ---- end card 1 --- //

 
// --- Card2 blockageg --- // 
//2.1 real location blockage 
Route::get('location_test2/{longitude}/{latitude}',[BlockagesController::class, 'location_test_2']);
// api get aumpol  
Route::get('find_location_blk_ampol',[BlockagesController::class, 'find_location_blk_ampol']);
// api get  tumbol 
Route::get('find_location_blk_tumbol/{tumbol}/{ampol}',[BlockagesController::class, 'find_location_blk_tumbol']);
//2.2 IDF Curve
// Route::get('water_idf/{longitude}/{latitude}', [BlockagesController::class, 'water_idf_value']);
//2.3 สถานที่เเจ้งปัญหา
Route::get('problem_report/{tumbol}/{aumpol}',[BlockagesController::class, 'report_promble']);
// ---- end card 2 --- //


// don't have in menu lineChat bot //
// manual input province && ampol && tumbol (in menu we don't have)
Route::get('find_location_blk/{province}/{ampol}/{tumbol}',[BlockagesController::class, 'find_location_blk']);
Route::get('listadress',[BlockagesController::class, 'list_of_address']);
// ความถี่การเกิดน้ำท่วม
// Route::get('damage_freq/{feq}', [BlockagesController::class,'damage_freq']);
// เเนวทางการเเก้ไขปัญหา 
// Route::get('solution_mockup/{id_location}',[BlockagesController::class, 'solution_mockup']);
 
// ------------------------------- //


// test long la // 
// Route::get('testing_long_la/{longitude}/{latitude}',[BlockagesController::class, 'testing_long_la']);
// Route::get('find_distance/{longitude}/{latitude}', [BlockagesController::class, 'location_long_la']);


// ----------------------------------- //
// ----------------------------------- //
// ----------------------------------- //
 