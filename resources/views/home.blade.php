<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Rhodes Island | Operator List</title>
</head>
<body class="bg-[#121212] text-gray-100 min-h-screen font-sans antialiased">

    <div class="container mx-auto px-4 py-8">
        <header class="border-b border-gray-700 pb-6 mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-black tracking-tighter text-white">OPERATOR LIST</h1>
                <p class="text-gray-400 text-sm mt-1">Rhodes Island Personnel Database</p>
            </div>
            <div class="text-right hidden md:block">
                <span class="text-xs font-mono text-yellow-500">SYSTEM STATUS: ONLINE</span>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($operators as $operator)
                <div class="bg-[#1a1a1a] border border-gray-700 hover:border-yellow-500 transition-colors duration-300 group overflow-hidden shadow-lg flex flex-col h-full rounded-sm">
                    
                    <div class="h-1 bg-gray-600 group-hover:bg-yellow-500 transition-colors duration-300"></div>

                    <div class="p-6 flex-1 flex flex-col space-y-5">
                        
                        <div>
                            <div class="flex justify-between items-start mb-2">
                                <h2 class="text-2xl font-bold text-white tracking-tight uppercase leading-none drop-shadow-md">
                                    {{ $operator['name'] }}
                                </h2>
                                <span class="text-yellow-400 text-xs tracking-widest font-bold">
                                    {{ str_repeat('★', $operator['rarity'] ?? 0) }}
                                </span>
                            </div>
                            
                            <div class="flex flex-wrap gap-2">
                                @foreach ($operator['class'] as $class)
                                    <span class="px-2 py-1 bg-gray-700 border border-gray-600 text-[11px] font-mono text-gray-100 uppercase rounded shadow-sm">
                                        {{ $class }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 border-b border-gray-700 pb-1 inline-block">
                                    Voice Actor
                                </h3>
                                <p class="text-sm text-gray-100 font-medium truncate">
                                    {{ $operator['va'] ?? 'Unknown' }}
                                </p>
                            </div>

                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1 border-b border-gray-700 pb-1 inline-block">
                                    Bio Summary
                                </h3>
                                <p class="text-sm text-gray-300 line-clamp-3 leading-relaxed">
                                    "{{ $operator['biography'] ?? 'No data.' }}"
                                </p>
                            </div>
                        </div>

                     

                    </div>

                    <div class="bg-[#121212] p-4 border-t border-gray-700 mt-auto">
                        <a href="{{ route('operator.details', $operator['name']) }}" class="block w-full py-3 text-center bg-gray-800 border border-gray-600 text-gray-200 hover:bg-white hover:text-black hover:border-white transition-all text-xs font-bold tracking-[0.15em] uppercase rounded-sm">
                            View Full File
                        </a>
                    </div>
                </div>
            @endforeach
        </div> 

        <div class="mt-10 py-6 border-t border-gray-800 flex justify-center">
             {{ $operators->links('pagination.arknights') }}
        </div>

    </div>

</body>
</html>