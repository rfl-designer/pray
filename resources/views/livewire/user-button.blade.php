<?php

use function Livewire\Volt\{state};

state(['openUserMenu' => false]);

$setUserMenu = function () {
    $this->openUserMenu = !$this->openUserMenu;
};

?>

<div class="flex items-center justify-end p-4 w-full space-x-3 md:space-x-0 relative">
    <button type="button" wire:click="setUserMenu" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->avatar }}" alt="user photo">
    </button>
    <!-- Dropdown menu -->
    <div class="z-50 {{ $this->openUserMenu ? 'flex' : 'hidden' }} flex-col absolute top-14 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Sair
                </a>
            </li>
        </ul>
    </div>
</div>
