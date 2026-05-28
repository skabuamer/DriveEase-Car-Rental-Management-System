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
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    cars: Array,
});
</script>

<template>
    <Head title="Manage Cars" />

    <AdminLayout>
        <template #header-title>
            <h1 class="text-lg font-semibold text-slate-800">Manage Cars</h1>
            <p class="text-sm text-slate-400">
                Add, edit, and delete cars from your fleet.
            </p>
        </template>

        <div class="flex items-center justify-between mb-6">
            <p class="text-sm text-slate-500">
                Showing
                <strong class="text-slate-700">{{ cars?.length }}</strong> cars
            </p>
            <Link
                :href="route('cars.create')"
                class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors shadow-md shadow-primary-500/20"
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
                Add New Car
            </Link>
        </div>

        <div
            class="bg-white rounded-2xl border border-slate-200 overflow-auto shadow-sm"
        >
            <table class="w-full min-w-max">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            ID
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Image
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Brand / Model
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Type
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Year
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider"
                        >
                            Price/Day
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
                        v-for="car in cars"
                        :key="car.id"
                    >
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            {{ car.id }}
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="w-14 h-10 bg-slate-100 rounded-lg flex items-center justify-center"
                            >
                                <img
                                    :src="`/storage/${car.image}`"
                                    alt="Image"
                                />
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            {{ car.name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ car.brand }} • {{ car.model }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-lg"
                                >{{ car.car_type }}</span
                            >
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ car.year }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm font-semibold text-slate-900"
                        >
                            {{ car.daily_rent_price }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                :class="[
                                    `inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-lg`,
                                    car.availablity
                                        ? `bg-green-50 text-green-700`
                                        : `bg-red-50 text-red-700`,
                                ]"
                                ><span
                                    :class="[
                                        'w-1.5 h-1.5 rounded-full',
                                        car.availablity
                                            ? `bg-green-500`
                                            : `bg-red-500`,
                                    ]"
                                ></span
                                >{{
                                    car.availablity
                                        ? "Available"
                                        : "Not Available"
                                }}</span
                            >
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <Link
                                    :href="route('cars.edit', car.id)"
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
                                                >Delete Car?</AlertDialogTitle
                                            >
                                            <AlertDialogDescription>
                                                This action cannot be undone.
                                                This will permanently delete
                                                this car.
                                            </AlertDialogDescription>
                                        </AlertDialogHeader>

                                        <AlertDialogFooter
                                            class="dialog-footer"
                                        >
                                            <AlertDialogCancel
                                                >Cancel</AlertDialogCancel
                                            >

                                            <AlertDialogAction
                                                @click="
                                                    router.delete(
                                                        route(
                                                            'cars.destroy',
                                                            car.id,
                                                        ),
                                                    )
                                                "
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
