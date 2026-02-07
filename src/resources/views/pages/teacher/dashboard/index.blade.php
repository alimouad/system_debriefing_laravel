@extends('layouts.teacherLayout')

@section('title', 'Teacher Workspace')

@section('content')
<div class="space-y-10 animate-in fade-in duration-700">

    {{-- Header --}}
    <header class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 px-4">
        <div class="flex items-center gap-6">
            {{-- Optional: Teacher Avatar Circle --}}
            <div class="hidden md:flex w-16 h-16 rounded-[2rem] bg-indigo-600 items-center justify-center text-white shadow-xl shadow-indigo-200">
                <span class="text-xl font-black">{{ strtoupper(substr(auth()->user()->first_name ?? 'T', 0, 1)) }}</span>
            </div>

            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">
                    Hello, <span class="text-indigo-600">{{ auth()->user()->first_name ?? 'Teacher' }}</span>
                </h1>
                <p class="text-slate-400 font-medium mt-1 uppercase text-[10px] tracking-widest flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Teacher Portal • {{ date('l, d M') }}
                </p>
            </div>
        </div>

        {{-- Quick Search/Action --}}
        <div class="flex items-center gap-3">
            <div class="hidden sm:flex flex-col items-end">
                <span class="text-xs font-black text-slate-800">{{ auth()->user()->first_name ?? 'Teacher' }} {{ auth()->user()->last_name ?? 'User' }}</span>
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter">Academic Lead</span>
            </div>
        </div>
    </header>

</div>
@endsection