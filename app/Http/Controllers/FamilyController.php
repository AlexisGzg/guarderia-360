<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Child; // Cambiar de Children a Child
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
        $children = Child::paginate();

        return view('admin.family.index', compact('tutors', 'children'))
            ->with('i', ($request->input('page', 1) - 1) * $tutors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tutor = new Tutor();
        $children = [new Child()];

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
            // Crear tutor
            if ($request->hasFile('photo')) {
                $tutorPhotoPath = $request->file('photo')->store('public/photos');
                $tutorPhotoUrl = Storage::url($tutorPhotoPath);
            }

            $tutor = Tutor::create([
                'name' => $validated['name'],
                'middlename' => $validated['middlename'],
                'lastname' => $validated['lastname'],
                'phone' => $validated['phone'],
                'photo' => $tutorPhotoUrl ?? null,
            ]);

            //Manejo de multiples infantes
            foreach ($validated['children'] as $childData) {
                if (isset($childData['photo']) && $childData['photo']) {
                    $childPhotoPath = $childData['photo']->store('public/photos');
                    $childPhotoUrl = Storage::url($childPhotoPath);
                }

                Child::create([
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
            }

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
    public function show($id)
    {
        $tutor = Tutor::with('children')->findOrFail($id);
        $children = $tutor->children()->paginate(1);

        return view('admin.family.show', compact('tutor', 'children'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tutor = Tutor::findOrFail($id);
        $children = Child::where('tutor_id', $id)->get();

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
            $tutor = Tutor::findOrFail($id);

            // Guardar nueva foto del tutor si se ha subido
            if ($request->hasFile('photo')) {
                if ($tutor->photo) {
                    Storage::delete(str_replace('/storage', 'public', $tutor->photo));
                }
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

            // Manejo de infantes existentes y nuevos
            $existingChildIds = $tutor->children->pluck('id')->toArray();
            $submittedChildIds = [];

            foreach ($validated['children'] as $childData) {
                if (isset($childData['id'])) {
                    $submittedChildIds[] = $childData['id'];
                    $child = Child::findOrFail($childData['id']);

                    if (isset($childData['photo']) && $childData['photo']) {
                        if ($child->photo) {
                            Storage::delete(str_replace('/storage', 'public', $child->photo));
                        }
                        $childPhotoPath = $childData['photo']->store('public/photos');
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
                    $newChild = new Child([
                        'tutor_id' => $tutor->id,
                        'name' => $childData['name'],
                        'middlename' => $childData['middlename'],
                        'lastname' => $childData['lastname'],
                        'birthdate' => $childData['birthdate'],
                        'photo' => $childData['photo'] ?? null,
                        'gender' => $childData['gender'],
                        'height' => $childData['height'],
                        'weight' => $childData['weight'],
                        'description' => $childData['description'] ?? null,
                    ]);

                    if (isset($childData['photo']) && $childData['photo']) {
                        $childPhotoPath = $childData['photo']->store('public/photos');
                        $childPhotoUrl = Storage::url($childPhotoPath);
                        $newChild->photo = $childPhotoUrl;
                    }

                    $newChild->save();
                }
            }

            $childrenToDelete = array_diff($existingChildIds, $submittedChildIds);
            if ($childrenToDelete) {
                Child::whereIn('id', $childrenToDelete)->delete();
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

        Child::where('tutor_id', $id)->delete();

        return redirect()->route('family.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
