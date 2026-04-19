@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Ajouter un événement</h1>

    <form method="POST" action="/admin">
        @csrf

        <input type="text" name="title" placeholder="Titre"
               class="w-full border p-2 mb-3">

        <textarea name="description" placeholder="Description"
                  class="w-full border p-2 mb-3"></textarea>

        <select name="type" class="w-full border p-2 mb-3">
            <option value="passe">Passé</option>
            <option value="encours">En cours</option>
            <option value="avenir">À venir</option>
        </select>

        <input type="date" name="date"
               class="w-full border p-2 mb-3">

        <button class="bg-purple-600 text-white px-4 py-2 rounded">
            Ajouter
        </button>

    </form>

</div>

@endsection