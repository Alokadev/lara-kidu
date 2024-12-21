<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeKiduRepository extends Command
{
    protected $signature = 'make:kidu:repo {name}';
    protected $description = 'Create a new repository';

    public function handle()
    {
        $name = $this->argument('name');
        $this->createRepository($name);
    }

    protected function createRepository($name)
    {
        $directory = app_path("/Entities/{$name}s");
        $filePath = "{$directory}/{$name}sRepository.php";

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Check if the repository file already exists
        if (File::exists($filePath)) {
            $this->error("Repository for {$name}s Repository already exists.");
            return;
        }

        $repositoryTemplate = str_replace(
            ['{{modelName}}', '{{repositoryName}}'],
            [$name, $name . 's'],
            $this->getStub('repokidu')
        );

        File::put($filePath, $repositoryTemplate);
        $this->info("Kid U Repository for {$name} created successfully.");
    }

    protected function getStub($type)
    {
        return file_get_contents(base_path("stubs/$type.stub"));
    }
}
