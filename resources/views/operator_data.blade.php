<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $operator['name'] }} | Personnel File</title>
</head>
<body class="bg-[#0b0c0f] text-gray-300 min-h-screen font-sans antialiased selection:bg-yellow-500 selection:text-black">

    <div class="container mx-auto px-4 py-12 max-w-5xl">
        
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="text-xs font-mono text-gray-500 hover:text-yellow-500 transition-colors flex items-center gap-2">
                <span>[</span> ← BACK TO DATABASE <span>]</span>
            </a>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            
            <div class="md:w-1/3">
                <div class="bg-gray-900 border border-gray-800 p-1 sticky top-8">
                    <div class="border border-gray-700 p-6 relative overflow-hidden">
                        
                        <div class="absolute top-4 right-4 text-yellow-500 text-sm tracking-widest">
                            {{ str_repeat('★', $operator['rarity'] ?? 0) }}
                        </div>

                        <h1 class="text-4xl font-black text-white italic leading-none mb-2">{{ $operator['name'] }}</h1>
                        <p class="text-xs font-mono text-yellow-600 mb-6 uppercase tracking-widest underline decoration-yellow-600/30">Rhodes Island Operator</p>

                        <div class="space-y-6">
                            <div>
                                <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Class & Archetype</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($operator['class'] as $class)
                                        <span class="px-3 py-1 bg-gray-800 border border-gray-600 text-xs font-mono text-gray-200 uppercase tracking-wide">
                                            {{ $class }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Voice Actor</h4>
                                <p class="text-white font-medium">{{ $operator['va'] ?? 'UNKNOWN' }}</p>
                            </div>
                            
                            <div>
                                <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Security Clearance</h4>
                                <p class="text-white font-medium text-sm">LEVEL {{ $operator['rarity'] ?? '0' }} / ACCESS GRANTED</p>
                            </div>

                            <div class="pt-4 border-t border-gray-800">
                                <div class="bg-yellow-500/10 border border-yellow-500/20 p-3">
                                    <p class="text-[9px] text-yellow-500 font-mono leading-tight">
                                        SYSTEM LOG: COMBAT DATA SYNCHRONIZED.
                                        STATUS: DEPLOYABLE.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-2/3">
                <div class="space-y-10">
                    
                    <section>
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-xl font-bold text-white tracking-tight uppercase">Personnel Biography</h2>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>
                        <div class="bg-gray-900/50 border-l-2 border-gray-700 p-6">
                            <p class="text-gray-300 leading-relaxed text-lg italic">
                                "{{ $operator['biography'] }}"
                            </p>
                        </div>
                    </section>

                    @if(!empty($operator['talents']))
                    <section>
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-xl font-bold text-white tracking-tight uppercase">Combat Talents</h2>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>
                        <div class="grid gap-4">
                            @foreach($operator['talents'] as $talent)
                                <div class="bg-[#15171a] border border-gray-800 p-4">
                                    <h3 class="text-sm font-bold text-yellow-500 uppercase mb-2 tracking-wide">
                                        [ {{ $talent['name'] }} ]
                                    </h3>
                                    @if(isset($talent['variation']))
                                        @php $finalTalent = end($talent['variation']); @endphp
                                        <p class="text-sm text-gray-400">
                                            {{ $finalTalent['description'] ?? 'No Description Available' }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    @if(!empty($operator['skills']))
                    <section>
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-xl font-bold text-white tracking-tight uppercase">Operational Skills</h2>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>
                        <div class="space-y-4">
                            @foreach($operator['skills'] as $skill)
                                <div class="flex gap-4 p-4 border border-gray-800 bg-[#15171a] hover:border-gray-600 transition-colors">
                                    <div class="w-12 h-12 bg-gray-800 flex items-center justify-center border border-gray-700 shrink-0">
                                        <span class="text-xs font-bold text-gray-500">S{{ $loop->iteration }}</span>
                                    </div>
                                    
                                    <div>
                                        <div class="flex justify-between items-center mb-1">
                                            <h3 class="text-white font-bold uppercase tracking-wide">{{ $skill['name'] }}</h3>
                                            @if(isset($skill['sp_cost']))
                                                <span class="text-[10px] px-2 py-0.5 bg-gray-800 text-gray-400 font-mono">SP: {{ $skill['sp_cost'] }}</span>
                                            @endif
                                        </div>
                                        
                                        @if(isset($skill['variations']))
                                            @php $finalSkill = end($skill['variations']); @endphp
                                            <p class="text-sm text-gray-400 leading-relaxed">
                                                {{ $finalSkill['description'] ?? 'No Data' }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                  <section class="mt-8">
                    <div class="flex items-center gap-4 mb-4">
                        <h2 class="text-xl font-bold text-white tracking-tight uppercase">Personnel Records</h2>
                        <div class="h-[1px] flex-1 bg-gray-800"></div>
                    </div>

                    <div class="bg-[#15171a] border border-gray-800 p-6">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                            @foreach ($operator['lore'] as $key => $value)
                                
                                <div class="{{ $key === 'infection_status' ? 'col-span-1 md:col-span-2 bg-gray-800/50 p-3 border border-gray-700/50 rounded' : '' }}">
                                    
                                    <h3 class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.15em] mb-1">
                                        {{ str_replace('_', ' ', $key) }}
                                    </h3>
                                    
                                    @if($key === 'infection_status')
                                        <p class="text-xs text-yellow-500 font-mono leading-relaxed">
                                            <span class="text-gray-400">>> </span> {{ $value }}
                                        </p>
                                    @elseif(in_array($key, ['physical_strength', 'mobility', 'physiological_endurance', 'tactical_planning', 'combat_skill', 'originium_adaptability']))
                                        <div class="flex items-center gap-2">
                                            <div class="h-1 w-1 bg-yellow-500 rounded-full"></div>
                                            <p class="text-sm text-gray-200 font-bold uppercase">{{ $value }}</p>
                                        </div>
                                    @else
                                        <p class="text-sm text-white font-medium border-l-2 border-gray-700 pl-3">
                                            {{ $value }}
                                        </p>
                                    @endif
                                    
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section>

                    <section>
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-xl font-bold text-white tracking-tight uppercase">Operator Description</h2>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>
                        <div class="p-4 bg-gray-900 border border-dashed border-gray-700">
                            <p class="text-sm text-gray-500 font-mono leading-relaxed">
                                {{ $operator['description'] ?? 'No tactical summary available.' }}
                            </p>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>

</body>
</html>