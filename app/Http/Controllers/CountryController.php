<?php

 namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show($countryName)
    {
        //  dd('show');
        // $response = Http::get("https://restcountries.com/v3.1/name/" . urlencode($countryName));
        $countryName = str_replace('-', ' ', $countryName); // Replace hyphens with spaces for full text search
        //  $countryName = 'United States of America';
        // $response = Http::get("https://restcountries.com/v3.1/name/" . urlencode($countryName) . "?fullText=true");
        $response = Http::get("https://restcountries.com/v3.1/name/" . rawurlencode($countryName) . "?fullText=true");

        // dd($countryName);
        if ($response->failed()) {
            dd('show');
            //   return $this->showRandom();
            abort(404, 'Country not found');
        }

        $country = $response->json()[0] ?? [];
        // dd($country['flags']['svg']);
        $data = [
            'region' => $country['region'] ?? '',
            'name' => $country['name']['common'] ?? '',
            'capital' => is_array($country['capital'] ?? null) ? $country['capital'][0] : '',
            'region' => $country['region'] ?? '',
            'population' => $country['population'] ?? 0,
            'area' => $country['area'] ?? 0,
            'languages' => isset($country['languages']) ? implode(', ', $country['languages']) : '',
            'currency' => isset($country['currencies']) ? array_key_first($country['currencies']) : '',
            'flag' => $country['flags']['svg'] ?? '',
            'latlng' => $country['latlng'] ?? [],
        ];

        return view('country.show', compact('data'));
    }

    public function showRandom()
    {
        // dd('showRandom');
        $all = Http::get('https://restcountries.com/v3.1/all?fields=name,capital,region,population,area,languages,currencies,flags,latlng')->json();
        // $all = Http::get("https://restcountries.com/v3.1/name/" . urlencode($countryName) . "?fullText=true");

        if (!is_array($all) || empty($all)) {
            dd('showRandom');
            abort(500, 'Unable to fetch countries.');
        }
        $country = $all[array_rand($all)];

        $data = [
            'name' => $country['name']['common'] ?? '',
            'capital' => is_array($country['capital'] ?? null) ? $country['capital'][0] : '',
            'region' => $country['region'] ?? '',
            'population' => $country['population'] ?? 0,
            'area' => $country['area'] ?? 0,
            'languages' => isset($country['languages']) ? implode(', ', $country['languages']) : '',
            'currency' => isset($country['currencies']) ? array_key_first($country['currencies']) : '',
            'flag' => $country['flags']['svg'] ?? '',
            'latlng' => $country['latlng'] ?? [],
        ];

        return view('country.show', compact('data'));
    }

    public function redirectToRandom()
    {
        // dd('redirectToRandom');
        $all = Http::get('https://restcountries.com/v3.1/all?fields=name')->json();

        if (!is_array($all) || empty($all)) {
            dd('redirectToRandom');

            abort(500, 'Unable to fetch countries.');
        }

        $randomCountry = $all[array_rand($all)];
        $slug = Str::slug($randomCountry['name']['common']);

        return redirect()->route('country.show', ['country' => $slug]);
    }

    public function contactus(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
}

