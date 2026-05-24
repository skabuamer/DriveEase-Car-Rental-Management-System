<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, usePage } from "@inertiajs/vue3";

const page = usePage();

const data = page.props;
console.log(page.props);
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <template #header-title>
            <h1 class="text-lg font-semibold text-slate-800">Dashboard</h1>
            <p class="text-sm text-slate-400">
                Welcome back, Admin! Here's your overview.
            </p>
        </template>

        <!-- Stats Cards -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Cars -->
            <div
                class="bg-white rounded-2xl border border-slate-200 p-6 hover:shadow-md transition-shadow"
            >
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center"
                    >
                        <svg
                            class="w-6 h-6 text-blue-600"
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
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    {{ data.cars }}
                </p>
                <p class="text-sm text-slate-500 mt-1">Total Cars</p>
            </div>

            <!-- Available Cars -->
            <div
                class="bg-white rounded-2xl border border-slate-200 p-6 hover:shadow-md transition-shadow"
            >
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center"
                    >
                        <svg
                            class="w-6 h-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    {{ data.availableCars }}
                </p>
                <p class="text-sm text-slate-500 mt-1">Available Cars</p>
            </div>

            <!-- Total Rentals -->
            <div
                class="bg-white rounded-2xl border border-slate-200 p-6 hover:shadow-md transition-shadow"
            >
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center"
                    >
                        <svg
                            class="w-6 h-6 text-purple-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    {{ data.rentals }}
                </p>
                <p class="text-sm text-slate-500 mt-1">Total Rentals</p>
            </div>

            <!-- Total Earnings -->
            <div
                class="bg-white rounded-2xl border border-slate-200 p-6 hover:shadow-md transition-shadow"
            >
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center"
                    >
                        <svg
                            class="w-6 h-6 text-amber-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    ${{ data.earnings }}
                </p>
                <p class="text-sm text-slate-500 mt-1">Total Earnings</p>
            </div>
        </div>
    </AdminLayout>
</template>
