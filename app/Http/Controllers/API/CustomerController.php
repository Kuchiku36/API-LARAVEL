<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    // Listing des données
    public function index()
    {
        // Récupération paginée des clients avec 10 par page
        $customers = Customer::paginate(10);
        
        // Retour des clients formatés avec CustomerResource
        return CustomerResource::collection($customers);
    }

    // Création d'un nouveau client avec validation
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'adresse' => 'required|string|max:500',
        ]);

        // Retourne les erreurs de validation s'il y en a
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Création du nouveau client
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'adresse' => $request->adresse,
        ]);

        // Retourne les informations du client créé en format JSON avec code 201
        return response()->json(new CustomerResource($customer), 201);
    }

    // Affichage des données d'un client spécifique
    public function show(Customer $customer)
    {
        // Retour des informations du client en JSON
        return new CustomerResource($customer);
    }

    // Mise à jour des informations d'un client avec validation
    public function update(Request $request, Customer $customer)
    {
        // Validation des données d'entrée
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:customers,email,' . $customer->id,
            'adresse' => 'sometimes|required|string|max:500',
        ]);

        // Retourne les erreurs de validation s'il y en a
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Mise à jour des informations du client
        $customer->update([
            'name' => $request->name ?? $customer->name,
            'email' => $request->email ?? $customer->email,
            'adresse' => $request->adresse ?? $customer->adresse,
        ]);

        // Retour des informations mises à jour du client
        return response()->json(new CustomerResource($customer), 200);
    }

    // Suppression d'un client
    public function destroy(Customer $customer)
    {
        // Suppression du client
        $customer->delete();

        // Retour d'un message de confirmation
        return response()->json(['message' => 'Client supprimé avec succès'], 200);
    }
}
