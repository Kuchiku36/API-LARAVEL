<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Listing des données
    public function index()
    {
        // Récupération paginée des utilisateurs avec 10 par page
        $users = User::paginate(10);
        
        // Retour des utilisateurs formatés avec UserResource
        return UserResource::collection($users);
    }

    // Création d'un nouvel utilisateur avec validation
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            
        ]);

        // Retourne les erreurs de validation s'il y en a
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Création du nouvel utilisateur avec hash du mot de passe

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Retourne les informations de l'utilisateur créé en format JSON avec code 201
        return response()->json(new UserResource($user), 201);
    }

    // Affichage des données d'un utilisateur spécifique
    public function show(User $user)
    {
        // Retour des informations de l'utilisateur en JSON
        return new UserResource($user);
    }

    // Mise à jour des informations d'un utilisateur avec validation
    public function update(Request $request, User $user)
    {
        // Validation des données d'entrée
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        // Retourne les erreurs de validation s'il y en a
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Mise à jour des informations de l'utilisateur (mot de passe hashé si présent)
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Retour des informations mises à jour de l'utilisateur
        return response()->json(new UserResource($user), 200);
    }

    // Suppression d'un utilisateur
    public function destroy(User $user)
    {
        // Suppression de l'utilisateur
        $user->delete();

        // Retour d'un message de confirmation
        return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
    }
}