<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Children;
use App\Http\Requests\FamilyRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tutors = Tutor::paginate();
        $childrens = Children::paginate();

        return view('admin.family.index', compact('tutors', 'childrens'))
            ->with('i', ($request->input('page', 1) - 1) * $tutors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tutor = new Tutor();
        $children = new Children();

        return view('admin.family.create', compact('tutor', 'children'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            // Guardar la foto del tutor
            if ($request->hasFile('photo')) {
                $tutorPhotoPath = $request->file('photo')->store('public/photos');
                $tutorPhotoUrl = Storage::url($tutorPhotoPath);
            }

            // Crear tutor
            $tutor = Tutor::create([
                'name' => $validated['name'],
                'middlename' => $validated['middlename'],
                'lastname' => $validated['lastname'],
                'phone' => $validated['phone'],
                'photo' => $tutorPhotoUrl ?? null,
            ]);

            // Guardar la foto del infante
            if ($request->hasFile('child_photo')) {
                $childPhotoPath = $request->file('child_photo')->store('public/photos');
                $childPhotoUrl = Storage::url($childPhotoPath);
            }

            // Crear infante
            Children::create([
                'tutor_id' => $tutor->id,
                'name' => $validated['name'],
                'middlename' => $validated['middlename'],
                'lastname' => $validated['lastname'],
                'birthdate' => $validated['birthdate'],
                'photo' => $childPhotoUrl ?? null,
                'gender' => $validated['gender'],
                'height' => $validated['height'],
                'weight' => $validated['weight'],
                'description' => $validated['description'] ?? null,
            ]);

            DB::commit();

            return redirect()->route('family.index')->with('success', 'Registro creado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al guardar los datos.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tutor = Tutor::findOrFail($id);
        $children = Children::where('tutor_id', $id)->paginate();

        return view('admin.family.show', compact('tutor', 'children'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tutor = Tutor::findOrFail($id);
        $children = Children::where('tutor_id', $id)->get();

        return view('admin.family.edit', compact('tutor', 'children'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FamilyRequest $request, $id): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            // Actualizar tutor
            $tutor = Tutor::findOrFail($id);

            // Guardar nueva foto del tutor si se ha subido
            if ($request->hasFile('photo')) {
                $tutorPhotoPath = $request->file('photo')->store('public/photos');
                $tutorPhotoUrl = Storage::url($tutorPhotoPath);
                $tutor->photo = $tutorPhotoUrl;
            }

            $tutor->update([
                'name' => $validated['name'],
                'middlename' => $validated['middlename'],
                'lastname' => $validated['lastname'],
                'phone' => $validated['phone'],
                'photo' => $tutor->photo,
            ]);

            // Procesar hijos existentes y nuevos
            foreach ($validated['children'] as $childData) {
                if (isset($childData['id'])) {
                    $child = Children::findOrFail($childData['id']);

                    // Guardar nueva foto del infante si se ha subido
                    if ($request->hasFile('child_photo')) {
                        $childPhotoPath = $request->file('child_photo')->store('public/photos');
                        $childPhotoUrl = Storage::url($childPhotoPath);
                        $child->photo = $childPhotoUrl;
                    }

                    $child->update([
                        'name' => $childData['name'],
                        'middlename' => $childData['middlename'],
                        'lastname' => $childData['lastname'],
                        'birthdate' => $childData['birthdate'],
                        'photo' => $child->photo,
                        'gender' => $childData['gender'],
                        'height' => $childData['height'],
                        'weight' => $childData['weight'],
                        'description' => $childData['description'] ?? $child->description,
                    ]);
                } else {
                    // Crear nuevo niño asociado al tutor
                    $newChild = new Children([
                        'tutor_id' => $tutor->id,
                        'name' => $childData['name'],
                        'middlename' => $childData['middlename'],
                        'lastname' => $childData['lastname'],
                        'birthdate' => $childData['birthdate'],
                        'photo' => $childPhotoUrl ?? null,
                        'gender' => $childData['gender'],
                        'height' => $childData['height'],
                        'weight' => $childData['weight'],
                        'description' => $childData['description'] ?? null,
                    ]);

                    // Guardar nueva foto del infante si se ha subido
                    if ($request->hasFile('child_photo')) {
                        $childPhotoPath = $request->file('child_photo')->store('public/photos');
                        $childPhotoUrl = Storage::url($childPhotoPath);
                        $newChild->photo = $childPhotoUrl;
                    }

                    $newChild->save();
                }
            }

            DB::commit();

            return redirect()->route('family.index')->with('success', 'Información actualizada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar los datos.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        Children::where('tutor_id', $id)->delete();

        return redirect()->route('family.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
