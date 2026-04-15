<?php

namespace App\Features\Projects\Admin\Services;

use App\Core\BaseService;
use App\Features\Projects\Admin\Models\Project;

class ProjectService extends BaseService
{
    public function paginate(int $perPage = 10)
    {
        return Project::with(['department', 'owner'])
            ->latest()
            ->paginate($perPage);
    }

    public function store(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update($data);
        return $project->fresh(['department', 'owner']);
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
}
