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

import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
// const rentals = page.props.rentals;
const rentals = computed(() => page.props.rentals);

const deleteRental = (id) => {
    router.delete(route("rentals.destroy", id));
};
</script>

<template>
    <AdminLayout>
        <template #header-title>
            <h1 class="text-lg font-semibold text-slate-800">Manage Rentals</h1>
            <p class="text-sm text-slate-400">
                View and manage all car rentals.
            </p>
        </template>

        <div class="flex items-center justify-between mb-6">
            <p class="text-sm text-slate-500">
                Showing
                <strong class="text-slate-700">{{ rentals?.length }}</strong>
                rentals
            </p>
        </div>

        <div
            class="bg-white rounded-2xl border border-slate-200 overflow-auto shadow-sm"
        >
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
                            Customer Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Car Details (Brand • Model)
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Start Date
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            End date
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
                        v-for="rental in rentals"
                        :key="rental.id"
                    >
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            {{ rental.id }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            {{ rental.user.name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ rental.car.brand }} • {{ rental.car.model }}
                        </td>
                        <td class="px-6 py-4">
                            <span>{{ rental.start_date }}</span>
                        </td>
                        <td class="px-6 py-4">
                            {{ rental.end_date }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            {{ rental.total_cost }}
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
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <Link
                                    :href="route('rentals.edit', rental.id)"
                                    class="p-1.5 rounded-lg hover:bg-primary-50 text-primary-600 transition-colors"
                                    ><svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                        /></svg
                                ></Link>
                                <AlertDialog>
                                    <AlertDialogTrigger as-child>
                                        <button
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
                                    </AlertDialogTrigger>
                                    <AlertDialogContent>
                                        <AlertDialogHeader>
                                            <AlertDialogTitle
                                                >Delete
                                                Rental?</AlertDialogTitle
                                            >
                                            <AlertDialogDescription>
                                                This action cannot be undone.
                                                This will permanently delete
                                                this Rental Informations.
                                            </AlertDialogDescription>
                                        </AlertDialogHeader>

                                        <AlertDialogFooter
                                            class="dialog-footer"
                                        >
                                            <AlertDialogCancel
                                                >Cancel</AlertDialogCancel
                                            >

                                            <AlertDialogAction
                                                @click="deleteRental(rental.id)"
                                            >
                                                Delete
                                            </AlertDialogAction>
                                        </AlertDialogFooter>
                                    </AlertDialogContent>
                                </AlertDialog>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
