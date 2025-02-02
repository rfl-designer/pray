<?php

use function Livewire\Volt\{state};

state('user')

?>

<div class="flex-col bg-slate-950 flex items-center justify-center">
    <h1 class="text-3xl font-bold text-white sr-only">
        Pray Now!!!
    </h1>
    <div class="h-16">
        <x-assets.logo />
    </div>
    <div class="max-w-2xl mx-auto text-white/75 px-4 mt-8 text-center">
        Seja bem-vindo ao Pray Now!
        <br>
        Um meio para lembrar de conversar com o pai durante todo o dia.
    </div>
    <div class="max-w-2xl w-full text-emerald-300 px-4 mt-8 flex justify-start">
        <p class="w-full text-center italic">
            Deus é bom!
        </p>
    </div>
</div>
