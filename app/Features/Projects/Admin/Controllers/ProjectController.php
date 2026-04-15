<?php

namespace App\Features\Projects\Admin\Controllers;

use App\Core\BaseController;
use App\Features\Auth\Models\User;
use App\Features\Departments\Admin\Models\Department;
use App\Features\Projects\Admin\Models\Project;
use App\Features\Projects\Admin\Requests\StoreProjectRequest;
use App\Features\Projects\Admin\Requests\UpdateProjectRequest;
use Inertia\Inertia;
use App\Features\Projects\Admin\Services\ProjectService;
class ProjectController extends BaseController
{
    public function __construct(
        protected ProjectService $projectService
    ) {}

    public function index()
    {
        return Inertia::render('(portals)/admin/projects/page', [
            'projects' => $this->projectService->paginate(10),
            'departments' => Department::select('id', 'name')->get(),
            'owners' => User::select('id', 'name')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('(portal)/admin/projects/create', [
            'departments' => Department::select('id', 'name')->get(),
            'owners' => User::select('id', 'name', 'email')->get(),
            'statuses' => ['active', 'on_hold', 'archived'],
        ]);
    }

    public function store(StoreProjectRequest $request)
    {
        $this->projectService->store($request->validated());

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return Inertia::render('(portal)/admin/projects/edit', [
            'project' => $project,
            'departments' => Department::select('id', 'name')->get(),
            'owners' => User::select('id', 'name', 'email')->get(),
            'statuses' => ['active', 'on_hold', 'archived'],
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->update($project, $request->validated());

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $this->projectService->delete($project);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

}
