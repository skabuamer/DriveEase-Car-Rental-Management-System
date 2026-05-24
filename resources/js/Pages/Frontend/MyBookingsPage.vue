<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, router, usePage } from "@inertiajs/vue3";

const page = usePage();

const cancelBooking = (id) => {
    if (confirm("Are you sure you want to cancel this booking?")) {
        router.post(`/rentals/${id}/cancel`);
    }
};
</script>

<template>
    <GuestLayout>
        <section class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-3xl font-extrabold text-slate-900">
                        My Bookings
                    </h1>
                    <Link
                        :href="route('cars')"
                        class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M12 4v16m8-8H4" />
                        </svg>
                        New Booking
                    </Link>
                </div>

                <!-- Bookings Table -->
                <div
                    class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm"
                >
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                                >
                                    Car
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                                >
                                    Rental Period
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                                >
                                    Total Cost
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                                >
                                    Status
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Booking 1 - Ongoing -->
                            <tr v-if="page.props.rentals.length == 0">
                                <th
                                    class="p-4 py-10 text-center text-slate-400"
                                    colspan="5"
                                >
                                    {{
                                        page.props.rentals.length == 0
                                            ? "No Booking Yet"
                                            : ""
                                    }}
                                </th>
                            </tr>
                            <tr
                                class="hover:bg-slate-50 transition-colors"
                                v-for="booking in page.props.rentals"
                                :key="booking.id"
                            >
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center shrink-0"
                                        >
                                            <img
                                                :src="`/storage/${booking.car.image}`"
                                                alt="Image"
                                                class="w-full h-full object-contain rounded-lg"
                                            />
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm font-semibold text-slate-900"
                                            >
                                                {{ booking.car.name }}
                                            </p>
                                            <p class="text-xs text-slate-500">
                                                {{ booking.car.brand }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-700">
                                        {{ booking.start_date }}
                                    </p>
                                    <p class="text-xs text-slate-400">
                                        to {{ booking.end_date }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm font-bold text-slate-900">
                                        ${{ booking.total_cost }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        :class="[
                                            'inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-lg',
                                            booking.status === 'completed'
                                                ? 'bg-green-50 text-green-700'
                                                : booking.status === 'cancelled'
                                                  ? 'bg-red-50 text-red-700'
                                                  : 'bg-blue-50 text-blue-700',
                                        ]"
                                    >
                                        <span
                                            :class="[
                                                'w-1.5 h-1.5 bg-blue-500 rounded-full',
                                                booking.status === 'completed'
                                                    ? 'bg-green-500'
                                                    : booking.status ===
                                                        'cancelled'
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
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- <Link
                                            :href="
                                                route(
                                                    'booking.show',
                                                    booking.id,
                                                )
                                            "
                                            class="text-primary-600 hover:text-primary-700 text-sm font-medium"
                                            >View</Link
                                        > -->
                                        <!-- <span class="text-slate-300">|</span> -->
                                        <button
                                            @click="cancelBooking(booking.id)"
                                            v-if="booking.status === 'ongoing'"
                                            type="submit"
                                            class="text-red-500 hover:text-red-600 text-sm font-medium"
                                        >
                                            Cancel
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
