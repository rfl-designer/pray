<?php

use function Livewire\Volt\{mount, state};

state('id')->locked();
state('pray');

mount(function ($id) {
    $this->pray = \App\Models\Pray::query()->findOrFail($id)->first();
});

?>

<div class="h-full flex-col w-screen bg-slate-950 flex items-center justify-center">
    <h1 class="text-3xl font-bold text-white">
        Pray Now!!!
    </h1>
    <div class="max-w-2xl mx-auto text-white/75 px-4 mt-8">
        {{ $pray->body }}
    </div>
    <div class="max-w-2xl w-full text-emerald-300 px-4 mt-8 flex justify-start">
        <p class="w-full text-left italic">
            {{ $pray->ref }}
        </p>
    </div>
</div>
