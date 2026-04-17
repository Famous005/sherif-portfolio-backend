<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| Public Routes (no auth required)
|--------------------------------------------------------------------------
*/

// Auth
Route::post('/login', [AuthController::class, 'login']);

// Portfolio data (read-only, public)
Route::get('/projects',          [ProjectController::class,    'index']);
Route::get('/projects/featured', [ProjectController::class,    'featured']);
Route::get('/projects/{project}', [ProjectController::class,   'show']);
Route::get('/skills',            [SkillController::class,      'index']);
Route::get('/experiences',       [ExperienceController::class, 'index']);
Route::get('/educations',        [EducationController::class,  'index']);
Route::get('/settings',          [SettingController::class,    'index']);

// Contact form submission (public)
Route::post('/contact', [ContactController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Protected Admin Routes (Sanctum token required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);

    // Projects
    Route::post('/projects',            [ProjectController::class, 'store']);
    Route::put('/projects/{project}',   [ProjectController::class, 'update']);
    Route::delete('/projects/{project}',[ProjectController::class, 'destroy']);

    // Skills
    Route::post('/skills',          [SkillController::class, 'store']);
    Route::put('/skills/{skill}',   [SkillController::class, 'update']);
    Route::delete('/skills/{skill}',[SkillController::class, 'destroy']);

    // Experiences
    Route::post('/experiences',                 [ExperienceController::class, 'store']);
    Route::put('/experiences/{experience}',     [ExperienceController::class, 'update']);
    Route::delete('/experiences/{experience}',  [ExperienceController::class, 'destroy']);

    // Education
    Route::post('/educations',              [EducationController::class, 'store']);
    Route::put('/educations/{education}',   [EducationController::class, 'update']);
    Route::delete('/educations/{education}',[EducationController::class, 'destroy']);

    // Contact messages
    Route::get('/contacts',                     [ContactController::class, 'index']);
    Route::patch('/contacts/{contact}/read',    [ContactController::class, 'markRead']);
    Route::delete('/contacts/{contact}',        [ContactController::class, 'destroy']);

    // Settings
    Route::put('/settings', [SettingController::class, 'update']);

    // Password change
    Route::put('/admin/password', [\App\Http\Controllers\Api\AuthController::class, 'changePassword']);
});
