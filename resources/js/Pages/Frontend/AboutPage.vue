<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="About" />

    <GuestLayout>
        <!-- Page Header -->
        <section
            class="bg-gradient-to-br from-surface-dark via-primary-900 to-surface-dark py-20"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/15 text-primary-300 text-xs font-semibold uppercase tracking-wider mb-4"
                    >About Us</span
                >
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">
                    Who We Are
                </h1>
                <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                    Your trusted partner for premium car rental services since
                    2015.
                </p>
            </div>
        </section>

        <!-- Story -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <span
                            class="text-primary-600 text-sm font-semibold uppercase tracking-wider"
                            >Our Story</span
                        >
                        <h2
                            class="text-3xl font-extrabold text-slate-900 mt-2 mb-6"
                        >
                            Driving Excellence Since 2015
                        </h2>
                        <p class="text-slate-600 leading-relaxed mb-4">
                            DriveEase was founded with a simple mission — to
                            make car rental easy, affordable, and enjoyable for
                            everyone. Over the years, we've grown from a small
                            local rental shop to a trusted name in the industry.
                        </p>
                        <p class="text-slate-600 leading-relaxed mb-4">
                            Our fleet includes everything from fuel-efficient
                            sedans to powerful SUVs and thrilling sports cars.
                            Every vehicle is meticulously maintained and
                            inspected to ensure a safe and comfortable ride.
                        </p>
                        <p class="text-slate-600 leading-relaxed">
                            We believe in transparent pricing with no hidden
                            fees. Our cash-on-delivery payment system makes the
                            process simple and hassle-free.
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-primary-50 to-accent-50 rounded-3xl p-12 text-center"
                    >
                        <div class="text-8xl mb-6">🚗</div>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-white rounded-2xl p-5 shadow-sm">
                                <p
                                    class="text-3xl font-extrabold text-primary-600"
                                >
                                    150+
                                </p>
                                <p class="text-sm text-slate-500 mt-1">
                                    Cars in Fleet
                                </p>
                            </div>
                            <div class="bg-white rounded-2xl p-5 shadow-sm">
                                <p
                                    class="text-3xl font-extrabold text-primary-600"
                                >
                                    5K+
                                </p>
                                <p class="text-sm text-slate-500 mt-1">
                                    Happy Customers
                                </p>
                            </div>
                            <div class="bg-white rounded-2xl p-5 shadow-sm">
                                <p
                                    class="text-3xl font-extrabold text-primary-600"
                                >
                                    10+
                                </p>
                                <p class="text-sm text-slate-500 mt-1">
                                    Years Experience
                                </p>
                            </div>
                            <div class="bg-white rounded-2xl p-5 shadow-sm">
                                <p
                                    class="text-3xl font-extrabold text-primary-600"
                                >
                                    4.9
                                </p>
                                <p class="text-sm text-slate-500 mt-1">
                                    Average Rating
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14">
                    <span
                        class="text-primary-600 text-sm font-semibold uppercase tracking-wider"
                        >Our Values</span
                    >
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        What Drives Us
                    </h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="p-8 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all duration-300"
                    >
                        <div
                            class="w-16 h-16 mx-auto rounded-2xl bg-primary-100 flex items-center justify-center mb-5"
                        >
                            <span class="text-3xl">🎯</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3">
                            Customer First
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Every decision we make starts with our customers.
                            Your satisfaction is our top priority.
                        </p>
                    </div>
                    <div
                        class="p-8 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all duration-300"
                    >
                        <div
                            class="w-16 h-16 mx-auto rounded-2xl bg-green-100 flex items-center justify-center mb-5"
                        >
                            <span class="text-3xl">🤝</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3">
                            Trust & Transparency
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            No hidden fees, no surprises. What you see is what
                            you pay. Simple and honest.
                        </p>
                    </div>
                    <div
                        class="p-8 rounded-2xl border border-slate-200 text-center hover:shadow-lg transition-all duration-300"
                    >
                        <div
                            class="w-16 h-16 mx-auto rounded-2xl bg-amber-100 flex items-center justify-center mb-5"
                        >
                            <span class="text-3xl">⭐</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3">
                            Quality Assured
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Each vehicle undergoes rigorous inspection before
                            every rental for your peace of mind.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
