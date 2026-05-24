<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const pages = usePage();

// const customers = pages.props.customers;
const customers = computed(() => pages.props.customers);

const deleteCustomer = (id) => {
    if (confirm("Are you sure you want to delete this customer?"))
        router.delete(route("customers.destroy", id));
};
</script>

<template>
    <AdminLayout>
        <template #header-title>
            <h1 class="text-lg font-semibold text-slate-800">
                Manage Customers
            </h1>
            <p class="text-sm text-slate-400">
                View and manage customer accounts.
            </p>
        </template>

        <div class="flex items-center justify-between mb-6">
            <p class="text-sm text-slate-500">
                Showing
                <strong class="text-slate-700">{{ customers?.length }}</strong>
                customers
            </p>
        </div>

        <div
            class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm"
        >
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Customer Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Email
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Rental History
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr
                        class="hover:bg-slate-50 transition-colors"
                        v-if="customers.length > 0"
                        v-for="customer in customers"
                        :key="customer.id"
                    >
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2.5">
                                <div
                                    class="w-8 h-8 rounded-full bg-linear-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-xs font-bold"
                                >
                                    {{ customer.name.charAt(0) }}
                                </div>
                                <Link
                                    :href="route('customers.show', customer.id)"
                                    class="text-sm font-semibold text-slate-900"
                                    >{{ customer.name }}</Link
                                >
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ customer.email }}
                        </td>
                        <td class="px-6 py-4">
                            <Link
                                :href="route('customers.show', customer.id)"
                                class="text-primary-600 hover:text-primary-700 text-sm font-medium"
                                >{{ customer.rentals.length }} rentals</Link
                            >
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button
                                    @click="deleteCustomer(customer.id)"
                                    class="p-1.5 rounded-lg hover:bg-red-50 text-red-500 transition-colors"
                                >
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
