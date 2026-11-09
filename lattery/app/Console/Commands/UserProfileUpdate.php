<?php

namespace App\Console\Commands;

use App\Models\Profile;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Stevebauman\Location\Facades\Location;

use Illuminate\Support\Facades\Http;

#[Signature('app:user-profile-update')]
#[Description('Update user prifile')]
class UserProfileUpdate extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $profiles = Profile::whereNull('road')->orWhereNull('town')->get();
        foreach ($profiles as $profile) {
            try {
                if (empty($profile->ip)) {
                    continue;
                }

                $location = Location::get($profile->ip);

                if (!$location || empty($location->latitude) || empty($location->longitude)) {
                    continue;
                }

                $response = Http::withHeaders([
                    'User-Agent' => 'MyLaravelApp/1.0',
                ])->get('https://nominatim.openstreetmap.org/reverse', [
                    'lat'    => $location->latitude,
                    'lon'    => $location->longitude,
                    'format' => 'jsonv2',
                ]);

                if (!$response->successful()) {
                    break;
                }

                $data = $response->json();

                if (empty($data['address'])) {
                    continue;
                }

                $address = $data['address'];

                $profile->town        = $address['town']
                    ?? $address['city']
                    ?? $address['municipality']
                    ?? null;

                $profile->road        = $address['road'] ?? null;
                $profile->village     = $address['quarter'] ?? $address['village'] ?? null;
                $profile->sub_village = $address['suburb'] ?? null;

                $profile->save();

            } catch (\Throwable $e) {
                break;
            }
        }
    }
}
