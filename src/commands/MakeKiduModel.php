<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeKiduModel extends Command
{
    protected $signature = 'make:kidu:model {name}';
    protected $description = 'Create a new model';

    public function handle()
    {
        $name = $this->argument('name');
        $this->createModel($name);
    }

    protected function createModel($name)
    {
        $directory = app_path("/Entities/{$name}s");
        $filePath = "{$directory}/{$name}.php";

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Check if the model file already exists
        if (File::exists($filePath)) {
            $this->error("Model for {$name} already exists.");
            return;
        }

        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('modelkidu')
        );

        File::put($filePath, $modelTemplate);
        $this->info("Kid U Model for {$name} created successfully.");
    }

    protected function getStub($type)
    {
        return file_get_contents(base_path("stubs/$type.stub"));
    }
}
