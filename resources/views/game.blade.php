@extends('layouts.main')

@section('title', 'Game List')

@section('header', 'Available Games')

@section('content')
    <h2>List of Games</h2>
    <ul>
        <li>Game 1: Adventure Quest</li>
        <li>Game 2: Space Invaders</li>
        <li>Game 3: Puzzle Mania</li>
        <li>Game 4: Racing Thunder</li>
        <li>Game 5: Mystery Dungeon</li>
    </ul>

    <p>Explore these exciting games and find your favorite!</p>

    <div class="game-actions">
        <a href="/games/create" class="btn btn-primary">Add New Game</a>
    </div>
@endsection
