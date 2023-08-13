<?php

use App\Http\Controllers\HKIController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\paperController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\researchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/token', function () {
    return csrf_token();
});

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/hki', [HKIController::class, 'index'])->name('hki.index');
Route::get('/hki/{id}', [HKIController::class, 'show'])->name('hki.show');
Route::post('/hki', [HKIController::class, 'store'])->name('hki.store');
Route::put('/hki/{id}', [HKIController::class, 'update'])->name('hki.update');
Route::delete('/hki/{id}', [HKIController::class, 'destroy'])->name('hki.destroy');
Route::post('/hki/add_member_to_hki', [HKIController::class, 'add_member_to_hki'])->name('hki.add_member_to_hki');
Route::delete('/hki/{hki_id}/{member_id}', [HKIController::class, 'delete_member_from_hki'])->name('hki.delete_member_from_hki');
Route::get('/hki/{id}/members', [HKIController::class, 'find_members_of_hki'])->name('hki.find_members_of_hki');
Route::get('/hki/export', [HKIController::class, 'hkiexport'])->name('hki.export');
Route::post('/hki/import', [HKIController::class, 'hkiimport'])->name('hki.import')->middleware('auth', 'admin');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/{id}', [MemberController::class, 'show'])->name('member.show');
Route::post('/member', [MemberController::class, 'store'])->name('member.store');
Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::get('/login', [MemberController::class, 'login_index'])->name('member.login_index');
Route::post('/login', [MemberController::class, 'login'])->name('member.login_proses');
Route::post('/logout', [MemberController::class, 'logout'])->name('member.logout');
Route::get('/member/export', [MemberController::class, 'memberexport'])->name('member.export');
Route::post('/member/import', [MemberController::class, 'memberimport'])->name('member.import')->middleware('auth', 'admin');

Route::get('/research', [researchController::class, 'index'])->name('research.index');
Route::get('/research/input', [researchController::class, 'index_admin'])->name('research.index_admin')->middleware('auth', 'admin');
Route::get('/research/input/add', [researchController::class, 'create'])->name('research.create')->middleware('auth', 'admin');
Route::get('/research/input/edit/{id}', [researchController::class, 'show'])->name('research.show')->middleware('auth', 'admin');
Route::post('/research/input', [researchController::class, 'store'])->name('research.store')->middleware('auth', 'admin');
Route::put('/research/input/{id}', [researchController::class, 'update'])->name('research.update')->middleware('auth', 'admin');
Route::delete('/research/input/delete/{id}', [researchController::class, 'destroy'])->name('research.destroy')->middleware('auth', 'admin');
Route::get('/research/input/add_member_to_research/{id}', [researchController::class, 'add_member_to_research_view'])->name('research.add_member_to_research_view')->middleware('auth', 'admin');
Route::post('/research/input/add_member_to_research', [researchController::class, 'add_member_to_research'])->name('research.add_member_to_research')->middleware('auth', 'admin');
Route::delete('/research/input/{research_id}/{member_id}', [researchController::class, 'delete_member_from_research'])->name('research.delete_member_from_research')->middleware('auth', 'admin');
Route::get('/research/input/{id}/members', [researchController::class, 'find_members_of_research'])->name('research.find_members_of_research')->middleware('auth', 'admin');
Route::get('/research/export', [researchController::class, 'researchexport'])->name('research.export')->middleware('auth', 'admin');
Route::post('/research/import', [researchController::class, 'researchimport'])->name('research.import')->middleware('auth', 'admin');

Route::get('/paper', [paperController::class, 'index'])->name('paper.index');
Route::get('/paper/{id}', [paperController::class, 'show'])->name('paper.show');
Route::post('/paper', [paperController::class, 'store'])->name('paper.store');
Route::put('/paper/{id}', [paperController::class, 'update'])->name('paper.update');
Route::delete('/paper/{id}', [paperController::class, 'destroy'])->name('paper.destroy');
Route::post('/paper/add_member_to_paper', [paperController::class, 'add_member_to_paper'])->name('paper.add_member_to_paper');
Route::delete('/paper/{paper_id}/{member_id}', [paperController::class, 'delete_member_from_paper'])->name('paper.delete_member_from_paper');
Route::get('/paper/{id}/members', [paperController::class, 'find_members_of_paper'])->name('paper.find_members_of_paper');
Route::get('/paper/export', [paperController::class, 'paperexport'])->name('paper.export');
Route::post('/paper/import', [paperController::class, 'paperimport'])->name('paper.import');
