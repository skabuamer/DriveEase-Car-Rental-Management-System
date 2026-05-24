<script setup>
import CarList from "@/Components/Car/CarList.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
</script>

<template>
    <GuestLayout>
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-12">
                    <div>
                        <span
                            class="text-primary-600 text-sm font-semibold uppercase tracking-wider"
                            >Our Fleet</span
                        >
                        <h2
                            class="text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2"
                        >
                            Featured Cars
                        </h2>
                    </div>
                    <Link
                        href="/cars"
                        class="hidden sm:inline-flex items-center gap-1.5 text-primary-600 text-sm font-semibold hover:text-primary-700 transition-colors"
                    >
                        View All Cars
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </Link>
                </div>
                <CarList />
            </div>
        </section>
    </GuestLayout>
</template>
