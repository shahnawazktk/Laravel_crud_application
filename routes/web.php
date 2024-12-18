<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EmployeeController;


Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// List all employee
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// Show the form for creating a new employee
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// Store a new employee in the database
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Display a specific employee's details
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

// Show the form for editing an existing employee
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

// Update an existing employee's details in the database
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

// Delete a specific employee
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

















// // List all teacher
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

// Show the form for creating a new teacher
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');

// Store a new teacher in the database
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');

// Display a specific teacher's details
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');

// Show the form for editing an existing teacher
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');

// Update an existing teacher's details in the database
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');

// Delete a specific teacher
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');












// List all students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Show the form for creating a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Store a new student in the database
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Display a specific student's details
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Show the form for editing an existing student
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Update an existing student's details in the database
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

// Delete a specific student

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/students/report', [StudentController::class, 'report'])->name('students.report');


