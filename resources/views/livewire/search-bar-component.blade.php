<div>
    <form action="{{ route('search.index') }}" id="search-form" wire:ignore>
        <input type="search" placeholder=" search here..." name="search" id="search-box" wire:model="search">
       <button type="submit" for="search-box m-1" class="fas fa-search text-white ml-5" style="font-size: 40px;"></button>
        <i class="fas fa-times m-1" id="close"></i>
    </form>
</div>
