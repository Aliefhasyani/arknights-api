<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $operator['name'] }} | Operator File</title>
</head>
<body class="bg-[#0b0c0f] text-gray-300 min-h-screen font-sans antialiased">

    <div class="container mx-auto px-4 py-12 max-w-5xl">
        
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="text-xs font-mono text-gray-500 hover:text-yellow-500 transition-colors flex items-center gap-2">
                <span>[</span> ← BACK TO DATABASE <span>]</span>
            </a>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            
            <div class="md:w-1/3">
                <div class="bg-gray-900 border border-gray-800 p-1">
                    <div class="border border-gray-700 p-6 relative overflow-hidden">
                        
                        <div class="absolute top-4 right-4 text-yellow-500 text-sm tracking-widest">
                            {{ str_repeat('★', $operator['rarity'] ?? 0) }}
                        </div>

                        <h1 class="text-4xl font-black text-white italic leading-none mb-2">{{ $operator['name'] }}</h1>
                        <p class="text-xs font-mono text-yellow-600 mb-6 uppercase tracking-widest underline decoration-yellow-600/30">Rhodes Island Operator</p>

                        <div class="space-y-4">
                            <div>
                                <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Voice Actor</h4>
                                <p class="text-white font-medium">{{ $operator['va'] ?? 'UNKNOWN' }}</p>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Security Clearance</h4>
                                <p class="text-white font-medium text-sm">LEVEL {{ $operator['rarity'] ?? '0' }} / ACCESS GRANTED</p>
                            </div>
                            <div class="pt-4 border-t border-gray-800">
                                <div class="bg-yellow-500/10 border border-yellow-500/20 p-3">
                                    <p class="text-[9px] text-yellow-500 font-mono leading-tight">
                                        SYSTEM LOG: PERSONNEL FILE ACCESSED BY AUTHORIZED USER. 
                                        DATA INTEGRITY: 100%
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-2/3">
                <div class="space-y-8">
                    
                    <section>
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-xl font-bold text-white tracking-tight uppercase">Personnel Biography</h2>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>
                        <div class="bg-gray-900/50 border-l-2 border-gray-700 p-6">
                            <p class="text-gray-400 leading-relaxed text-lg italic">
                                "{{ $operator['biography'] }}"
                            </p>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-xl font-bold text-white tracking-tight uppercase">Tactical Summary</h2>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>
                        <p class="text-sm text-gray-500 font-mono leading-relaxed">
                            {{ $operator['description'] }}
                        </p>
                    </section>
                </div>
            </div>

        </div>
    </div>

</body>
</html>