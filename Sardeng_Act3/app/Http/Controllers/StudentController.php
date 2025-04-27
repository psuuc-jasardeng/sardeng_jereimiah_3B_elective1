<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Students;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $students = Students::when($search, function ($query, $search) {
            return $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('student_id', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);
        
        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Students::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show(Students $student)
    {
        $qrCode = QrCode::size(250)->generate(json_encode([
            'id' => $student->id,
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'student_id' => $student->student_id,
            'email' => $student->email,
            'phone' => $student->phone,
            'address' => $student->address,
        ]));
        
        return view('students.show', compact('student', 'qrCode'));
    }

    public function edit(Students $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Students $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id,'.$student->id,
            'email' => 'required|email|unique:students,email,'.$student->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
    
}
