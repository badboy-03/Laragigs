@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false,3000)" x-show="show" class="fixed left-1/2 top-0 transform -translate-x-1/2 bg-laravel text-white px-40 py-3">
<p>{{session('message')}}</p>
</div>
@endif