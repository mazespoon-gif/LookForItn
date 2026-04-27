<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\AdminDashboard;
use App\Livewire\Notifications;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Artisan;

Route::view("/", "welcome")->name("home");
Route::get("/guideline", function () {
    return view("guideline");
})->name("guideline");

Route::get("test-storage", function () {
    return "Storage controller working!";
});

Route::get("storage-images/{file}", [StorageController::class, 'show'])->name("storage.show");

Route::get("clear-cache", function () {
    Artisan::call("cache:clear");
    Artisan::call("config:clear");
    Artisan::call("view:clear");
    return "Cache cleared!";
});

// Route::get("/test-500", function () {
//     abort(503);
// });

Route::middleware(["auth", "verified"])->group(function () {
    Route::get("dashboard", Dashboard::class)->name("dashboard");
    Route::get("admin", AdminDashboard::class)->name("admin.dashboard");
    Route::get("notifications", \App\Livewire\Notifications::class)->name(
        "notifications",
    );
    Route::livewire("posts/create", "pages::posts.create")->name(
        "posts.create",
    );
    Route::livewire("posts/{post}/edit", "pages::posts.edit")->name(
        "posts.edit",
    );
    Route::delete("posts/{post}", [
        App\Http\Controllers\PostController::class,
        "destroy",
    ])->name("posts.destroy");
    Route::get("posts/{post}/comments", [
        CommentController::class,
        "index",
    ])->name("comments.index");
    Route::post("posts/{post}/comments", [
        CommentController::class,
        "store",
    ])->name("comments.store");
    Route::delete("comments/{comment}", [
        CommentController::class,
        "destroy",
    ])->name("comments.destroy");
    Route::post("posts/{post}/claim", [ClaimController::class, "store"])->name(
        "claims.store",
    );
    Route::get("claims", [ClaimController::class, "index"])->name(
        "claims.index",
    );
});

require __DIR__ . "/settings.php";
