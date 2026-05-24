<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

const baseClasses =
    "flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200";

const activeClasses = "bg-primary-600/20 text-primary-400";

const inactiveClasses =
    "text-slate-300 hover:bg-surface-dark-2 hover:text-white";
</script>

<template>
    <div class="flex min-h-screen bg-slate-50">
        <!-- Sidebar -->
        <aside
            class="w-64 bg-surface-dark text-white flex flex-col fixed inset-y-0 left-0 z-40"
        >
            <!-- Logo -->
            <div class="p-5 border-b border-slate-700/50">
                <Link to="/admin" class="flex items-center gap-2.5">
                    <div
                        class="w-9 h-9 bg-linear-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center"
                    >
                        <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M9 17a2 2 0 100-4 2 2 0 000 4zm6 0a2 2 0 100-4 2 2 0 000 4z"
                            />
                            <path
                                d="M5 17h-2a1 1 0 01-1-1v-4l2-6h12l2 6v4a1 1 0 01-1 1h-2m-8 0h8"
                            />
                        </svg>
                    </div>
                    <div>
                        <span class="text-lg font-bold">DriveEase</span>
                        <span
                            class="block text-[10px] uppercase tracking-widest text-slate-400 -mt-0.5"
                            >Admin Panel</span
                        >
                    </div>
                </Link>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1">
                <p
                    class="px-3 mb-2 text-[10px] font-semibold uppercase tracking-widest text-slate-500"
                >
                    Main
                </p>
                <Link
                    :href="route('dashboard')"
                    :class="[
                        baseClasses,
                        route().current('dashboard')
                            ? activeClasses
                            : inactiveClasses,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                        />
                    </svg>
                    Dashboard
                </Link>

                <p
                    class="px-3 mt-6 mb-2 text-[10px] font-semibold uppercase tracking-widest text-slate-500"
                >
                    Management
                </p>
                <Link
                    :href="route('cars.index')"
                    :class="[
                        baseClasses,
                        route().current('cars.*')
                            ? activeClasses
                            : inactiveClasses,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M9 17a2 2 0 100-4 2 2 0 000 4zm6 0a2 2 0 100-4 2 2 0 000 4z"
                        />
                        <path
                            d="M5 17h-2a1 1 0 01-1-1v-4l2-6h12l2 6v4a1 1 0 01-1 1h-2m-8 0h8"
                        />
                    </svg>
                    Manage Cars
                </Link>
                <Link
                    :href="route('rentals.index')"
                    :class="[
                        baseClasses,
                        route().current('rentals.*')
                            ? activeClasses
                            : inactiveClasses,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                        />
                    </svg>
                    Manage Rentals
                </Link>
                <Link
                    :href="route('customers.index')"
                    :class="[
                        baseClasses,
                        route().current('customers.*')
                            ? activeClasses
                            : inactiveClasses,
                    ]"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path
                            d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                        />
                    </svg>
                    Manage Customers
                </Link>
            </nav>

            <!-- Bottom -->
            <div class="p-4 border-t border-slate-700/50 space-y-1">
                <Link
                    :href="`/`"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-surface-dark-2 hover:text-white transition-all duration-200"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Site
                </Link>
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="flex w-full items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                        />
                    </svg>
                    Logout
                </Link>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <header
                class="sticky top-0 z-30 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-8 py-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <slot name="header-title">
                            <h1 class="text-lg font-semibold text-slate-800">
                                Dashboard
                            </h1>
                        </slot>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-3 pl-3">
                            <div
                                class="w-8 h-8 rounded-full bg-linear-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white text-xs font-bold"
                            >
                                {{ $page.props.auth.user.name.charAt(0) }}
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-sm font-medium text-slate-700">
                                    {{ $page.props.auth.user.name }}
                                </p>
                                <p class="text-xs text-slate-400">
                                    {{ $page.props.auth.user.email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8">
                <slot />
            </div>
        </div>
    </div>
</template>
