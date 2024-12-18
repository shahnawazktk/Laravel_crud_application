<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('asdf');
        // Paginate students with 5 items per page
        $students = Student::paginate(5);
        return view("students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image file
        ]);

        // Handle file upload
        $picPath = null;
        if ($request->hasFile('pic')) {
            // Store the picture in the public/images directory
            $picPath = $request->file('pic')->store('public/images');
        }

        // Create a new student record
        Student::create([
            'name' => $request->name,
            'fname' => $request->fname,
            'email' => $request->email,
            'phone' => $request->phone,
            'pic' => $picPath, // Store the file path in the database
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the student by id or return a 404 error if not found
        $student = Student::findOrFail($id);
        return view("students.show", compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the student by id or return a 404 error if not found
        $student = Student::findOrFail($id);
        return view("students.edit", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the student by id or return a 404 error if not found
        $student = Student::findOrFail($id);

        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:8', // Password is optional for updates
        ]);

        // Only update the password if it is provided
        $data = [
            'name' => $request->name,
            'fname' => $request->fname,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        // Update password only if it's provided
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        // Update the student with the validated data
        $student->update($data);

        return redirect()->route("students.index")->with("success", "Student updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the student by id or return a 404 error if not found
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route("students.index")->with("success", "Student deleted successfully");
    }
}
