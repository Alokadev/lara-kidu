<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeKiduController extends Command
{
    protected $signature = 'make:kidu:controller {name}';
    protected $description = 'Create a new controller';

    public function handle()
    {
        $name = $this->argument('name');
        $this->createController($name);
    }

    protected function createController($name)
    {
        $directory = app_path("/Http/Controllers");
        $filePath = "{$directory}/{$name}sController.php";

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Check if the controller file already exists
        if (File::exists($filePath)) {
            $this->error("Controller for {$name}s already exists.");
            return;
        }

        $controllerTemplate = str_replace(
            ['{{repositoryName}}'],
            [$name . 's'],
            $this->getStub('controllerkidu')
        );

        File::put($filePath, $controllerTemplate);
        $this->info("Kid U Controller for {$name} created successfully.");
    }

    protected function getStub($type)
    {
        return file_get_contents(base_path("stubs/$type.stub"));
    }
}
