<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";

const page = usePage();

const car = page.props.car;
</script>

<template>
    <Head :title="car.name" />
    <GuestLayout>
        <section class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav
                    class="flex items-center gap-2 text-sm text-slate-500 mb-8"
                >
                    <Link
                        href="/"
                        class="hover:text-primary-600 transition-colors"
                        >Home</Link
                    >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                    <Link
                        :href="route('cars')"
                        class="hover:text-primary-600 transition-colors"
                        >Cars</Link
                    >
                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-slate-700 font-medium">{{
                        car.name
                    }}</span>
                </nav>

                <div class="grid lg:grid-cols-2 gap-10">
                    <!-- Car Image -->
                    <div>
                        <div
                            class="bg-gradient-to-br from-slate-200 to-slate-100 rounded-3xl h-80 lg:h-[420px] flex items-center justify-center border border-slate-200"
                        >
                            <!-- <span class="text-9xl">🚗</span>
                            -->
                            <img :src="`/storage/${car.image}`" alt="Image" />
                        </div>
                    </div>

                    <!-- Car Details -->
                    <div>
                        <span
                            class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-lg mb-3"
                            >{{
                                car.availablity ? "Available" : "Not Available"
                            }}</span
                        >
                        <h1
                            class="text-3xl lg:text-4xl font-extrabold text-slate-900 mb-2"
                        >
                            {{ car.name }}
                        </h1>
                        <p class="text-lg text-slate-500 mb-6">
                            {{ car.model }} • {{ car.year }}
                        </p>

                        <div class="flex items-baseline gap-2 mb-8">
                            <span
                                class="text-4xl font-extrabold text-primary-600"
                                >${{ car.daily_rent_price }}</span
                            >
                            <span class="text-lg text-slate-400">/day</span>
                        </div>

                        <!-- Specs Grid -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p
                                    class="text-xs text-slate-400 uppercase tracking-wider mb-1"
                                >
                                    Brand
                                </p>
                                <p class="text-sm font-semibold text-slate-700">
                                    {{ car.brand }}
                                </p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p
                                    class="text-xs text-slate-400 uppercase tracking-wider mb-1"
                                >
                                    Model
                                </p>
                                <p class="text-sm font-semibold text-slate-700">
                                    {{ car.model }}
                                </p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p
                                    class="text-xs text-slate-400 uppercase tracking-wider mb-1"
                                >
                                    Year
                                </p>
                                <p class="text-sm font-semibold text-slate-700">
                                    2023
                                </p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-xl">
                                <p
                                    class="text-xs text-slate-400 uppercase tracking-wider mb-1"
                                >
                                    Type
                                </p>
                                <p class="text-sm font-semibold text-slate-700">
                                    {{ car.car_type }}
                                </p>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div
                            class="p-4 bg-amber-50 border border-amber-200 rounded-xl mb-8 flex items-start gap-3"
                        >
                            <svg
                                class="w-5 h-5 text-amber-600 shrink-0 mt-0.5"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-amber-800">
                                    Payment Method: Cash
                                </p>
                                <p class="text-xs text-amber-600 mt-0.5">
                                    Pay conveniently with cash when you pick up
                                    the car.
                                </p>
                            </div>
                        </div>

                        <Link
                            :href="route('cars.book', car.id)"
                            class="inline-flex items-center gap-2 w-full justify-center px-8 py-4 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-2xl shadow-xl shadow-primary-500/25 hover:shadow-2xl hover:shadow-primary-500/40 hover:from-primary-700 hover:to-primary-800 transition-all duration-300 text-lg"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            Book This Car
                        </Link>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
