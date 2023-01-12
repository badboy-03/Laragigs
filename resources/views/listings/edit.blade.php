<x-layout>
    @include('partials.search')
        <x-card class=" p-10 max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Your Listing
                </h2>
                <p class="mb-4">{{$listing->title}}</p>
            </header>
    
            <form method="POST" action="{{url('/listings/'.$listing->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-6">
                    <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" value="@if(old('company')) {{Old('company')}} @else {{$listing->company}} @endif" name="company" />
                    @error('company')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" value="@if(old('title')) {{Old('title')}} @else {{$listing->title}} @endif" name="title" placeholder="Example: Senior Laravel Developer" />
                    @error('title')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" value="@if(old('location')) {{Old('location')}} @else {{$listing->location}} @endif" name="location" placeholder="Example: Remote, Boston MA, etc" />
                    @error('location')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" value="@if(old('email')) {{Old('email')}} @else {{$listing->email}} @endif" name="email" />
                    @error('email')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="website" class="inline-block text-lg mb-2">Website/Application URL</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" value="@if(old('website')) {{Old('website')}} @else {{$listing->website}} @endif" name="website" />
                    @error('website')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" value="@if(old('tags')) {{Old('tags')}} @else {{$listing->tags}} @endif" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc" />
                    @error('tags')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">Compans Logo</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" value="@if(old('logo')) {{Old('logo')}} @else {{$listing->logo}} @endif" name="logo" />
                    <img class="w-48 mr-6 mb-6" src="{{$listing->logo? asset('storage/'.$listing->logo):asset('images/no-image.png')}}" alt="{{$listing->company}}" />
                    @error('logo')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">{{old('description')? old('description'): $listing->description}}</textarea>
                    @error('description')<span class="text-red-500 mt-1 text-sm">{{$message}}</span>@enderror
                    
                </div>
    
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Update GIG
                    </button>
    
                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>
    
    </x-layout>