<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Traits\FileUploadTrait;

use Illuminate\Http\Request;

class AdminCountryController extends Controller
{
    use FileUploadTrait;
    public function index(){
        $countries = Country::orderBy('name')->get();
        return view('admin.country.index', compact('countries'));
    }

    public function create(){
        $country = new Country();
        return view('admin.country.create', compact('country'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:countries,name',
            'code' => 'required|unique:countries,code',
            'currency' => 'required|unique:countries,currency',
            'currency_symbol' => 'required|unique:countries,currency_symbol',
            'currency_code' => 'required|unique:countries,currency_code',
            'flag' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $this->uploadFile($request->file('flag'), 'flags', 100, 100);

        Country::create([
            'name' => $request->name,
            'code' => $request->code,
            'currency' => $request->currency,
            'currency_symbol' => $request->currency_symbol,
            'currency_code' => $request->currency_code,
            'flag' => $imagePath,
        ]);

        return redirect()->route('admin.country.index')->with('success', 'Country created successfully.');
    }

    public function edit(Country $country){
        return view('admin.country.edit', compact('country'));
    }
}
