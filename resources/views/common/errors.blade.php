@if (count($errors) > 0)

    <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mb-4" role="alert">
        
        <p class="font-bold">Whoops! Something went wrong</p>
        
        <br /><br />
        
        <ul>

            @foreach ($errors->all() as $error)
            
                <li>{{ $error }}</li>
            
            @endforeach

        </ul>

    </div>

@endif