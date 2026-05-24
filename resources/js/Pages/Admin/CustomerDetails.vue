<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const page = usePage();

const customer = computed(() => page.props.customer);
</script>

<template>
    <AdminLayout>
        <template #header-title>
            <h1 class="text-lg font-semibold text-slate-800">
                Customer Details
            </h1>
            <p class="text-sm text-slate-400">
                View customer information and rental history.
            </p>
        </template>

        <!-- Customer Info Card -->
        <div class="bg-white rounded-2xl border border-slate-200 p-8 mb-8">
            <div class="flex items-start gap-5">
                <div
                    class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-xl font-bold shrink-0"
                >
                    {{ customer?.name.charAt(0) }}
                </div>
                <div class="flex-1 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div>
                        <p
                            class="text-xs text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Customer Name
                        </p>
                        <p class="text-sm font-semibold text-slate-900">
                            {{ customer?.name }}
                        </p>
                    </div>
                    <div>
                        <p
                            class="text-xs text-slate-400 uppercase tracking-wider mb-1"
                        >
                            Email
                        </p>
                        <p class="text-sm font-semibold text-slate-900">
                            {{ customer?.email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rental History -->
        <div
            class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm"
        >
            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-base font-bold text-slate-900">
                    Rental History
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    All rentals by this customer
                </p>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Rental ID
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Car
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Dates
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Total Cost
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr
                        class="hover:bg-slate-50 transition-colors"
                        v-for="rental in customer.rentals"
                        :key="rental.id"
                    >
                        <td
                            class="px-6 py-4 text-sm font-medium text-slate-700"
                        >
                            #{{ rental.id }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-700">
                            {{ rental.car.model }} - {{ rental.car.brand }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500">
                            {{ rental.start_date }} - {{ rental.end_date }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            ${{ rental.total_cost }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                :class="[
                                    `inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-lg`,
                                    rental.status === `completed`
                                        ? `bg-green-50 text-green-700`
                                        : rental.status === `ongoing`
                                          ? `bg-blue-50 text-blue-700`
                                          : `bg-red-50 text-red-700`,
                                ]"
                                >{{
                                    rental.status === "completed"
                                        ? "Completed"
                                        : rental.status === "ongoing"
                                          ? "Ongoing"
                                          : "Cancelled"
                                }}</span
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <Link
                :href="route('customers.index')"
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
                Back to Customers
            </Link>
        </div>
    </AdminLayout>
</template>
