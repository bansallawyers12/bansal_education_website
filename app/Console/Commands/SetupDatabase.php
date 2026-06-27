<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use PDO;
use PDOException;

class SetupDatabase extends Command
{
    protected $signature = 'app:setup {--seed : Run database seeders after migrating}';

    protected $description = 'Create the database if missing, then run all migrations';

    public function handle(): int
    {
        $connection = config('database.default');
        $config = config("database.connections.{$connection}");

        if (($config['driver'] ?? '') !== 'mysql') {
            $this->warn('Database auto-create is only supported for MySQL. Running migrations only.');

            return $this->runMigrations();
        }

        $database = $config['database'];

        if (! $this->ensureDatabaseExists($config, $database)) {
            return self::FAILURE;
        }

        return $this->runMigrations();
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function ensureDatabaseExists(array $config, string $database): bool
    {
        $charset = $config['charset'] ?? 'utf8mb4';
        $collation = $config['collation'] ?? 'utf8mb4_unicode_ci';

        try {
            $pdo = new PDO(
                sprintf(
                    'mysql:host=%s;port=%s',
                    $config['host'] ?? '127.0.0.1',
                    $config['port'] ?? 3306
                ),
                $config['username'] ?? 'root',
                $config['password'] ?? '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            $pdo->exec(
                sprintf(
                    'CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET %s COLLATE %s',
                    str_replace('`', '``', $database),
                    $charset,
                    $collation
                )
            );

            $this->info("Database [{$database}] is ready.");
        } catch (PDOException $exception) {
            $this->error('Could not create database: '.$exception->getMessage());

            return false;
        }

        return true;
    }

    private function runMigrations(): int
    {
        $exitCode = Artisan::call('migrate', ['--force' => true]);
        $this->output->write(Artisan::output());

        if ($exitCode !== self::SUCCESS) {
            return self::FAILURE;
        }

        if ($this->option('seed')) {
            $seedExitCode = Artisan::call('db:seed', ['--force' => true]);
            $this->output->write(Artisan::output());

            if ($seedExitCode !== self::SUCCESS) {
                return self::FAILURE;
            }
        }

        $this->info('Database setup complete.');

        return self::SUCCESS;
    }
}
