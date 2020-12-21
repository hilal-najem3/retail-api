<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $categoryData = [
            'name' => $data['name'],
        ];

        if (isset($data['active'])) {
            if ($data['active'] == "True") {
                $categoryData['active'] = true;
            } else {
                $categoryData['active'] = false;
            }
        } else {
            $categoryData['active'] = false;
        }

        try {
            if (isset($data['parent'])) {
               $categoryData['parent_id'] = (int)$data['parent'];
            }
        } catch(Exception $e) {

        }

        $this->validator($categoryData)->validate();

        $category = Category::create($categoryData);

        return response()->json('Category Created', 200);
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
            'active' => 'required|bool',
        ]);
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function UpdateValidator(array $data)
    {
        return Validator::make($data, [
            'parent_id' => 'nullable|exists:categories,id',
            'active' => 'required|bool',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if ($category != null) {
           return response()->json($category, 200);
        }

        return response()->json("Not Found", 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $category = Category::findorfail($id);

        $categoryData = [
            'name' => $data['name'],
        ];

        if (isset($data['active'])) {
            if ($data['active'] == "True") {
                $categoryData['active'] = true;
            } else {
                $categoryData['active'] = false;
            }
        } else {
            $categoryData['active'] = false;
        }

        try {
            if (isset($data['parent'])) {
               $categoryData['parent_id'] = (int)$data['parent'];
            } else {
                $categoryData['parent_id'] = null;
            }
        } catch(Exception $e) {

        }

        $this->UpdateValidator($categoryData)->validate();

        if ($categoryData['name'] != $category->name) {
            $this->validate($request, [
                'name' => 'required|unique:categories,name',
            ]);

            $category->name = $categoryData['name'];
        }

        $category->active = $categoryData['active'];

        if ($categoryData['parent_id'] != null) {
            $category->parent_id = $categoryData['parent_id'];
        }

        $category->save();

        return response()->json("Category Updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
