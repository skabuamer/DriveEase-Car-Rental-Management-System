<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Contact" />
    <GuestLayout>
        <!-- Page Header -->
        <section
            class="bg-gradient-to-br from-surface-dark via-primary-900 to-surface-dark py-20"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/15 text-primary-300 text-xs font-semibold uppercase tracking-wider mb-4"
                    >Get in Touch</span
                >
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">
                    Contact Us
                </h1>
                <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                    Have questions? We'd love to hear from you. Reach out
                    anytime.
                </p>
            </div>
        </section>

        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-10">
                    <!-- Contact Info Cards -->
                    <div class="space-y-6">
                        <div
                            class="p-6 bg-white rounded-2xl border border-slate-200 hover:shadow-lg transition-all duration-300"
                        >
                            <div
                                class="w-12 h-12 rounded-xl bg-primary-100 flex items-center justify-center mb-4"
                            >
                                <svg
                                    class="w-6 h-6 text-primary-600"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    />
                                    <path
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">
                                Our Address
                            </h3>
                            <p class="text-sm text-slate-500">
                                123 Main Street, City, Country
                            </p>
                        </div>
                        <div
                            class="p-6 bg-white rounded-2xl border border-slate-200 hover:shadow-lg transition-all duration-300"
                        >
                            <div
                                class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-4"
                            >
                                <svg
                                    class="w-6 h-6 text-green-600"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">
                                Phone Number
                            </h3>
                            <p class="text-sm text-slate-500">+1 234 567 890</p>
                        </div>
                        <div
                            class="p-6 bg-white rounded-2xl border border-slate-200 hover:shadow-lg transition-all duration-300"
                        >
                            <div
                                class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-4"
                            >
                                <svg
                                    class="w-6 h-6 text-amber-600"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">
                                Email Address
                            </h3>
                            <p class="text-sm text-slate-500">
                                info@driveease.com
                            </p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="lg:col-span-2">
                        <div
                            class="bg-white rounded-2xl border border-slate-200 p-8"
                        >
                            <h2 class="text-2xl font-bold text-slate-900 mb-6">
                                Send us a Message
                            </h2>
                            <form class="space-y-5">
                                <div class="grid sm:grid-cols-2 gap-5">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-slate-700 mb-1.5"
                                            >Full Name</label
                                        >
                                        <input
                                            type="text"
                                            placeholder="John Doe"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-slate-700 mb-1.5"
                                            >Email Address</label
                                        >
                                        <input
                                            type="email"
                                            placeholder="john@example.com"
                                            class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-slate-700 mb-1.5"
                                        >Subject</label
                                    >
                                    <input
                                        type="text"
                                        placeholder="How can we help?"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-slate-700 mb-1.5"
                                        >Message</label
                                    >
                                    <textarea
                                        rows="5"
                                        placeholder="Tell us more about your inquiry..."
                                        class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all resize-none"
                                    ></textarea>
                                </div>
                                <button
                                    type="button"
                                    class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-xl shadow-md shadow-primary-500/25 hover:shadow-lg hover:shadow-primary-500/30 hover:from-primary-700 hover:to-primary-800 transition-all duration-200"
                                >
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
