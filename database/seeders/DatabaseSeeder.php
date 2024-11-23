<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Genre;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->command->warn(PHP_EOL . 'Creating genres...');
        $genres = $this->withProgressBar(10, fn () => Genre::factory(1)
            ->count(10)
            ->create());
        $this->command->info('Genres created.');

        $this->command->warn(PHP_EOL . 'Creating films...');
        $genres = $this->withProgressBar(50, fn () => Film::factory(1)
            ->hasAttached($genres->random(rand(3, 6)))
            ->create());
        $this->command->info('Films created.');
    }

    protected function withProgressBar(int $amount, \Closure $createCollectionOfOne)
    {
        $progressBar = new ProgressBar($this->command->getOutput(), $amount);

        $progressBar->start();

        $items = new Collection();

        foreach (range(1, $amount) as $i) {
            $items = $items->merge(
                $createCollectionOfOne()
            );
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->command->getOutput()->writeln('');

        return $items;
    }
}
