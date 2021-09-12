<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Resources\CarResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carModel = app(Car::class);
        $carResource = new CarResource($carModel->with('category', 'brand')->paginate('10'));

        return view('cars.index', ['cars' => $carResource]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryModel = app(Category::class);
        $brandModel = app(Brand::class);

        Cache::forget('category');
        Cache::forget('brand');

        $categoriesResource = Cache::remember('category', (60*5), function () use($categoryModel) {
            return CategoryResource::collection($categoryModel->all());
        });

        $brandsResource = Cache::remember('brand', (60*5), function () use($brandModel) {
            return CategoryResource::collection($brandModel->all());
        });

        return view('cars.create', ['categories' => $categoriesResource], ['brands' => $brandsResource]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();

        $carModel = app(Car::class);

        $car = $carModel->create($data);

        if($car){
            return redirect()->route('cars.index')->with('success', 'Carro cadastrado com sucesso!');
        }
        else{
            return redirect()->route('cars.index')->with('warning', 'Erro ao cadastrar o Carro!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carModel = app(Car::class);
        $categoryModel = app(Category::class);
        $brandModel = app(Brand::class);

        $car = $carModel->with('category', 'brand')->find($id);
        $categoriesResource = Cache::remember('category', (60*5), function () use($categoryModel) {
            return CategoryResource::collection($categoryModel->all());
        });
        $brandsResource = Cache::remember('brand', (60*5), function () use($brandModel) {
            return BrandResource::collection($brandModel->all());
        });
        $carResource =  new CarResource($car);
        return view('cars.edit', compact('carResource','categoriesResource', 'brandsResource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, $id)
    {
        $data = $request->validated();
        $carModel = app(Car::class);

        $car = $carModel->find($id)->update($data);

        if($car){
            return redirect()->route('cars.index')->with('success', 'Carro atualizado com sucesso!');
        }
        else{
            return redirect()->route('cars.index')->with('warning', 'Erro ao atualizar o Carro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carModel = app(Car::class);
        $car = $carModel->find($id)->delete();

        return redirect()->route('cars.index')->with('warning', 'Carro deletado com sucesso!');
    }
}
