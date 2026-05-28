<script setup>
import AlertDialog from "@/Components/ui/alert-dialog/AlertDialog.vue";
import AlertDialogAction from "@/Components/ui/alert-dialog/AlertDialogAction.vue";
import AlertDialogCancel from "@/Components/ui/alert-dialog/AlertDialogCancel.vue";
import AlertDialogContent from "@/Components/ui/alert-dialog/AlertDialogContent.vue";
import AlertDialogDescription from "@/Components/ui/alert-dialog/AlertDialogDescription.vue";
import AlertDialogFooter from "@/Components/ui/alert-dialog/AlertDialogFooter.vue";
import AlertDialogHeader from "@/Components/ui/alert-dialog/AlertDialogHeader.vue";
import AlertDialogTitle from "@/Components/ui/alert-dialog/AlertDialogTitle.vue";
import AlertDialogTrigger from "@/Components/ui/alert-dialog/AlertDialogTrigger.vue";

import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const booking = computed(() => page.props.rental);

const duration = computed(() => {
    if (!booking.start_date || !booking.end_date) return 0;

    const start = new Date(booking.start_date);
    const end = new Date(booking.end_date);

    const diffTime = end - start;

    return diffTime > 0 ? Math.ceil(diffTime / (1000 * 60 * 60 * 24)) : 0;
});

const cancelBooking = (id) => {
    router.post(`/rentals/${id}/cancel`);
};
</script>

<template>
    <GuestLayout>
        <section class="py-10">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav
                    class="flex items-center gap-2 text-sm text-slate-500 mb-8"
                >
                    <Link
                        to="/"
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
                        :href="route('bookings.index')"
                        class="hover:text-primary-600 transition-colors"
                        >My Bookings</Link
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
                    <span class="text-slate-700 font-medium"
                        >Booking # {{ booking.id }}</span
                    >
                </nav>

                <h1 class="text-3xl font-extrabold text-slate-900 mb-8">
                    Booking Details
                </h1>

                <div
                    class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm"
                >
                    <!-- Status Header -->
                    <div
                        class="px-8 py-5 bg-blue-50 border-b border-blue-100 flex items-center justify-between"
                    >
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 text-blue-600"
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
                            <div>
                                <p class="text-sm font-bold text-blue-900">
                                    Rental ID: # {{ booking.id }}
                                </p>
                                <span
                                    :class="[
                                        'inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-lg',
                                        booking.status === 'completed'
                                            ? 'bg-green-100 text-green-700'
                                            : booking.status === 'cancelled'
                                              ? 'bg-red-100 text-red-700'
                                              : 'bg-blue-100 text-blue-700',
                                    ]"
                                >
                                    <span
                                        :class="[
                                            'w-1.5 h-1.5 bg-blue-500 rounded-full',
                                            booking.status === 'completed'
                                                ? 'bg-green-500'
                                                : booking.status === 'cancelled'
                                                  ? 'bg-red-500'
                                                  : 'bg-blue-500',
                                        ]"
                                    ></span>
                                    {{
                                        booking.status === "completed"
                                            ? "Completed"
                                            : booking.status === "cancelled"
                                              ? "Cancelled"
                                              : "Ongoing"
                                    }}
                                </span>
                            </div>
                        </div>
                        <AlertDialog>
                            <AlertDialogTrigger as-child>
                                <button
                                    v-if="booking.status === 'ongoing'"
                                    class="px-5 py-2 bg-red-500 text-white text-sm font-semibold rounded-xl hover:bg-red-600 transition-colors"
                                >
                                    Cancel Booking
                                </button>
                            </AlertDialogTrigger>
                            <AlertDialogContent>
                                <AlertDialogHeader>
                                    <AlertDialogTitle
                                        >Cancel Booking?</AlertDialogTitle
                                    >
                                    <AlertDialogDescription>
                                        This action cannot be undone. This will
                                        permanently cancel the booking.
                                    </AlertDialogDescription>
                                </AlertDialogHeader>

                                <AlertDialogFooter class="dialog-footer">
                                    <AlertDialogCancel>Canel</AlertDialogCancel>

                                    <AlertDialogAction
                                        @click="cancelBooking(booking.id)"
                                    >
                                        Confirm
                                    </AlertDialogAction>
                                </AlertDialogFooter>
                            </AlertDialogContent>
                        </AlertDialog>
                    </div>

                    <div class="p-8 space-y-8">
                        <!-- Car Details -->
                        <div>
                            <h3
                                class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4"
                            >
                                Car Details
                            </h3>
                            <div
                                class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl"
                            >
                                <div
                                    class="w-16 h-14 bg-white rounded-lg flex items-center justify-center border border-slate-200"
                                >
                                    <span class="text-3xl">🚗</span>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">
                                        {{ booking.car.name }}
                                    </p>
                                    <p class="text-sm text-slate-500">
                                        {{ booking.car.brand }} •
                                        {{ booking.car.model }} •
                                        {{ booking.car.year }} •
                                        {{ booking.car.car_type }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Rental Period -->
                        <div>
                            <h3
                                class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4"
                            >
                                Rental Period
                            </h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="p-4 bg-slate-50 rounded-xl">
                                    <p class="text-xs text-slate-400 mb-1">
                                        Start Date
                                    </p>
                                    <p
                                        class="text-sm font-semibold text-slate-700"
                                    >
                                        {{ booking.start_date }}
                                    </p>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-xl">
                                    <p class="text-xs text-slate-400 mb-1">
                                        End Date
                                    </p>
                                    <p
                                        class="text-sm font-semibold text-slate-700"
                                    >
                                        {{ booking.end_date }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment -->
                        <div>
                            <h3
                                class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4"
                            >
                                Payment Summary
                            </h3>
                            <div class="p-4 bg-slate-50 rounded-xl space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500"
                                        >Daily Rate</span
                                    >
                                    <span class="text-slate-700"
                                        >${{
                                            booking.car.daily_rent_price
                                        }}</span
                                    >
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500">Duration</span>
                                    <span class="text-slate-700"
                                        >{{ duration }} days</span
                                    >
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500"
                                        >Payment Method</span
                                    >
                                    <span class="text-slate-700">Cash</span>
                                </div>
                                <div
                                    class="border-t border-slate-200 pt-2 mt-2 flex justify-between"
                                >
                                    <span class="font-bold text-slate-900"
                                        >Total Cost</span
                                    >
                                    <span
                                        class="font-extrabold text-primary-600 text-lg"
                                        >${{ booking.total_cost }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <Link
                        :href="route('bookings.index')"
                        class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-primary-600 transition-colors"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to My Bookings
                    </Link>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
