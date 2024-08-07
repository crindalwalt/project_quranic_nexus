<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;


/**
 * ===================================================================
 *                          Admin Routes
 * ===================================================================
 */


use App\Http\Controllers\HomeController;

Route::middleware([AdminCheck::class,"auth","verified"])->prefix("/admin")->group(function (){
    Route::get("/",[HomeController::class,'index'])->name("admin_dashboard");
    # COURSE CRUD
    Route::get("/courses",[CourseController::class,'index'])->name("admin.courses");
    Route::get("/course/create",[CourseController::class,'create'])->name("admin.course.create");
    Route::get("/course/{course:slug}/edit",[CourseController::class,'edit'])->name("admin.course.edit");
    Route::get("/course/{course:slug}/delete",[CourseController::class,'destroy'])->name("admin.course.destroy");
    Route::post("/course/store",[CourseController::class,'store'])->name("admin.course.store");
    Route::post("/course/{course:slug}/update",[CourseController::class,'update'])->name("admin.course.update");
    # PRODUCTS CRUD
    Route::get("/products", [ProductController::class, 'index'])->name("admin.products.all");
    Route::get("/product/create", [ProductController::class, 'create'])->name("admin.product.create");
    Route::post("/product/store", [ProductController::class, 'store'])->name("admin.product.store");
    Route::get("/product/{product:slug}/edit", [ProductController::class, 'edit'])->name("admin.product.edit");
    Route::post("/product/{product:slug}/update",[ProductController::class,'update'])->name("admin.product.update");
    Route::get("/product/{product:slug}/delete", [ProductController::class, 'destroy'])->name("admin.product.destroy");
    # ORDER CRUD
    Route::get("/orders", [OrderController::class, 'index'])->name("order.index");
    Route::get("/order/{order}/detail", [OrderController::class, 'show'])->name("order.detail");
    Route::get("/order/{order}/dispatch",[OrderController::class,"dispatch"])->name("admin.order.dispatch");
    Route::get("/order/{order}/cancel",[OrderController::class,"cancel"])->name("admin.order.cancel");



    # STUDENTS
    Route::get("/students",[HomeController::class,"all_students"])->name("all_students");
    Route::get("/student/{user}/view",[HomeController::class,"single_student"])->name("single_student");
    Route::get("/student/{user}/transform",[HomeController::class,'student_transform'])->name("students.transform");


    # ENROLLMENTS
    Route::get("/enrollments",[EnrollmentController::class, "all_enrollments"])->name("enrollment.show_all");
    Route::get("/enrollment/{enrollment}/view",[EnrollmentController::class,"show"])->name("enrollment_single");
    Route::get("/enrollment/{course:slug}",[EnrollmentController::class, 'course_enrollment'])->name("course_enrollments");


    # BADGES CRUD
    Route::get("/badges",[BadgeController::class, 'index'])->name("badges.all");
    Route::get("/badge/{badge}/create",[BadgeController::class, "create"])->name("badge.create");
    Route::post("/badge/store",[BadgeController::class ,"store"])->name("badge.store");
    Route::post("/badge/{badge}/store",[BadgeController::class,"student_store"])->name("badge.store.students");
    Route::post("/badge/{student}/enroll",[BadgeController::class,"enroll"])->name("badge.student.enroll");
    Route::get("/badge/{badgeStudent}/expel",[BadgeController::class, "expel"])->name("badge.students.expel");
});


# Breeze profile routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
