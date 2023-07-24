<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;

use Exception;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create(){

        return view('products.create');
    }

    public function store(Request $request){

        try {
            $data = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
            ];
            $messages = [
                'name.required' => 'O nome do produto deve ser preenchido.',
                'price.required' => 'O preço do produto deve ser preenchido.',
                'description.required' => 'A descrição do produto deve ser preenchido.',
                'quantity.required' => 'A quantidade do produto deve ser preenchida.',
            ];

            $rules = [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'quantity' => 'required',
            ];

            $validator = Validator::make(
                $data,
                $rules,
                $messages
            );

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Product::create($data);
            return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');

        }   catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    public function edit($id){

        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id){

        try {
            $data = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
            ];
            $messages = [
                'name.required' => 'O nome do produto deve ser preenchido.',
                'price.required' => 'O preço do produto deve ser preenchido.',
                'description.required' => 'A descrição do produto deve ser preenchido.',
                'quantity.required' => 'A quantidade do produto deve ser preenchida.',
            ];

            $rules = [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'quantity' => 'required',
            ];

            $validator = Validator::make(
                $data,
                $rules,
                $messages
            );

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $product = Product::findOrFail($id);
            $product->update($data);
            return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    public function destroy($id){
        
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Erro ao excluir o produto.');
        }
    }
}
