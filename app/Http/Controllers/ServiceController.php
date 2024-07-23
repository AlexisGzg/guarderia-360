<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $services = Service::paginate();

        return view('admin.service.index', compact('services'))
            ->with('i', ($request->input('page', 1) - 1) * $services->perPage());
    }

    public function create(): View
    {
        $service = new Service();
        return view('admin.service.create', compact('service'));
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $data['photo'] = Storage::url($path);
        }

        Service::create($data);

        return Redirect::route('service.index')
            ->with('success', 'Service created successfully.');
    }

    public function show($id): View
    {
        $service = Service::findOrFail($id);
        return view('admin.service.show', compact('service'));
    }

    public function edit($id): View
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Eliminar la foto anterior si existe
            if ($service->photo) {
                Storage::delete(str_replace('/storage', 'public', $service->photo));
            }

            $path = $request->file('photo')->store('public/photos');
            $data['photo'] = Storage::url($path);
        }

        $service->update($data);

        return Redirect::route('admin.service.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        // Eliminar la foto del servicio si existe
        if ($service->photo) {
            Storage::delete(str_replace('/storage', 'public', $service->photo));
        }

        $service->delete();

        return Redirect::route('admin.service.index')
            ->with('success', 'Service deleted successfully');
    }
}
