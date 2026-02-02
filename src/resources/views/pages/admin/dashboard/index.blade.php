@extends('layouts.adminLayout')

@section('title', 'Admin Dashboard')

@section('content')

<div class="max-w-full space-y-8 animate-in fade-in slide-in-from-bottom-8 duration-1000 ease-out p-1">

    {{-- Header Section --}}
    <section class="bg-white/70 backdrop-blur-3xl rounded-[3.5rem] p-8 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.08)] border border-white/80 ring-1 ring-black/[0.01]">
        <div class="flex justify-between items-center mb-10">
            <div class="flex items-center gap-5">
                <div class="relative">
                    <div class="w-16 h-16 rounded-[2rem] pink-gradient flex items-center justify-center text-white shadow-[0_10px_20px_rgba(255,79,122,0.3)] ring-4 ring-white">
                        <span class="material-symbols-outlined text-4xl">admin_panel_settings</span>
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-4 border-white rounded-full shadow-sm"></span>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">
                        Hello, <span class="text-transparent bg-clip-text pink-gradient">admin</span>
                    </h1>
                    <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-pink-500 animate-pulse"></span>
                        Système d'administration
                    </p>
                </div>
            </div>
            <button class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400 hover:text-pink-500 hover:bg-white hover:shadow-xl transition-all duration-300">
                <span class="material-symbols-outlined text-2xl">notifications</span>
            </button>
        </div>


    {{-- History / Recent Activity Section --}}
    <section class="bg-white/80 backdrop-blur-2xl rounded-[3.5rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-white/60">
        <div class="flex items-center justify-between mb-8 px-2">
            <div>
                <h2 class="font-black text-slate-900 text-xl tracking-tight">Aperçu Sprints</h2>
                <div class="h-1.5 w-8 pink-gradient rounded-full mt-1.5"></div>
            </div>
            <a href="/admin/sprints" class="text-[10px] font-black text-pink-500 uppercase tracking-[0.2em] bg-pink-50 px-4 py-2 rounded-full hover:bg-pink-500 hover:text-white transition-all duration-300">
                Gérer tout
            </a>
        </div>

        <div class="space-y-4">
            <p class="text-center py-6 text-slate-400 italic text-xs font-medium border-2 border-dashed border-slate-100 rounded-[2rem]">
                L'historique des activités apparaîtra ici au fur et à mesure que les sessions progressent.
            </p>
        </div>
    </section>

    <div class="flex justify-center pb-4">
        <a href="/logout" class="group flex items-center gap-3 px-8 py-3 rounded-2xl hover:bg-rose-50 transition-all duration-300">
            <span class="material-symbols-outlined text-slate-400 group-hover:text-rose-500 transition-all">logout</span>
            <span class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] group-hover:text-rose-500 transition-colors">Déconnexion</span>
        </a>
    </div> -->

</div>

@endsection
