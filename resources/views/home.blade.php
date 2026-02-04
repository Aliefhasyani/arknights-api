<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Rhodes Island | Operator List</title>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen font-sans antialiased">

    <div class="container mx-auto px-4 py-8">
        <header class="border-b border-gray-700 pb-6 mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-black tracking-tighter text-white">OPERATOR LIST</h1>
                <p class="text-gray-400 text-sm mt-1">Rhodes Island Personnel Database</p>
            </div>
            <div class="text-right hidden md:block">
                <span class="text-xs font-mono text-gray-500">SYSTEM STATUS: ACTIVE</span>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($operators as $operator)
                <div class="bg-gray-800 border border-gray-700 hover:border-yellow-500 transition-colors duration-300 group overflow-hidden shadow-xl flex flex-col">
                    
                    <div class="h-1 bg-gray-700 group-hover:bg-yellow-500 transition-colors duration-300"></div>

                    <div class="p-6 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <h2 class="text-2xl font-bold text-white tracking-tight uppercase">{{ $operator['name'] }}</h2>
                            <span class="text-yellow-500 font-bold">
                                {{ str_repeat('★', $operator['rarity'] ?? 0) }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Voice Actor</h3>
                            <p class="text-sm text-gray-300">{{ $operator['va'] ?? 'Unknown' }}</p>
                        </div>

                        <div>
                            <h3 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Personnel File</h3>
                            <p class="text-sm text-gray-400 line-clamp-4 leading-relaxed italic">
                                "{{ $operator['biography'] ?? 'No data available.' }}"
                            </p>
                        </div>
                    </div>

                    <div class="bg-gray-900/50 p-4 border-t border-gray-700 mt-auto">
                        <a href="{{ route('operator.details', $operator['name']) }}" class="w-full py-2 inline-block text-center bg-transparent border border-gray-600 hover:bg-white hover:text-black transition-all text-xs font-bold tracking-widest uppercase">
                            View File
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