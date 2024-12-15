<?php

namespace Database\Seeders;

use App\Models\SerialNumber;
use Illuminate\Database\Seeder;

class SerialNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'serial_number' => 1,
                'photo' => 'img/image.jpeg',
                'text' => 'ShaFa',
            ],
            [
                'serial_number' => 2,
                'photo' => 'img/image.jpeg',
                'text' => 'RiDo',
            ],
        ])->each(function ($v) {
            $serial = SerialNumber::query()->create($v);

            $serial->Vision()->create([
                'text' => 'Pellentesque at est id metus mattis fermentum. Integer eget ex finibus tortor congue facilisis. Ut pretium ornare aliquam. Morbi mollis nisi quis augue porttitor, vel porta diam auctor. Nullam pretium volutpat magna, vitae porttitor dui vestibulum sit amet. Nunc viverra diam quis sodales lobortis. Ut a porta sapien, in imperdiet leo. Cras ut enim porta, mattis purus eget, scelerisque arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam vel massa orci. In ullamcorper ligula ut lacus maximus ultrices. Morbi aliquet diam a fermentum finibus. Sed neque risus, venenatis ac feugiat vitae, varius at augue. Vestibulum bibendum risus eu elit lacinia, eget tincidunt turpis congue. Etiam auctor consectetur eros.',
            ]);

            $serial->Mission()->create([
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Mauris auctor lacus at dolor tincidunt, vehicula consectetur eros viverra.
Curabitur tempor dolor in libero euismod, finibus sagittis justo dictum.
Morbi ac urna interdum, scelerisque tortor nec, commodo metus.
Mauris sit amet ipsum posuere, mattis ex ut, suscipit odio.
Aenean ultrices magna a ante imperdiet vulputate.',
            ]);
        });
    }
}
