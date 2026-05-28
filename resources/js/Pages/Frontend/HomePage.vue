<script setup>
import CarList from "@/Components/Car/CarList.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";

const page = usePage();
</script>

<template>
    <Head title="Home" />
    <GuestLayout>
        <!-- Hero Section -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-surface-dark via-primary-900 to-surface-dark"
        >
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute top-0 left-1/4 w-96 h-96 bg-primary-500 rounded-full blur-3xl"
                ></div>
                <div
                    class="absolute bottom-0 right-1/4 w-80 h-80 bg-accent-500 rounded-full blur-3xl"
                ></div>
            </div>
            <div
                class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-36"
            >
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/15 text-primary-300 text-xs font-semibold uppercase tracking-wider mb-6"
                        >
                            <span
                                class="w-1.5 h-1.5 bg-primary-400 rounded-full animate-pulse"
                            ></span>
                            Premium Car Rental Service
                        </span>
                        <h1
                            class="text-4xl lg:text-6xl font-extrabold text-white leading-tight mb-6"
                        >
                            Find Your
                            <span
                                class="bg-gradient-to-r from-primary-400 to-blue-700 bg-clip-text text-transparent"
                                >Perfect Ride</span
                            >
                            Today
                        </h1>
                        <p
                            class="text-lg text-slate-300 leading-relaxed mb-10 max-w-lg"
                        >
                            Browse our wide selection of premium vehicles at
                            affordable prices. From sedans to luxury SUVs — we
                            have the perfect car for every journey.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <Link
                                :href="route('cars')"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-2xl shadow-xl shadow-primary-500/30 hover:shadow-2xl hover:shadow-primary-500/40 hover:from-primary-700 hover:to-primary-800 transition-all duration-300"
                            >
                                Browse Cars
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </Link>
                            <Link
                                :href="route('about')"
                                class="inline-flex items-center gap-2 px-8 py-3.5 border border-slate-600 text-white font-semibold rounded-2xl hover:bg-white/10 transition-all duration-300"
                            >
                                Learn More
                            </Link>
                        </div>
                        <!-- Stats -->
                        <div class="flex gap-10 mt-14">
                            <div>
                                <p class="text-3xl font-extrabold text-white">
                                    150+
                                </p>
                                <p class="text-sm text-slate-400 mt-1">
                                    Cars Available
                                </p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-white">
                                    5K+
                                </p>
                                <p class="text-sm text-slate-400 mt-1">
                                    Happy Customers
                                </p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-white">
                                    4.9
                                </p>
                                <p class="text-sm text-slate-400 mt-1">
                                    Star Rating
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary-500/20 to-accent-500/20 rounded-3xl blur-2xl"
                        ></div>
                        <div
                            class="relative bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl p-8 border border-slate-700/50"
                        >
                            <div class="text-center">
                                <div class="text-8xl mb-4">🚗</div>
                                <p class="text-white font-semibold text-lg">
                                    Premium Fleet
                                </p>
                                <p class="text-slate-400 text-sm mt-1">
                                    SUVs • Sedans • Sports • Luxury
                                </p>
                                <div class="mt-6 grid grid-cols-3 gap-3">
                                    <div
                                        class="bg-slate-700/50 rounded-xl p-3 text-center"
                                    >
                                        <p class="text-2xl">🏎️</p>
                                        <p class="text-xs text-slate-400 mt-1">
                                            Sports
                                        </p>
                                    </div>
                                    <div
                                        class="bg-slate-700/50 rounded-xl p-3 text-center"
                                    >
                                        <p class="text-2xl">🚙</p>
                                        <p class="text-xs text-slate-400 mt-1">
                                            SUV
                                        </p>
                                    </div>
                                    <div
                                        class="bg-slate-700/50 rounded-xl p-3 text-center"
                                    >
                                        <p class="text-2xl">🚘</p>
                                        <p class="text-xs text-slate-400 mt-1">
                                            Sedan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <span
                        class="text-primary-600 text-sm font-semibold uppercase tracking-wider"
                        >How It Works</span
                    >
                    <h2
                        class="text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2"
                    >
                        Rent a Car in 3 Easy Steps
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-xl mx-auto">
                        Quick and hassle-free booking process. Get on the road
                        in minutes.
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center group">
                        <div
                            class="w-16 h-16 mx-auto rounded-2xl bg-primary-50 flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors"
                        >
                            <svg
                                class="w-8 h-8 text-primary-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">
                            Browse & Choose
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Explore our fleet with filters for car type, brand,
                            and price range to find your ideal match.
                        </p>
                    </div>
                    <div class="text-center group">
                        <div
                            class="w-16 h-16 mx-auto rounded-2xl bg-accent-50 flex items-center justify-center mb-5 group-hover:bg-accent-100 transition-colors"
                        >
                            <svg
                                class="w-8 h-8 text-accent-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"
                                />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">
                            Select Dates & Book
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Pick your rental dates and confirm your booking. We
                            ensure availability before confirming.
                        </p>
                    </div>
                    <div class="text-center group">
                        <div
                            class="w-16 h-16 mx-auto rounded-2xl bg-green-50 flex items-center justify-center mb-5 group-hover:bg-green-100 transition-colors"
                        >
                            <svg
                                class="w-8 h-8 text-green-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.58-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">
                            Hit the Road
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Pick up your car and enjoy the ride. Pay
                            conveniently by cash on delivery.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Cars -->
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
                        :href="route('cars')"
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

        <!-- Why Choose Us -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <span
                        class="text-primary-600 text-sm font-semibold uppercase tracking-wider"
                        >Why Choose Us</span
                    >
                    <h2
                        class="text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2"
                    >
                        The DriveEase Advantage
                    </h2>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div
                        class="p-6 rounded-2xl border border-slate-200 hover:border-primary-200 hover:bg-primary-50/30 transition-all duration-300"
                    >
                        <div
                            class="w-12 h-12 rounded-xl bg-primary-100 flex items-center justify-center mb-4"
                        >
                            <span class="text-2xl">💰</span>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">
                            Best Price Guarantee
                        </h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Competitive daily rates with no hidden fees. Cash
                            payment accepted.
                        </p>
                    </div>
                    <div
                        class="p-6 rounded-2xl border border-slate-200 hover:border-primary-200 hover:bg-primary-50/30 transition-all duration-300"
                    >
                        <div
                            class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-4"
                        >
                            <span class="text-2xl">✅</span>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">
                            Verified Cars
                        </h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Every car is inspected and maintained to ensure a
                            safe journey.
                        </p>
                    </div>
                    <div
                        class="p-6 rounded-2xl border border-slate-200 hover:border-primary-200 hover:bg-primary-50/30 transition-all duration-300"
                    >
                        <div
                            class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-4"
                        >
                            <span class="text-2xl">⚡</span>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">
                            Instant Booking
                        </h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Book your car instantly with real-time availability
                            checking.
                        </p>
                    </div>
                    <div
                        class="p-6 rounded-2xl border border-slate-200 hover:border-primary-200 hover:bg-primary-50/30 transition-all duration-300"
                    >
                        <div
                            class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-4"
                        >
                            <span class="text-2xl">🛡️</span>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">
                            24/7 Support
                        </h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Round-the-clock customer support whenever you need
                            it.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-3xl p-12 lg:p-16 text-center relative overflow-hidden"
                >
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"
                    ></div>
                    <div
                        class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"
                    ></div>
                    <div class="relative">
                        <h2
                            class="text-3xl lg:text-4xl font-extrabold text-white mb-4"
                        >
                            Ready to Hit the Road?
                        </h2>
                        <p
                            class="text-primary-100 text-lg mb-8 max-w-xl mx-auto"
                        >
                            Sign up now and get access to our full fleet of
                            premium rental cars at unbeatable prices.
                        </p>
                        <div class="flex justify-center gap-4 flex-wrap">
                            <Link
                                :href="route('cars')"
                                class="px-8 py-3.5 bg-white text-primary-700 font-semibold rounded-2xl hover:bg-primary-50 transition-colors shadow-lg"
                                >Get Started</Link
                            >
                            <Link
                                :href="route('cars')"
                                class="px-8 py-3.5 border-2 border-white/30 text-white font-semibold rounded-2xl hover:bg-white/10 transition-colors"
                                >Browse Cars</Link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
