@extends('layouts.studentLayout')

@section('title', 'My Learning Journey')

@section('content')
<div class="space-y-10 animate-in fade-in duration-1000">

    {{-- Welcome Header --}}
    <header class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 px-2">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">
                Hello, <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-400">{{auth()->user()->first_name}}</span> 👋
            </h1>
            <p class="text-slate-400 font-medium mt-2">
                You are currently in <span class="text-emerald-600 font-bold">{{ $student['classroom_name'] ?? 'test'}}</span>.
            </p>
        </div>

        <div class="flex items-center gap-4 bg-white p-2 rounded-[2rem] shadow-sm border border-slate-100">
            <div class="px-6 py-3 bg-emerald-50 rounded-[1.5rem] border border-emerald-100">
                <p class="text-[9px] font-black text-emerald-600 uppercase tracking-widest leading-tight">Academic Year</p>
                <p class="text-sm font-bold text-slate-700">{{ auth()->user()->classroom->promotion_year ?? 'N/A' }}</p>
            </div>
        </div>
    </header>


</div>
</div>
@endsection